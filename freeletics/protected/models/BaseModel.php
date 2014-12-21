<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaseModel extends CActiveRecord {

  protected $data = array();
  
//  protected function __get($property) {
//    if (isset($this->property)) {
//      return $this->$property;
//    }
//    return $this->data[$property];
//  }
//
//  public function __set($property, $value) {
//    if (property_exists($this, $property)) {
//      $this->$property = $value;
//    }
//    $this->data[$property] = $value;
//  }

}
