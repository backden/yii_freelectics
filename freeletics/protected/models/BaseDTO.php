<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BaseDTO {

  protected $data = array();

  public function toArray() {
    return $this->data;
  }

  public function __get($name) {
    if (isset($this->data[$name])) {
      return $this->data[$name];
    }
    return false;
  }

  public function __set($name, $value) {
    $this->data[$name] = $value;
  }
  
}
