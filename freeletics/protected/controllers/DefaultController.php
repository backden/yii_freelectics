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
      if (in_array(strtolower($this->action->id), array("articles", "legal", "company", "guild"))) {
        $this->layout = '//layouts/default_2';
        return parent::beforeAction($action);
      } else {
        $this->redirect(Yii::app()->baseUrl . '/index.php/user');
      }
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
    $this->layout = "//layouts/default";
    $this->redirect(Yii::app()->createUrl('/articles'));
  }

  public function actionLegal() {
    $this->render("summary");
  }

  public function actionCompany() {
    $this->render("summary");
  }

  public function actionGuild() {
    $this->render("summary", array(
        'type' => Yii::app()->request->getParam("link"),
    ));
  }

  public function actionSupport() {
    $this->redirect(Yii::app()->createUrl("support"));
  }

}
