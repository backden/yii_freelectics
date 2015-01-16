<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PaymentController extends Controller {

  public function actionIndex() {
    /**
     * TODO: checking timeout transaction
     * Yii::app()->session->add("payment_processing", null);
     */
    Yii::app()->session->add("payment_info", null);
    $typePage = trim(Yii::app()->request->getParam("type_page", 'training'));
    if (!in_array($typePage, array('training', 'nutrition'))) {
      $typePage = 'training';
    }
    $dataPayment = PaymentService::getInstance()->getCostFromCSV(array(
        'typePage' => $typePage,
    ));
    $dataPayment['typePage'] = $typePage;
    $this->render("//partials/payment", array(
        'costs' => explode(";", $dataPayment['costArr']),
        'times' => explode(";", $dataPayment['$costTimes']),
        'unit' => $dataPayment['$unit'],
        'typePage' => $typePage
    ));
  }

  public function actionPaymentPaypal() {
    if (Yii::app()->request->isPostRequest) {
      $payment = Yii::app()->session->get("payment_info", null);
      if ($payment === null) {
        echo json_encode(array(
            "status" => Constant::RS_ST_ERROR,
            "message" => "Payment is null"
        ));
        Yii::app()->end();
      }
    }
  }

  public function actionAddCode() {
    $results = array('status' => Constant::RS_ST_ERROR);
    if (Yii::app()->request->isPostRequest) {
      if (!isset($_POST['type_page']) || !in_array(trim($_POST['type_page']), array('training', 'nutrition'))) {
        
      } else if (isset($_POST['code']) && trim($_POST['code']) != '') {
        $code = $_POST['code'];
        $rs = PaymentService::getInstance()->addCode($code, trim($_POST['type_page']));
        if ($rs) {
          $results['status'] = Constant::RS_ST_OK;
        }
      }
    }
    echo json_encode($results);
  }

  public function actionSavePayment() {
    $results = array('status' => Constant::RS_ST_OK);
    $timeTransaction = Yii::app()->session->get("payment_info", false);
    if ($timeTransaction != false) {
      $results['status'] = Constant::RS_ST_ERROR;
      $results['message'] = Yii::t("app", "Payment is processing! Try again after payment completed");
    } else if (Yii::app()->request->isPostRequest) {
      $paymenInfo = $_POST["Payment"];
      $typePage = isset($_POST['type_page']) && in_array(trim($_POST['type_page']), array("training", 'nutrition')) ? trim($_POST['type_page']) : '';
      if ($typePage != '' && PaymentService::getInstance()->isValid($paymenInfo, $typePage)) {
        $paymenInfo['type_page'] = $typePage;
        $coupons = UserCoupon::model()->findAllByAttributes(array('user_id' => 43));
//        $coupons = UserCoupon::model()->findAllByAttributes(array('user_id' => Yii::app()->user->id));
        foreach ($coupons as $co) {
          $coupon = Coupon::model()->findByPk($co->coupon_id);
          if ($coupon->status != Constant::COUPON_ST_DELETED && $coupon->status != Constant::COUPON_ST_USED) {
            $disCount = PaymentService::getInstance()->processCoupon($coupon, $paymenInfo);
            if ($disCount < 1) {
              continue;
            }
            if ($typePage == 'training') {
              $csv = SystemUtils::getCsvToArray("data/Payment/Payment_cost.csv");
            } else {
              $csv = SystemUtils::getCsvToArray("data/Payment/Payment_nutrition.csv");
            }
            $hasTime = false;
            foreach ($csv as $c) {
              $costs = explode(";", $c['costs']);
              $times = explode(";", $c['times']);
              foreach ($costs as $index => $cost) {
                if ($paymenInfo['cost'] == $cost) {
                  $paymenInfo['using_time'] = $times[$index];
                  $hasTime = true;
                }
              }
            }
            if ($hasTime == false) {
              $results['status'] = Constant::RS_ST_ERROR;
              break;
            }
            $paymenInfo['cost'] = $disCount;
            $paymenInfo['coupon'] = $coupon->code2;
            break;
          }
        }
        Yii::app()->session->add("payment_info", $paymenInfo);
        $results['data'] = $paymenInfo;
      } else {
        $results['status'] = Constant::RS_ST_ERROR;
      }
    }
    echo json_encode($results);
    Yii::app()->end();
  }

  public function actionPayPal() {
    $results = array('status' => Constant::RS_ST_OK);
    /*
      $timeTransaction = Yii::app()->session->get("payment_processing", false);
      if ($timeTransaction != false) {
      $timeTransaction = $timeTransaction + Yii::app()->params['transactionTimeout'];
      }
      if ($timeTransaction != false || $timeTransaction > time()) {
      $results['status'] = Constant::RS_ST_ERROR;
      $results['message'] = Yii::t("app", "Payment is processing! Try again after payment completed");
      } else {

      }
     */
    $paymenInfo = Yii::app()->session->get("payment_info", null);
    if ($paymenInfo === null) {
      $results['status'] = Constant::RS_ST_ERROR;
    } else {
      $paymentExpress = PaymentService::getInstance()->createPayment($paymenInfo);
      if (trim($paymentExpress['url']) === 0 || trim($paymentExpress['error']) != '') {
        $results['status'] = Constant::RS_ST_ERROR;
        $results['error'] = $paymentExpress['error'];
      } else {
        $results['url'] = $paymentExpress['url'];
        Yii::app()->session->add("payment_processing", time());
      }
    }
    echo json_encode($results);
    Yii::app()->end();
  }
  
  public function actionNganLuong() {
    $results = array('status' => Constant::RS_ST_OK);
    $paymenInfo = Yii::app()->session->get("payment_info", null);
    $paymenInfo['returnUrl'] = Yii::app()->createUrl('payment/confirm') . '';
    if ($paymenInfo === null) {
      $results['status'] = Constant::RS_ST_ERROR;
    } else {
      $paymentExpress = PaymentService::getInstance()->createPayment($paymenInfo, Constant::PAYMENT_NGANLUONG);
      if (trim($paymentExpress['url']) === 0) {
        $results['status'] = Constant::RS_ST_ERROR;
      } else {
        $results['url'] = $paymentExpress['url'];
        Yii::app()->session->add("payment_processing", time());
      }
    }
    echo json_encode($results);
    Yii::app()->end();
  }
  
  public function actionConfirm() {
    $results = array('status' => Constant::RS_ST_OK, 'message' => Yii::t('app', 'Payment completed'));

    $token = trim($_GET['token']);
    $payerId = trim($_GET['PayerID']);

    $confirm = PaymentService::getInstance()->confirmPayment(array(
        'token' => $token,
        'PayerID' => $payerId,
    ));
    if ($confirm['status'] == Constant::RS_ST_ERROR) {
      $results['status'] = Constant::RS_ST_ERROR;
      $results['message'] = $confirm['message'];
    }
    /**
     * TODO: checking timeout transaction
     * Yii::app()->session->add("payment_processing", null);
     */
    Yii::app()->session->add("payment_info", null);
    echo json_encode($results);
    Yii::app()->end();
  }
  
  public function actionCancel() {
    //The token of the cancelled payment typically used to cancel the payment within your application
    $token = $_GET['token'];
    /**
     * TODO: checking timeout transaction
     * Yii::app()->session->add("payment_processing", null);
     */
    Yii::app()->session->add("payment_info", null);
    $this->render('cancel');
  }
  

  public function actionTesting() {
    ($result = Yii::app()->Paypal->GetExpressCheckoutDetails("EC-1PB310579D7647413"));
    $result['ORDERTOTAL'] = "40.00";
    var_dump(Yii::app()->Paypal->DoExpressCheckoutPayment($result));
  }

}
