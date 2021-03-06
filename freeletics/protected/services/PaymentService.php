<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PaymentService extends BaseService {

  /**
   * 
   * @param type $class
   * @return PaymentService
   */
  public static function getInstance($class = __CLASS__) {
    return parent::getInstance($class);
  }

  public function getExpressToken() {
    
  }

  public function getCostFromCSV($params = array()) {
    /**
     * TODO: checking timeout transaction
     * Yii::app()->session->add("payment_processing", null);
     */
    $typePage = isset($params['typePage']) ? $params['typePage'] : '';
    if ($typePage == 'training' || trim($typePage) == '') {
      $costs = SystemUtils::getCsvToArray("data/Payment/Payment_cost.csv");
      $typePage = 'training';
    } else {
      $costs = SystemUtils::getCsvToArray("data/Payment/Payment_nutrition.csv");
    }
    /**
     * TODO: search by currency
     */
    $dataPayment = array();
    foreach ($costs as $c) {
      if ($c['currency'] === Yii::app()->params['currency']) {
        $dataPayment['costArr'] = $c['costs'];
        $dataPayment['$costTimes'] = $c['times'];
        $dataPayment['$unit'] = $c['unit_time'];
        break;
      }
    }
    return $dataPayment;
  }

  public function isValid($paymenInfo, $typePage) {
    if ($typePage == 'training') {
      $costs = SystemUtils::getCsvToArray("data/Payment/Payment_cost.csv");
    } else {
      $costs = SystemUtils::getCsvToArray("data/Payment/Payment_nutrition.csv");
    }
    $currency = isset($paymenInfo["currency"]) ? $paymenInfo["currency"] : Yii::app()->params['currency'];

    $costCurrency = null;
    foreach ($costs as $c) {
      if ($c['currency'] == $currency) {
        $costCurrency = $c;
        break;
      }
    }
    if ($costCurrency === null) {
      return false;
    }
    if (trim($costCurrency['costs']) === '') {
      return false;
    }
    $costArray = explode(";", trim($costCurrency['costs']));
    $cost = isset($paymenInfo['cost']) ? $paymenInfo['cost'] : 0;
    if ($cost === 0 || !in_array($cost, $costArray)) {
      return false;
    }
    return true;
  }

  public function createPayment($params, $paymentType = Constant::PAYMENT_PAYPAL) {
    switch ($paymentType) {
      case Constant::PAYMENT_NGANLUONG:
        return $this->createNganLuongPayment($params);
      case Constant::PAYMENT_PAYPAL:
        return $this->createPaypalPayment($params);
      default :
        return $this->createPaypalPayment($params);
    }
  }

  public function createPaypalPayment($params) {
    $results = array("status" => Constant::RS_ST_OK, 'error' => '', 'url' => '');
    // set 
    $paymentInfo['Order']['theTotal'] = Yii::app()->session['theTotal'] = $params['cost'];
    $paymentInfo['Order']['description'] = "Freeletics";
    $paymentInfo['Order']['quantity'] = '1';
    if (isset($params['returnUrl'])) {
      Yii::app()->Paypal->returnUrl = $params['returnUrl'];
    }

    // call paypal
    Yii::app()->Paypal->currency = Yii::app()->params["currency"];
    $result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo);
    //Detect Errors 
    if (!Yii::app()->Paypal->isCallSucceeded($result)) {
      if (Yii::app()->Paypal->apiLive === true) {
        //Live mode basic error message
        $error = 'We were unable to process your request. Please try again later';
      } else {
        //Sandbox output the actual error message to dive in.
        $error = $result['L_LONGMESSAGE0'];
      }
      $results['error'] = $error;
    } else {
      // send user to paypal 
      $token = urldecode($result["TOKEN"]);

      $payPalURL = Yii::app()->Paypal->paypalUrl . $token;
      $results['url'] = $payPalURL;
      //$this->redirect($payPalURL);
    }
    return $results;
  }

  public function createNganLuongPayment($params) {
    $results = array("status" => Constant::RS_ST_OK, 'error' => '', 'url' => '');
    $currentCurrency = Yii::app()->params['currency'];
    if ($currentCurrency != 'VND') {
      $costs = SystemUtils::getCsvToArray("data/Payment/Payment_rate.csv");
      foreach ($costs as $cost) {
        if ($cost['country1'] == $currentCurrency && $cost['country2'] = 'VND') {
          $params['cost'] = (float) ($params['cost'] * $cost['rate']);
          break;
        }
      }
    }
    Yii::app()->session['theTotal'] = $params['cost'];
    Yii::log(__METHOD__ . " -- Cost NganLuong " . $params['cost']);
    $results['url'] = $this->buildCheckoutNganLuongUrl($params['returnUrl'], Yii::app()->params['NL_Email_Receiver'], $params['cost']);
    return $results;
  }

  public function confirmPayment($params) {
    Yii::app()->Paypal->currency = Yii::app()->params["currency"];
    $token = trim($params['token']);
    $payerId = trim($params['PayerID']);

    $result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);

    $result['PAYERID'] = $payerId;
    $result['TOKEN'] = $token;
    $result['ORDERTOTAL'] = Yii::app()->session['theTotal'];

    //Detect errors 
    if (!Yii::app()->Paypal->isCallSucceeded($result)) {
      if (Yii::app()->Paypal->apiLive === true) {
        //Live mode basic error message
        $error = 'We were unable to process your request. Please try again later';
      } else {
        //Sandbox output the actual error message to dive in.
        $error = $result['L_LONGMESSAGE0'];
      }
      return array('message' => $error, 'status' => Constant::RS_ST_ERROR);
    } else {
      $paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
      //Detect errors  
      if (!Yii::app()->Paypal->isCallSucceeded($paymentResult)) {
        if (Yii::app()->Paypal->apiLive === true) {
          //Live mode basic error message
          $error = 'We were unable to process your request. Please try again later';
        } else {
          //Sandbox output the actual error message to dive in.
          $error = $paymentResult['L_LONGMESSAGE0'];
        }
        return array('message' => $error, 'status' => Constant::RS_ST_ERROR);
      } else {
        //payment was completed successfully
        $this->updateUser($result);
      }
    }
    return array('status' => Constant::RS_ST_OK);
  }

  public function updateUser($results) {
    $userPayment = new UserPayment;
    $userPayment->user_id = Yii::app()->user->id;
    $userPayment->detail_payment = serialize(Yii::app()->session->get("payment_info"));
    $userPayment->details = serialize($results);
    $userPayment->create_date = $userPayment->last_update = date('Y-m-d H:i:s', time());
    $userPayment->save();

    $paymentInfo = Yii::app()->session->get("payment_info");
    if (isset($paymentInfo['coupon'])) {
      $this->updateCodeCoupon($paymentInfo);
    }
  }

  public function updateCodeCoupon($paymentInfo) {
    $typePage = $paymentInfo['type_page'];
    $coupon = Coupon::model()->findByAttributes(array('code2' => $paymentInfo['coupon']));
    if ($coupon == null) {
      // error
      Yii::log(__METHOD__ . " -- Error coupon not updated", CLogger::LEVEL_ERROR);
    }
    $typeUpdate = Constant::COUPON_ST_USED;
    if ($coupon->both == 1) {
      switch ($typePage) {
        case 'nutrition':
          if ($coupon->status == Constant::COUPON_ST_USED_TRAINING) {
            $typeUpdate = Constant::COUPON_ST_USED;
          } else {
            $typeUpdate = Constant::COUPON_ST_USED_NUTRITION;
          }
          break;
        case 'training':
          if ($coupon->status == Constant::COUPON_ST_USED_NUTRITION) {
            $typeUpdate = Constant::COUPON_ST_USED;
          } else {
            $typeUpdate = Constant::COUPON_ST_USED_TRAINING;
          }
          break;
      }
    }
    $coupon->status = $typeUpdate;
    $coupon->last_update = date('Y-m-d H:i:s', time());
    $coupon->update();
    Yii::log(__METHOD__ . " -- Coupon updated with type {$typeUpdate}");
  }

  public function addCode($code, $typePage) {
    $coupon = Coupon::model()->findByAttributes(array('code2' => $code));
    if ($coupon === null) {
      $coupon = Coupon::model()->findByAttributes(array('code' => $code));
      if ($coupon === null) {
        return false;
      }
    }
    $userCoupon = UserCoupon::model()->findByAttributes(array('coupon_id' => $coupon->id));
    if ($userCoupon != null) {
      if ($coupon->both == 1) {
        
      } else {
        Yii::log(__METHOD__ . " -- Coupon be used");
        return false;
      }
    }
    if ($coupon->both == 1) {
      switch ($typePage) {
        case Constant::PAYMENT_NUTRITRION:
          if ($coupon->status == Constant::COUPON_ST_USED_NUTRITION) {
            return false;
          }
          break;
        case Constant::PAYMENT_TRAINING:
          if ($coupon->status == Constant::COUPON_ST_USED_TRAINING) {
            return false;
          }
          break;
      }
    }
    if ($coupon->status != Constant::COUPON_ST_USED && $coupon->status != Constant::COUPON_ST_DELETED) {
      // have not used
      $error = 0;
      if ($coupon->both == 1) {
        
      }
      if (strcmp($coupon->expired_date, '0000-00-00') != 0) {
        if ($coupon->start_date < time() || time() > $coupon->expired_date) {
          $error = 4001;
        }
      } else if ($coupon->start_date > date('Y-m-d', time())) {
        $error = 4001;
      }
      if ($error != 0) {
        return false;
      }
      $user = User::model()->findByPk(Yii::app()->user->id);
      $rs = $this->checkingCodeAndUser($coupon, $user);
      if ($rs) {
        //$this->processCoupon($coupon);
      } else {
        return false;
      }
    }
    return true;
  }

  public function checkingCodeAndUser($coupon, $user) {
    $age = $coupon->age;
    $type_age = $coupon->type_age;
    $rs[] = $this->_decodeTimeType($age, $type_age, $user->birthday);

    $point = $coupon->point;
    $type_point = $coupon->type_point;
    $rs[] = $this->_decodePointType($point, $type_point, $user->point);

    if (in_array(false, $rs)) {
      return false;
    }
    $userCoupon = new UserCoupon();
    $userCoupon->user_id = $user->id;
    $userCoupon->coupon_id = $coupon->id;
    $userCoupon->save();
    return true;
  }

  private function _decodeTimeType($value, $type, $subject) {
    $subject = strtotime($subject);
    switch ($type) {
      case 0:
        $df_age = date('Y', time()) - date('Y', $subject);
        if ($df_age > $value) {
          return true;
        }
        break;
      case 1:
        $df_age = date('Y', time()) - date('Y', $subject);
        if ($df_age < $value) {
          return true;
        }
        break;
      case 2:
        $df_age = date('Y', time()) - date('Y', $subject);
        $vls = explode('~', $value);
        $min = trim($vls[0]);
        $max = trim($vls[1]);

        if ($df_age >= $min && $df_age <= $max) {
          return true;
        }
        break;
    }
    return false;
  }

  private function _decodePointType($value, $type, $subject) {
    switch ($type) {
      case 0:
        if ($subject > $value) {
          return true;
        }
        break;
      case 1:
        if ($df_age < $value) {
          return true;
        }
        break;
      case 2:
        $vls = explode('~', $value);
        $min = trim($vls[0]);
        $max = trim($vls[1]);
        if ($subject >= $min && $subject <= $max) {
          return true;
        }
        break;
    }
    return false;
  }

  public function processCoupon($coupon, $orgValues) {
    $disCount = 0;
    $used = false;
    if ($coupon->both == 1) {
      switch ($coupon->status) {
        case Constant::COUPON_ST_USED_TRAINING:
          if ($orgValues['type_page'] != 'training') {
            $used = true;
          }
          break;
        case Constant::COUPON_ST_USED_NUTRITION:
          if ($orgValues['type_page'] != 'nutrition') {
            $used = true;
          }
          break;
        default :
          $used = true;
          break;
      }
    } else {
      if ($coupon->status != Constant::COUPON_ST_DELETED && $coupon->status != Constant::COUPON_ST_USED) {
        $used = true;
      }
    }
    if ($used) {
      $type = $coupon->type;
      $value = $coupon->value;
      switch ($type) {
        case 0:// definition
          $disCount = $orgValues['cost'] - $value;
          break;
        case 1:// percent
          $disCount = $orgValues['cost'] - $orgValues['cost'] * $value / 100;
          break;
      }
    }
    if ($disCount < 0) {
      $disCount = 1;
      Yii::log(__METHOD__ . " -- Discount larger than price");
    }
    return number_format($disCount, 2, '.', '');
  }

  // URL checkout
