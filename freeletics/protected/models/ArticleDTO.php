<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ArticleDTO extends BaseDTO {

  protected $data = array(
      'id' => '',
      'user_id' => '',
      'user' => '',
      'create_date' => '',
      'last_update' => '',
      'hot' => false,
      'title' => '',
      'content' => '',
      'image_title' => '',
      'summary' => '',
      'likes' => '',
      'tags' => '',
      'category_id' => '',
      'category' => '',
      'comments' => array(),
  );

}
