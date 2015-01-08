<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CouponService extends BaseService {
  
  /**
   * 
   * @param type $class
   * @return CouponService
   */
  public static function getInstance($class = __CLASS__) {
    return parent::getInstance($class);
  }
  
  public function getRandomCode($options = array()) {
    $settings = array();
    $settings["salt"] = SystemUtils::randomString();
    $settings = $settings + $options;
    var_dump($settings);
    exit;
  }
  
  public function checkingCoupCode($code) {
    $cre = new CDbCriteria();
    $cre->condition = "code = :code OR code2 = :code";
    $cre->params = array(":code" => $code);
    $coupon = Coupon::model()->findByAttributes($cre);
    if ($coupon != null && Yii::app()->user->id != null && !Yii::app()->user->isGuest) {
      $user = User::model()->findByPk(Yii::app()->user->id);
    } else {
      
    }
  }
}