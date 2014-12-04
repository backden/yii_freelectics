<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DefaultController extends Controller {

  public $layout = '//layouts/default';

  public function accessRules() {
    return array(
        array('allow', // allow all users to access 'index' and 'view' actions.
            'actions' => array('index', 'support', 'support_view'),
            'users' => array('*'),
        ),
        array('allow', // allow authenticated users to access all actions
            'users' => array('@'),
        ),
        array('deny', // deny all users
            'users' => array('?'),
        ),
    );
  }

  public function actionIndex() {
    $this->render('index');
  }
  
  public function actionUser() {
    $this->layout = "//layouts/default_main";
    $this->render('user');
  }
  
  public function actionAdmin() {
    $this->layout = "//layouts/default_main";
    $this->render('admin');
  }
  
  public function actionSupport() {
    $this->layout = "//layouts/default_main";

    if (isset($this->actionParams['id'])) {
      $data['message'] = $this->actionParams['id'];
      $this->render('support_view', $data);
    } else {
      $this->render('support');
    }
  }

}
