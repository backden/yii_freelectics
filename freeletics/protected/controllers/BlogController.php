<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BlogController extends Controller {
  
  public $layout = "//layouts/default_main";
  
  public function actionIndex() {
    $id = Yii::app()->request->getParam("user", "");
    if ($id == '') {
      $this->redirect("default");
    }
    $cri = new CDbCriteria();
    $cri->condition = "user_id = :id";
    $cri->params = array(":id" => $id);
    $cri->order = "last_update desc";
    $cri->limit = 10;
    $blogs = Blog::model()->findAll($cri);
    $this->render("index", array(
        'blogs' => $blogs,
        'page' => Yii::app()->request->getParam("page", 1),
    ));
  }
  
  public function actionView() {
    
  }
}