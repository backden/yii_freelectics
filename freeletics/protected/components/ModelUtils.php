<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelUtils {
  
  public static function returnModelByClassName($className, $params = array()) {
    return new $className();
  }
  
  public static function returnModelByUnderScore($under_score) {
    $modelClassName = SystemUtils::underScoreToCamelCase($under_score);
    return new $modelClassName();
  }
  
  /**
   * 
   * @param type $under_score
   * @return CActiveRecord
   */
  public static function returnClassName($under_score) {
    $modelClassName = SystemUtils::underScoreToCamelCase($under_score);
    return $modelClassName;
  }
}