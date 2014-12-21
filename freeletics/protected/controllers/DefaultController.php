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

  protected function beforeAction($action) {
    if (!Yii::app()->user->isGuest) {
      $this->redirect(Yii::app()->baseUrl . '/index.php/user');
      return false;
    } else {
      if (Yii::app()->controller->action->id != 'index') {
        $this->layout = '//layouts/default_2';
      }
      return parent::beforeAction($action);
    }
  }

  public function actionIndex() {
    $model_user = new User();
    $this->render('index', array('model' => $model_user));
  }

  public function actionAdmin() {
    $this->layout = "//layouts/default_main";
    $this->render('admin');
  }

  public function actionArticles() {
    $id = $this->getActionParams();
    if (isset($id) != null) {
      $this->render("article_detail", array("data" => $this->getActionParams()));
    } else {
      $this->render("articles");
    }
  }

  public function actionLegal() {
    $this->render("summary");
  }

  public function actionCompany() {
    $this->render("summary");
  }

  public function actionGuild() {
    $this->render("summary");
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