//  private $nganluong_url = 'https://www.nganluong.vn/checkout.php';
  private $nganluong_url = 'https://www.nganluong.vn/advance_payment.php';
  // merchante site ID 
  private $merchant_site_code = '110587';  // Biến này được nganluong.vn cung cấp khi bạn đăng ký merchant site
  // merchante site password
  private $secure_pass = 'normprint'; // Biến này được nganluong.vn cung cấp khi bạn đăng ký merchant site

  //Function to build checkout Url

  public function buildCheckoutNganLuongUrl($return_url, $receiver, $price = 1, $transaction_info = '', $order_code = '') {


//    $arr_param = array(
//        'merchant_site_code' => strval($this->merchant_site_code), //merchante site ID
//        'return_url' => strtolower(urlencode($return_url)), //return uri 
//        'receiver' => strval($receiver), //receiver email
//        'transaction_info' => strval($transaction_info), //transaction info
//        'order_code' => strval($order_code), //order number
//        'price' => strval($price)                                          //total price
//    );

    $arr_param = array(
//        'merchant_site_code' => strval($this->merchant_site_code), //merchante site ID
        'return_url' => strtolower(urlencode($return_url)), //return uri 
        'receiver' => strval($receiver), //receiver email
//        'transaction_info' => strval($transaction_info), //transaction info
//        'order_code' => strval($order_code), //order number
        'price' => strval($price), //total price
        'product' => Yii::t('app', 'Freeletics Payment'), //total price
        'comments' => Yii::t('app', 'Freeletics Payment Comments'), //total price
    );

    $secure_code = '';
    $secure_code = implode(' ', $arr_param) . ' ' . $this->secure_pass;
    $arr_param['secure_code'] = md5($secure_code);

    //Check if $redirect_url exists or not
    $redirect_url = $this->nganluong_url;
    if (strpos($redirect_url, '?') === false) {
      $redirect_url .= '?';
    } else if (substr($redirect_url, strlen($redirect_url) - 1, 1) != '?' && strpos($redirect_url, '&') === false) {
      // If $redirect_url have '?' at the end but dont have '&', we have to add it to $redirect_url
      $redirect_url .= '&';
    }

    //Url contain parameters
    $url = '';
    foreach ($arr_param as $key => $value) {
      if ($url == '') {
        $url .= $key . '=' . $value;
      } else {
        $url .= '&' . $key . '=' . $value;
      }
    }

    return $redirect_url . $url;
  }

  /* Function to verify infomations returned from nganluong
   * @param $_GET contain parameters returned
   * @return true if infomatinons is right, and otherwise is false 
   */

  public function verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code) {
    // Tạo mã xác thực từ chủ web
    $str = '';
    $str .= ' ' . strval($transaction_info);
    $str .= ' ' . strval($order_code);
    $str .= ' ' . strval($price);
    $str .= ' ' . strval($payment_id);
    $str .= ' ' . strval($payment_type);
    $str .= ' ' . strval($error_text);
    $str .= ' ' . strval($this->merchant_site_code);
    $str .= ' ' . strval($this->secure_pass);

    // verification code from our site
    $verify_secure_code = '';
    $verify_secure_code = md5($str);

    // compare verification code from our site with verification code returned from nganluong.vn
    if ($verify_secure_code === $secure_code) {
      return true;
    }

    return false;
  }

}
