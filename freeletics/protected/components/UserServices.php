<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserServices extends BaseService{
  
  public static function getInstance() {
    return parent::getInstance(__CLASS__);
  }
  
  public function updateRelation($userId = null, $relation = '', $params = array()) {
    if ($userId === null  || $relation == '') {
      return false;
    }
    
    $model = User::model()->findByPk($userId);
    if ($model !== NULL) {
      $class = ModelUtils::returnClassName($relation);
      $rlModel = $class::model()->findByAttributes(array("user_id" => $userId));
      $rlModel->attributes = $params;
      $result = $rlModel->update();
      if ($result) {
        return true;
      }
    }
    return false;
  }
  
}