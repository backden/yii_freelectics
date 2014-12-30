<?php

class ArticlesController extends Controller {

  /**
   * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
   * using two-column layout. See 'protected/views/layouts/column2.php'.
   */
  public $layout = '//layouts/default_2';

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
            'actions' => array('index', 'view', 'articles'),
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
    $model = new Articles;

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if (isset($_POST['Articles'])) {
      $model->attributes = $_POST['Articles'];
      if ($model->save())
        $this->redirect(array('view', 'id' => $model->id));
    }

    $this->render('create', array(
        'model' => $model,
    ));
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

    if (isset($_POST['Articles'])) {
      $model->attributes = $_POST['Articles'];
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
//    $dataProvider = new CActiveDataProvider('Articles');
    $this->forward('Articles');
//    $this->render('index', array(
//        'dataProvider' => $dataProvider,
//    ));
  }

  /**
   * Manages all models.
   */
  public function actionAdmin() {
    $model = new Articles('search');
    $model->unsetAttributes();  // clear any default values
    if (isset($_GET['Articles']))
      $model->attributes = $_GET['Articles'];

    $this->render('admin', array(
        'model' => $model,
    ));
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   * @param integer $id the ID of the model to be loaded
   * @return Articles the loaded model
   * @throws CHttpException
   */
  public function loadModel($id) {
    $model = Articles::model()->findByPk($id);
    if ($model === null)
      throw new CHttpException(404, 'The requested page does not exist.');
    return $model;
  }

  /**
   * Performs the AJAX validation.
   * @param Articles $model the model to be validated
   */
  protected function performAjaxValidation($model) {
    if (isset($_POST['ajax']) && $_POST['ajax'] === 'articles-form') {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }
  }

  public function actionArticles() {
    $id = Yii::app()->request->getParam('id', null);
    $category = Yii::app()->request->getParam('c', null);
    if (isset($id)) {
      $this->render("article_detail", array("data" => $this->getActionParams()));
    } else if (isset($category)) {
      $category = Articles2::model()->findByAttributes(array("name" => $category));
      if ($category == null) {
        $this->redirect('/default');
        Yii::app()->end();
      }
      $results = ArticleService::getInstance()->getSpecifyArticle($category);
      $hotNew = $results['hot'];
      $news = $results['news'];
      $newsOther[] = $results[$category->name];
      
      $pages = new CPagination(count($news));
      $pages->pageSize = 10;
      $pages->setCurrentPage(Yii::app()->request->getParam('page', 1));
      
      $this->render("articles", array(
          'articles' => $news,
          'hotArticle' => $hotNew,
          'others' => $newsOther,
          'pages'=> $pages,
      ));
    } else {
      $article_other = array(
          "articles_training",
          "articles_nutrition",
          "articles_motivation",
          "articles_lifestyle",
          "articles_success_stories",
      );
      $results = ArticleService::getInstance()->getSummarizeArticle($article_other);
      $hotNew = $results['hot'];
      $news = $results['news'];
      $newsOther = array();
      foreach ($article_other as $other) {
        $newsOther[$other] = $results[$other];
      }
      $this->render("articles", array(
          'articles' => $news,
          'hotArticle' => $hotNew,
          'others' => $newsOther,
      ));
    }
  }

}
