<?php

class PaypalController extends Controller {

  public function actionBuy() {

    // set 
    $paymentInfo['Order']['theTotal'] = Yii::app()->session['theTotal'] = 30.01;
    $paymentInfo['Order']['description'] = "Some payment description here";
    $paymentInfo['Order']['quantity'] = '1';
    $paymentInfo['Order']['Amount'] = '30';

    // call paypal 
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
      echo $error;
      Yii::app()->end();
    } else {
      // send user to paypal 
      $token = urldecode($result["TOKEN"]);

      $payPalURL = Yii::app()->Paypal->paypalUrl . $token;
      $this->redirect($payPalURL);
    }
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

  public function actionDirectPayment() {
    $paymentInfo = array('Member' =>
        array(
            'first_name' => 'Long Hoang Pham',
            'last_name' => 'Pham',
            'billing_address' => '84/14 so may viet nam',
            'billing_address2' => '',
            'billing_country' => 'Vietnam',
            'billing_city' => 'HCM',
            'billing_state' => 'HCM',
            'billing_zip' => '70999'
        ),
        'CreditCard' =>
        array(
            'card_number' => '4137359910489739',
            'expiration_month' => '01',
            'expiration_year' => '2020',
            'cv_code' => '739',
            'credit_type' => "Visa"
        ),
        'Order' =>
        array('theTotal' => 90.00)
    );

    /*
     * On Success, $result contains [AMT] [CURRENCYCODE] [AVSCODE] [CVV2MATCH]  
     * [TRANSACTIONID] [TIMESTAMP] [CORRELATIONID] [ACK] [VERSION] [BUILD] 
     *  
     * On Fail, $ result contains [AMT] [CURRENCYCODE] [TIMESTAMP] [CORRELATIONID]  
     * [ACK] [VERSION] [BUILD] [L_ERRORCODE0] [L_SHORTMESSAGE0] [L_LONGMESSAGE0]  
     * [L_SEVERITYCODE0]  
     */

    $result = Yii::app()->Paypal->DoDirectPayment($paymentInfo);

    //Detect Errors 
    if (!Yii::app()->Paypal->isCallSucceeded($result)) {
      if (Yii::app()->Paypal->apiLive === true) {
        //Live mode basic error message
        $error = 'We were unable to process your request. Please try again later';
      } else {
        //Sandbox output the actual error message to dive in.
        $error = $result['L_LONGMESSAGE0'];
      }
      echo $error;
    } else {
      //Payment was completed successfully, do the rest of your stuff
    }

    Yii::app()->end();
  }

}
