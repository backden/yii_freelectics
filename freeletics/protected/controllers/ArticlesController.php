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
            'actions' => array('index', 'view', 'articles', 'comments'),
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
        $this->redirect('?a=' . $model->id);
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
    $id = Yii::app()->request->getParam('a', null);
    $category = Yii::app()->request->getParam('c', null);
    $isNew = Yii::app()->request->getParam('new', null);
    $auth = User::model()->findByPk(Yii::app()->user->id);
    if (isset($isNew) && isset($auth) && in_array($auth->role, array(2, 3))) {
      $this->render('create', array(
          'model' => new Articles,
      ));
      Yii::app()->end();
    }
    if (isset($id)) {
      $article = Articles::model()->findByPk($id);
      $results = ArticleService::getInstance()->getSpecifyArticle();
      if (isset($article)) {
        $user = User::model()->findByPk($article->user_id);
        $this->render("article_detail", array(
            "articles" => $results['news'],
            "article" => $article,
            'author' => $user,
        ));
      } else {
        $this->redirect(Yii::app()->createUrl("default"));
      }
    } else if (isset($category)) {
      $category = Articles2::model()->findByAttributes(array("name" => $category));
      $results = ArticleService::getInstance()->getSpecifyArticle($category);
      if ($category == null) {
        $this->redirect('/default');
        Yii::app()->end();
      }
      $hotNew = $results['hot'];
      $news = $results['news'];
      $newsOther[] = $results[$category->name];

      $pageCurrent = Yii::app()->request->getParam('page', 1) - 1;
      $pages = new CPagination(count($news));
      $pages->pageSize = 5;
      $pages->setCurrentPage($pageCurrent);
      $news = array_slice($news, $pageCurrent * 5, 5);
      $this->render("articles", array(
          'articles' => $news,
          'hotArticle' => $hotNew,
          'others' => $newsOther,
          'pages' => $pages,
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

  public function actionComments() {
    $user = User::model()->findByPk(Yii::app()->user->id);
    $userId = $first = $last = $avatar = '';
    if ($user != null) {
      $userId = $user->id;
      $first = $user->first;
      $last = $user->last;
      $avatar = $user->avatar;
    }
    $ip = '';
    if ($userId == '') {
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }
    } else {
      $ip = $userId;
    }
    $results = array('results' => array());
    $comments = array(
        'comments' => array(),
        'total_comment' => 0,
        'user' => array(
            'user_id' => $userId,
            'fullname' => $first . ' ' . $last,
            'picture' => $avatar == '' ? Yii::app()->baseUrl . '/css/images/user_blank_picture.png' : $avatar,
            'is_logged_in' => $userId == '' ? false : true,
            'is_add_allowed' => true,
            'is_edit_allowed' => false,
        ),
    );
    $action = Yii::app()->request->getParam("comments", 'list');
    $parent_id = Yii::app()->request->getParam("parent_id", -1);
    $parentComment = CommentDetail::model()->findByAttributes(array("parent_id" => $parent_id));
    $cmms = array();
    switch ($action) {
      case 'add':
        $commentData = array(
            'user_id' => $userId,
            'parent_id' => $parent_id,
            'text' => Yii::app()->request->getParam("text", ''),
            'article_id' => Yii::app()->request->getParam("id", -1),
            'first' => $first,
            'last' => $last,
            'picture' => $avatar,
            'name_to' => isset($parentComment) ? $parentComment->fullname : '',
        );
        $cmms = CommentService::getInstance()->addComment($userId, $commentData, $parent_id);
        if ($cmms != null) {
          $result['status'] = Constant::RS_ST_OK;
        }
        break;
      case 'like':
        $commentId = Yii::app()->request->getParam("comment_id", null);
        if ($commentId == null || trim($commentId) == '') {
          break;
        }
        try {
          $rs = CommentService::getInstance()->addLike($ip, $commentId);
          if ($rs['status'] == true) {
            $results['total'] = count($rs['data']);
            $results['status'] = Constant::RS_ST_OK;
          } else {
            Yii::log(__METHOD__ . " -- Result is false", LOG_ERR);
          }
        } catch (Exception $e) {
          $results['status'] = Constant::RS_ST_ERROR;
          $results['error'] = $e->getMessage();
        }
        break;
      default :
//        $results['status'] = Constant::RS_ST_OK;
        break;
    }
    $articleId = Yii::app()->request->getParam('id');
    $order = Yii::app()->request->getParam('order', null);
    $comments['comments'] = CommentService::getInstance()->getComments($articleId, array('ip' => $ip, 'order' => $order));
    $results['results'] = $comments;
    echo json_encode($results);
  }

}
