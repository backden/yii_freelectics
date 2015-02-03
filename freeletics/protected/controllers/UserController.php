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
            'actions' => array('index', 'view', 'activeaccount'),
            'users' => array('*'),
        ),
        array('allow', // allow authenticated user to perform 'create' and 'update' actions
            'actions' => array('create', 'update', 'logout', 'home', 'training', 'info', 'feeds', 'challenge',
                'personal', 'profile', 'settings', 'nutrition', 'community', 'feedcomment', 'updateotherfeeds',
                'checknotification'),
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
    if (Yii::app()->user->isGuest && !Yii::app()->request->isPostRequest && !in_array(Yii::app()->controller->action->id, array("activeaccount"))) {
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
        $userParams = array(
            'user_id' => $model->id,
            'email' => $model->email,
            'first' => $model->first,
            'first' => $model->last,
            'create_date' => $model->create_date
        );
        UserServices::getInstance()->sendMail($userParams, "create_user", $model->email);
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
    Yii::app()->session->add("payment_info", null);
    $category = Yii::app()->request->getParam("c", "");
    if (Yii::app()->user->isGuest) {
      $this->redirect("default");
      Yii::app()->end();
    }
    $user = User::model()->findByPk(Yii::app()->user->id);
    if (trim($category) != '' && in_array($category, array("training", "nutrition", "community"))) {
      switch ($category) {
        case "training":
          $this->forward("training");
          break;
        case "nutrition":
          break;
        case "community":
          break;
      }
    } else {
      //UserServices::getInstance()->getRelation($user, 'level', 'user_level');
      $data = array("user" => $user);
      $this->render('//default/user_index', array(
          'data' => $data,
          'dataPayment' => PaymentService::getInstance()->getCostFromCSV(),
          'typePage' => ''
        )
      );
    }
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
    if ((isset($_POST['form']) && $_POST['form'] === 'user-form') ||
      (isset($_GET['form']) && $_GET['form'] === 'user-form')) {
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
    $results = array("status" => true, 'message' => '');
    if (Yii::app()->user->isGuest) {
      $model = new User('login');
      $this->performAjaxValidation($model, array("email", "password"));
      if (isset($_POST['User']) || !Yii::app()->user->isGuest) {
        $userIdentity = new UserIdentity($model->email, $model->password, array('email' => $model->email));
        $results = $userIdentity->authenticate();

        $duration = $model->remember ? Yii::app()->params['durationLogin'] : 3600 * 2;
        Yii::app()->user->login($userIdentity, $duration);
      }
    } else {
      $model = User::model()->findByPk(Yii::app()->user->id);
      $userIdentity = new UserIdentity($model->email, $model->password, array('email' => $model->email));
    }
    $duration = $model->remember ? Yii::app()->params['durationLogin'] : 3600 * 2;
    Yii::app()->user->login($userIdentity, $duration);

    echo json_encode($results);
    Yii::app()->end();
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
          echo json_encode(array('status' => TRUE, 'message' => ''));
        } else {
          echo json_encode(array('status' => FALSE, 'messasge' => "Can't update"));
        }
      } else {
        echo json_encode(array('status' => FALSE, 'messasge' => "Input invalid"));
      }
    } else {
      //$this->forward('/user');
      echo json_encode(array('status' => FALSE, 'messasge' => ''));
    }
    $this->redirect(Yii::app()->createUrl("/user/profile"));
  }

  public function actionLogout() {
    Yii::app()->user->logout();
    $this->forward('/default');
  }

  public function actionTraining() {
    $user = User::model()->findByPk(Yii::app()->user->id);
    $myExercises = unserialize($user->getRelated('exercise')->exercise_ids);
    if (isset(Yii::app()->controller->actionParams['category']) && Yii::app()->controller->actionParams['category'] && isset(Yii::app()->controller->actionParams['exercise']) && Yii::app()->controller->actionParams['exercise']) {
      $exeId = Yii::app()->controller->actionParams['exercise'];
      $categoryId = Yii::app()->controller->actionParams['category'];
      $exercise = Exercise::model()->findByPk($exeId);
      $exerciseCategory = ExerciseCategory::model()->findByPk($categoryId);
      $myResults = $user->getRelated("result_exercise", false, array('exercise_id' => $exeId));
      $criteria = new CDbCriteria;
      $criteria->condition = 'exercise_id = :exeId and user_id = :id';
      $criteria->params = array(':exeId' => $exeId, ':id' => $user->id);
      $criteria->select = 'min(PB) as PB, star';
      $criteria->group = 'PB';
      $bestPB = UserExerciseResult::model()->find($criteria);

      if ($exerciseCategory && $exercise && in_array($exercise->id, $myExercises)) {
        $this->render('play', array(
            'exercise' => $exercise,
            'category' => $exerciseCategory,
            'myResults' => $myResults,
            'bestPB' => $bestPB,
            'feed' => new UserFeeds,
          )
        );
      } else {
        $this->redirect(Yii::app()->baseUrl . "/index.php/user/training/");
      }
    } else {
      $exerciseCategory = ExerciseCategory::model()->findAll();
      $this->render('training', array(
          'myExercises' => $myExercises,
          'exercises' => $exerciseCategory
        )
      );
    }
  }

  public function actionFeeds() {
    $criteria = new CDbCriteria();
    $criteria->limit = 20;
    $criteria->order = 'last_update desc';
    $userFeeds = UserFeeds::model()->findAll($criteria);

    $feeds = array();
    if ($userFeeds) {
      foreach ($userFeeds as $feed) {
        $comment = UserCommunityComment::model()->findbyPk($feed->comment_id);
        $userResult = UserExerciseResult::model()->findByPk($feed->user_result_id);
        $feedDTO = new FeedDTO;
        $feedDTO->__set("id", $feed->id);
        $feedDTO->__set("user_id", $feed->user_id);
        $feedDTO->__set("comment_id", $feed->comment_id);
        $feedDTO->__set("comment_text", $comment->comments);
        $feedDTO->__set("extra_comments", unserialize($feed->extra_comments));
        $feedDTO->__set("like", strpos($feed->extra_like, Yii::app()->user->id) !== false ? true : false);
        $results = array();
        foreach ($userResult as $key => $value) {
          $results[$key] = $value;
        }
        $feedDTO->__set("result", $results);
        $feedDTO->__set("create_date", $feed->create_date);
        $feeds[$feed->id] = $feedDTO;
      }
    }
    $this->render('feed', array(
        'feeds' => $feeds
    ));
  }

  public function actionPersonal() {
    $user = User::model()->findByPk(Yii::app()->user->id);
    $type = Yii::app()->request->getParam('c', '');
    if (trim($type) != '') {
      switch ($type) {
        case 'feed':
          $feeds = UserServices::getInstance()->getAllFeeds($user->id);
          $this->render("user", array('user' => $user, 'data' => array('partial' => 'personal_feeds', 'data' => array('feeds' => $feeds)),));
          break;
        case 'recent':
          $recents = UserServices::getInstance()->getRecentExercise($user->id);
          $this->render("user", array('user' => $user, 'data' => array('partial' => 'personal_recent', 'data' => array('recents' => $recents)),));
          break;
        case 'PB':
          $this->render("user", array('user' => $user, 'data' => array('partial' => 'personal_PB', 'data' => array()),));
          break;
        case 'network':
          $followings = UserServices::getInstance()->getListFollowings();
          $followers = UserServices::getInstance()->getListFollowers();
          $this->render("user", array('user' => $user, 'data' => array(
                  'partial' => 'personal_network',
                  'data' => array(
                      'followings' => $followings,
                      'followers' => $followers,
                  )),
          ));
          break;
      }
    } else {
      $feeds = UserServices::getInstance()->getAllFeeds($user->id);
      $this->render("user", array('user' => $user, 'data' => array('partial' => 'personal_feeds', 'data' => array('feeds' => $feeds)),));
    }
  }

  public function actionUpdateOtherFeeds() {
    $id = Yii::app()->request->getParam("id", null);
    if ($id == null) {
      return;
    }
    $userFollower = UserFollower::model()->findByAttributes(array("user_id" => Yii::app()->user->id));
    $feeds = explode("***", $userFollower->feeds);
    if (in_array($id, $feeds) == false) {
      $feeds[] = $id;
    } else {
      foreach ($feeds as $index => $f) {
        if ($f == $id) {
          unset($feeds[$index]);
          break;
        }
      }
    }
    $userFollower->feeds = implode("***", $feeds);
    $userFollower->update();
    
    $userFollowing = UserFollowing::model()->findByAttributes(array("user_id" => Yii::app()->user->id));
    $feeds = explode("***", $userFollowing->feeds);
    if (in_array($id, $feeds) == false) {
      $feeds[] = $id;
    } else {
      foreach ($feeds as $index => $f) {
        if ($f == $id) {
          unset($feeds[$index]);
          break;
        }
      }
    }
    $userFollowing->feeds = implode("***", $feeds);
    $userFollowing->update();
    echo json_encode(array('status' => Constant::RS_ST_OK));
    Yii::app()->end();
  }

  public function actionProfile() {
    $user = User::model()->findByPk(Yii::app()->user->id);
    $this->render("profile", array('model' => $user));
  }

  public function actionSettings() {
    $this->forward('profile');
  }

  public function actionBlog() {
    $this->forward("blogarticle");
  }

  public function actionFollowing() {
    $following = Yii::app()->request->getParam("follow", '');
    if (trim($following) != '') {
      Yii::app()->end();
    }
    $rs = UserServices::getInstance()->updateFollower(array('follower' => $follower));
    $rs = UserServices::getInstance()->updateFollowing(array('following' => $following));
    echo json_encode($rs);
    Yii::app()->end();
  }

  public function actionFollower() {
    $follower = Yii::app()->request->getParam("follow", '');
    if (trim($follower) != '') {
      Yii::app()->end();
    }
    $rs = UserServices::getInstance()->updateFollower(array('follower' => $follower));
    $rs = UserServices::getInstance()->updateFollowing(array('following' => $following));
    echo json_encode($rs);
    Yii::app()->end();
  }

  public function actionNutrition() {
    Yii::app()->session->add("payment_info", null);
    $this->render("nutrition", array(
        'dataPayment' => PaymentService::getInstance()->getCostFromCSV(array('typePage' => 'nutrition')),
        'typePage' => 'nutrition'
      )
    );
  }

  public function actionCommunity() {
    $userFeeds = UserServices::getInstance()->getFeedRelated(Yii::app()->user->id);

    $feeds = array();
    if ($userFeeds) {
      foreach ($userFeeds as $feed) {
        $comment = UserCommunityComment::model()->findbyPk($feed->comment_id);
        $userResult = UserExerciseResult::model()->findByPk($feed->user_result_id);
        $exercise = Exercise::model()->findByPk($userResult->exercise_id);
        $user = User::model()->findByPk($feed->user_id);

        $datetime1 = new DateTime(date(DateTime::W3C, $userResult->time));
        $datetime2 = new DateTime(date(DateTime::W3C, time()));
        $interval = $datetime1->diff($datetime2);

        $feedDTO = new FeedDTO;
        $feedDTO->__set("id", $feed->id);
        $feedDTO->__set("user_id", $feed->user_id);
        $feedDTO->__set("user", $user);
        $feedDTO->__set("exercise", $exercise);
        $feedDTO->__set("time", $interval->format('%a days'));
        $feedDTO->__set("comment_id", $feed->comment_id);
        $feedDTO->__set("comment_text", $comment->comments);
        $feedDTO->__set("extra_comments", unserialize($feed->extra_comments));
        $feedDTO->__set("like", strpos($feed->extra_like, Yii::app()->user->id) !== false ? true : false);
        $results = array();
        foreach ($userResult as $key => $value) {
          $results[$key] = $value;
        }
        $feedDTO->__set("result", $results);
        $feedDTO->__set("create_date", $feed->create_date);
        $feeds[$feed->id] = $feedDTO;
      }
    }
    $this->render('feed', array(
        'feeds' => $feeds
    ));
  }

  public function actionFeedComment() {
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
    $feedId = Yii::app()->request->getParam('id');
    $order = Yii::app()->request->getParam('order', null);
    $comments['comments'] = CommentService::getInstance()->getCommentFeed($feedId, array('ip' => $ip, 'order' => $order));
    $comments['total_comment'] = count($comments['comments']);
    $results['results'] = $comments;
    echo json_encode($results);
    Yii::app()->end();
  }

  public function actionChallenge() {
    if (!Yii::app()->request->isPostRequest) {
      $exercises = Exercise::model()->findAll();
      $user = User::model()->findByPk(Yii::app()->user->id);
      $myExercises = unserialize($user->getRelated('exercise')->exercise_ids);
      $exerciseCategory = ExerciseCategory::model()->findAll();
      $users = UserServices::getInstance()->getUserChallenge();
      $this->render("challenge", array(
          'myExercises' => $myExercises,
          'exercises' => $exerciseCategory,
          'users' => $users
      ));
    } else {
      $exercises = Yii::app()->request->getParam("exercises");
      $users = Yii::app()->request->getParam("user");
      $time = Yii::app()->request->getParam("time");
      if ($exercises != null && $users != null && $time != null) {
        $exercises = explode(",", $exercises);
        $users = explode(",", $users);
        $_exercise = array();
        foreach ($exercises as $exercise) {
          $exe = Exercise::model()->findByPk($exercise);
          if ($exe) {
            $_exercise[] = $exe->id;
          }
        }
        $owner = User::model()->findByPk(Yii::app()->user->id);
        foreach ($users as $user) {
          $us = User::model()->findByPk($user);
          if ($us) {
            if (UserServices::getInstance()->isCanChallenge($us)) {
              //invite
              $noti = new UserNotification;
              $noti->title = Yii::t("app", "message_invitation_challenge_personal", array("[0]" => $owner->first . ' ' . $owner->last));
              $noti->text = "";
              $noti->user_id = $us->id;
              $noti->save();
            }
          }
        }
        $challenge = new Challenge;
        $challenge->challenger = Yii::app()->user->id;
        // currently, 1 user invited
        $challenge->user_id = $user = implode(",", $users);
        $challenge->exercises = implode(",", $_exercise);
        $challenge->time = $time;
        if ($challenge->save()) {
          $this->render("challenge_complete", array(
          ));
        } else {
          
        }
      }
    }
  }

  public function actionCheckNotification() {
    $noti = UserServices::getInstance()->checkNotification(Yii::app()->user->id);
    $results = array('status' => Constant::RS_ST_OK, 'hasNew' => count($noti) > 0, 'notification' => $noti);

    echo json_encode($results);
    Yii::app()->end();
  }

  public function actionActiveAccount() {
    $token = Yii::app()->request->getParam("token", '');
    $userActive = UserActive::model()->findByAttributes(array(
        'token' => $token
    ));
    if ($userActive) {
      if (strtotime($userActive->create_date) + 60 * 15 < time()) {
        $this->layout = '//layouts/default';
        $this->render("//default/default", array('model' => new User()));
      } else {
        $userActive->confirm = date('Y-m-d H:i:s', time());
        $userActive->update();

        $user = User::model()->findByPk($userActive->user_id);
        $user->active = 1;
        $user->update();

        $this->redirect(Yii::app()->createUrl("default"));
      }
    } else {
      echo "ERROR";
    }
  }

}
