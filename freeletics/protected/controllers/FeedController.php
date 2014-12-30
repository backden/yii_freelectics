<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FeedController extends Controller {

  public function actionNewFeed() {
    $results = array(
        'status' => Constant::RS_ST_OK,
        'message' => '',
    );
    $comment = Yii::app()->request->getParam('comment');
    $exeId = Yii::app()->request->getParam('exercise-id');
    $userComment = new UserCommunityComment;

    $user = User::model()->findByPk(Yii::app()->user->id);
    if ($user !== null) {
      $feed = new UserFeeds();
      $feed->user_id = $user->id;
    }

    $userComment->comments = $comment;
    if (isset($feed) && $userComment->save()) {
      $criteria = new CDbCriteria;
      $criteria->condition = 'exercise_id = :exeId and user_id = :id and comment_id is NULL';
      $criteria->params = array(':exeId' => $exeId, ':id' => Yii::app()->user->id);

      $userResult = UserExerciseResult::model()->find($criteria);
      $userResult->comment_id = $userComment->id;

      $feed->comment_id = $userComment->id;
      $feed->user_result_id = $userResult->id;
      $feed->create_date = time();

      if ($userResult->update() && $feed->save()) {
        $results['status'] = Constant::RS_ST_OK;
      } else {
        $results['status'] = Constant::RS_ST_ERROR;
      }
    } else {
      // server error
      $results['status'] = Constant::RS_ST_ERROR;
    }
    $this->redirect(Yii::app()->createUrl('/user/training'));
  }

  public function actionAddComment() {
    $results = array(
        'status' => Constant::RS_ST_OK,
        'message' => '',
    );

    $content = Yii::app()->request->getParam("content");
    $idFeed = Yii::app()->request->getParam("id");
    $idUser = Yii::app()->request->getParam("user_id");
    $feed = UserFeeds::model()->findByPk($idFeed);
    $user = User::model()->findByPk($idUser);
    if ($feed != null && $user != null) {
      $extras = unserialize($feed->extra_comments);
      if ($extras == false) {
        $extras = array();
      }
      $time = time();
      $ext = array(
          'id' => $idFeed,
          'user_id' => $user->id,
          'content' => $content,
          'create_date' => $time,
      );
      $extras[] = $ext;
      $feed->extra_comments = serialize($extras);
      $feed->last_update = time();
      if ($feed->update()) {
        $results['create_date'] = $time;
      } else {
        $results['status'] = Constant::RS_ST_ERROR;
      }
    } else {
      $results['status'] = Constant::RS_ST_ERROR;
    }
    echo json_encode($results);
    Yii::app()->end();
  }

  public function actionLike() {
    $results = array(
        'status' => Constant::RS_ST_OK,
        'message' => '',
    );
    $idFeed = Yii::app()->request->getParam("feed");
    $idUser = Yii::app()->user->id;

    $feed = UserFeeds::model()->findByPk($idFeed);
    $user = User::model()->findByPk($idUser);
    if ($feed != null && $user != null) {
      $time = time();
      if (strpos($feed->extra_like, $idUser) === false) {
        $feed->extra_like = $feed->extra_like . '; ' . $user->id;
        $feed->like = ++$feed->like;
        if ($feed->update()) {
          $results['create_date'] = $time;
        } else {
          $results['status'] = Constant::RS_ST_ERROR;
        }
      } else {
        $results['status'] = Constant::RS_ST_ERROR;
      }
    } else {
      $results['status'] = Constant::RS_ST_ERROR;
    }
    echo json_encode($results);
    Yii::app()->end();
  }

}
