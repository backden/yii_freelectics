<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdministratorController extends Controller {
  public $layout = "//layouts/admin/default";
  
  public function actionIndex() {
    $this->render('index');
  }
  
  public function actionCreateCodeCoupon() {
    if (Yii::app()->request->getIsPostRequest()) {
      $this->forward('//coupon/create');
    } else {
      $this->forward("//coupon/create");
    }
  }
  
}