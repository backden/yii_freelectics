<?php

class UserController extends Controller {

  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  public $layout = '//layouts/column2';

  /**
   * @return array action filters
   */
  public function filters() {
    return array(
        'accessControl', // perform access control for CRUD operations
        'postOnly + delete', // we only allow deletion via POST request
    );
  }

  /**
   * Specifies the access control rules.
   * This method is used by the 'accessControl' filter.
   * @return array access control rules
   */
  public function accessRules() {
    return array(
        array('allow', // allow all users to perform 'index' and 'view' actions
            'actions' => array('index', 'view'),
            'users' => array('*'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions' => array('create', 'update'),
            'users' => array('@'),
        ),
        array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions' => array('admin', 'delete'),
            'users' => array('admin'),
        ),
        array('allow', // deny all users
            'actions' => array('create', 'login'),
            'users' => array('*'),
        ),
        array('deny', // deny all users
            'users' => array('*'),
        ),
    );
  }

  /**
   * Displays a particular model.
   * @param integer $id the ID of the model to be displayed
   */
  public function actionView($id) {
    $this->render('view', array(
        'model' => $this->loadModel($id),
    ));
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   */
  public function actionCreate() {
    $model = new User;

// Uncomment the following line if AJAX validation is needed
    $this->performAjaxValidation($model);

    if (isset($_POST['User'])) {
      $model->attributes = $_POST['User'];
      if ($model->save()) {
        echo json_encode(array('status' => true, 'email' => $model->email));
      }
    } else {
      
    }
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id the ID of the model to be updated
   */
  public function actionUpdate($id) {
    $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

    if (isset($_POST['User'])) {
      $model->attributes = $_POST['User'];
      if ($model->save())
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('update', array(
        'model' => $model,
    ));
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'admin' page.
   * @param integer $id the ID of the model to be deleted
   */
  public function actionDelete($id) {
    $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
    if (!isset($_GET['ajax']))
      $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
  }

  /**
   * Lists all models.
   */
  public function actionIndex() {
    $dataProvider = new CActiveDataProvider('User');
    $this->render('index', array(
        'dataProvider' => $dataProvider,
    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new User('search');
    $model->unsetAttributes();  // clear any default values
    if (isset($_GET['User']))
      $model->attributes = $_GET['User'];

    $this->render('admin', array(
        'model' => $model,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return User the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = User::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }

  /**
   * Performs the AJAX validation.
   * @param User $model the model to be validated
   */
  protected function performAjaxValidation($model, $attributes = null) {
    if (isset($_GET['form']) && $_GET['form'] === 'user-form') {
      $result = CActiveForm::validate($model, $attributes);
      if (count(json_decode($result)) > 0) {
        echo json_encode(array('status' => false, 'data' => json_decode($result)));
        Yii::app()->end();
      }
    }
  }

  public function actionLogin() {
    $model = new User;
    $results = array("status" => false, 'message' => '');
    $this->performAjaxValidation($model, array("email", "password"));

    if (isset($_POST['User'])) {
      $model->attributes = $_POST['User'];
      $user = User::model()->findByAttributes(array("email" => $model->email));
      if ($user) {
        if ($user->password === hash('sha256', $model->password . Yii::app()->params['stringcode'])) {
          if ($user->active) {
            $results['status'] = true;
          } else {
            $results['message'] = Yii::t("app", "Account inactive, check email again");
          }
        } else {
          $results['message'] = Yii::t("app", "Email or password incorrect");
        }
      } else {
        $results['message'] = Yii::t("app", "Email or password incorrect");
      }
      echo json_encode($results);
      Yii::app()->end();
    }
  }
  
  public function actionForgot() {
    $model = new User;
    $results = array("status" => false, 'message' => '');
    $this->performAjaxValidation($model, array("email"));

    if (isset($_POST['User'])) {
      $model->attributes = $_POST['User'];
      $user = User::model()->findByAttributes(array("email" => $model->email));
      if ($user) {
        // new password to send email
        $newpass = substr(hash('md5', $user->password . Yii::app()->params['stringcode']), 3, 10);
        $user->password = hash('sha256', $newpass . Yii::app()->params['stringcode']);
        $user->save();
        
        $results['status'] = true;
      } else {
        $results['message'] = Yii::t("app", "Email or password incorrect");
      }
      echo json_encode($results);
      Yii::app()->end();
    }
  }

}
