<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Constant {
  const RS_ST_OK = 'OK';
  const RS_ST_ERROR = 'ERROR';
  
  const TIMER_BEFORE_START = 5;
  // 2 second
  const TIME_CHECKPOINT = 0;
  
  /**
   * Constants coupon code
   */
  const PAYMENT_NUTRITRION = 'nutritrion';
  const PAYMENT_TRAINING = 'training';
  const COUPON_ST_CREATED = 0;
  const COUPON_ST_USED = 1;
  const COUPON_ST_DELETED = 2;
  const COUPON_ST_USED_TRAINING = 3;
  const COUPON_ST_USED_NUTRITION = 4;
  
  const TYPE_DISCOUNT_PERCENT = 0;
  const TYPE_DISCOUNT_COST = 1;
  
  const TYPE_LARGER = 0;// >=
  const TYPE_SMALLER = 1; // <=
  const TYPE_BETWEEN = 2; // a ~ b
  
}