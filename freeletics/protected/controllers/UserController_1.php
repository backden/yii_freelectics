<?php

class UserController extends Controller {

  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  public $layout = "//layouts/default_main";

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
            'actions' => array('create', 'update', 'logout', 'home', 'training', 'info'),
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

  protected function beforeAction($action) {
    if (Yii::app()->user->isGuest && !Yii::app()->request->isPostRequest) {
      $this->forward('/');
      return true;
    } else {
      return parent::beforeAction($action);
    }
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
    $model = new User('register');

// Uncomment the following line if AJAX validation is needed
    $result = $this->performAjaxValidation($model);

    if (isset($_POST['User'])) {
      $model->attributes = $_POST['User'];
      $model->changePW = true;
      if ($model->save()) {
        echo json_encode(array('status' => true, 'email' => $model->email));
      } else {
        echo json_encode($result);
      }
    } else {
      echo json_encode($result);
    }
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
    $this->render('home');
  }
  
  public function actionTraining() {
    $this->render('training');
  }
  
  public function actionInfo() {
    $this->render('//default/user');
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
  protected function performAjaxValidation($model, $attributes = null, $show = true) {
    if (isset($_GET['form']) && $_GET['form'] === 'user-form') {
      $result = CActiveForm::validate($model, $attributes);
      if (count(json_decode($result)) > 0) {
        if ($show) {
          echo json_encode(array('status' => false, 'data' => json_decode($result)));
          Yii::app()->end();
        }
        return array('status' => false, 'data' => json_decode($result));
      } else {
        return true;
      }
    }
  }

  public function actionLogin() {
    $model = new User('login');
    $this->performAjaxValidation($model, array("email", "password"));

    if (isset($_POST['User'])) {
      $userIdentity = new UserIdentity($model->email, $model->password, array('email' => $model->email));
      $results = $userIdentity->authenticate();

      $duration = $model->remember ? Yii::app()->params['durationLogin'] : 3600 * 2;
      Yii::app()->user->login($userIdentity, $duration);

      echo json_encode($results);
      Yii::app()->end();
    }
  }

  public function actionForgot() {
    $model = new User;
    $results = array("status" => false, 'message' => '');
    $result = $this->performAjaxValidation($model, array("email"));

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

  public function actionUpdate() {
    if (Yii::app()->request->isPostRequest) {
      $model = User::model()->findByPk(Yii::app()->user->id);
      $newModel = new User('update');
      $attrs = array();
      if (isset($_POST['User'])) {
        foreach ($_POST['User'] as $key => $value) {
          $attrs[] = $key;
        }
      }
      $result = $this->performAjaxValidation($newModel, $attrs, false);
      if (isset($_POST['User']) && $result === TRUE) {
        $model->isNewRecord = false;
        $model->last_update = date("Y-m-d H:i:s", time());
        $model->attributes = $_POST['User'];
        if ($model->update()) {
          echo json_encode(array('status' => TRUE));
        } else {
          echo json_encode(array('status' => FALSE));
        }
        Yii::app()->end();
      } else {
        echo json_encode($result);
        Yii::app()->end();
      }
    } else {
      $this->forward('/user');
    }
  }

  public function actionLogout() {
    Yii::app()->user->logout();
    $this->forward('/default');
  }

}
