<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FeedDTO extends BaseDTO {

  protected $data = array(
      'id' => '',
      'user_id' => '',
      'user' => null,
      'comment_id' => '',
      'comment_text' => '',
      'result' => array(),
      'extra_comments' => array(),
      'time' => '',
      'like' => false,
      'exercise' => null,
  );

}