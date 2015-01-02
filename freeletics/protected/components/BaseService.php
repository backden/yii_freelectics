<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaseService {

  protected static $instance = null;

  protected static function getInstance($class) {
    if (self::$instance === null) {
      return self::$instance = new $class();
    }
    return self::$instance;
  }
  
  protected function getRootDir() {
    return Yii::getPathOfAlias('webroot');
  }

  public function getRelation($model, $attrName, $tableRelativeName) {
    $modelRelativeName = ModelUtils::returnClassName($tableRelativeName);
    if (class_exists($modelRelativeName)) {
      $model->data[$attrName] = $modelRelativeName::model()->findByAttributes(array('user_id' => $model->id));
    }
    return $model;
  }

  public function processRequest() {
    
  }

}
