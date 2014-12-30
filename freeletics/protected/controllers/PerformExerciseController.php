<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PerformExerciseController extends Controller {

  public $layout = '';

  protected function beforeAction($action) {
    return parent::beforeAction($action);
  }

  public function actionExecute() {
    $results = array(
        'status' => Constant::RS_ST_OK,
        'message' => '',
        'start' => false
    );
    $isStar = false;
    $exeId = Yii::app()->request->getParam('exercise', null);
    if ($exeId === null) {
      echo json_encode($results);
      Yii::app()->end();
    }
    $time = Yii::app()->request->getParam('time', 0);
    $this->layout = null;
    if ($time != 0) {
      // stop/pause
      $startTime = Yii::app()->user->getState('timeStart', false);
      if ($startTime === false) {
        $results['status'] = Constant::RS_ST_ERROR;
        $results['message'] = 'Start Time ' . $startTime;
        echo json_encode($results);
        Yii::app()->end();
      }
      $currentTime = time();
      $timeDiff = $currentTime - $startTime;
      if ($timeDiff > $time) {
        $timeDiff = $time;
      }
      $timer = gmdate('H:i:s', $timeDiff);

      // save into DB
      $userResult = UserExerciseResult::model()->findByAttributes(
        array(
          "user_id" => Yii::app()->user->id,
          "exercise_id" => $exeId
        ), 'star = 0'
      );
      $user = UserExercise::model()->findByAttributes(array(UserExercise::USER_ID => Yii::app()->user->id));
      $exes = unserialize($user->exercise_ids);
      if (!in_array($exeId, $exes)) {
        $results['status'] = Constant::RS_ST_ERROR;
        echo json_encode($results);
        Yii::app()->end();
      }
      // exercise first training
      if ($userResult === NULL) {
        $exercise = Exercise::model()->findByPk($exeId);
        if ($exercise) {
          $total = Yii::app()->user->getState('checkpoint', 0);
          if ($total == $exercise->total - 1) {
            $isStar = true;
            $results['message'] = $isStar;
          } else {
            $results['message'] = $total;
          }
        } else {
          $results['status'] = Constant::RS_ST_ERROR;
          $results['message'] = '';
        }
        $newResult = new UserExerciseResult();
        $attributes = array(
            UserExerciseResult::EXERCISE_ID => $exeId,
            UserExerciseResult::USER_ID => Yii::app()->user->id,
            UserExerciseResult::PB => $timer,
            UserExerciseResult::TIME => time(),
          //UserExerciseResult::FEED_ID => $exeId,
        );
        if ($isStar) {
          $attributes['star'] = true;
        }
        $result = UserServices::getInstance()->updateExerciseResult($newResult, $attributes, true);
        if ($result['status'] == Constant::RS_ST_OK) {
          $results['status'] = Constant::RS_ST_OK;
        } else {
          $results['status'] = Constant::RS_ST_ERROR;
          $results['message'] = $result['message'];
        }
      } else {
        $exercise = Exercise::model()->findByPk($exeId);
        if ($exercise) {
          $total = Yii::app()->user->getState('checkpoint', 0);
          if ($total == $exercise->total - 1) {
            $isStar = true;
            $results['message'] = $isStar;
          } else {
            $results['message'] = $total;
          }
        } else {
          $results['status'] = Constant::RS_ST_ERROR;
          $results['message'] = '';
        }
        $attributes = array(
            UserExerciseResult::PB => $timer,
          //UserExerciseResult::FEED_ID => $exeId,
        );
        if ($isStar) {
          $attributes[UserExerciseResult::STAR] = true;
          $result = UserServices::getInstance()->updateExerciseResult($userResult, $attributes, false);
        } else if ($userResult->PB > $timer) {
          $result = UserServices::getInstance()->updateExerciseResult($userResult, $attributes, false);
        }
        if ($results['status'] == Constant::RS_ST_OK) {
          $results['status'] = Constant::RS_ST_OK;
        } else {
          $results['status'] = Constant::RS_ST_ERROR;
          $results['message'] = $result['message'];
        }
      }

      //Yii::app()->user->setState('timer', $timer);
      Yii::app()->user->setState('timeStart', false);
      $results['time'] = $timer;
      $results['star'] = $isStar ? Yii::t('app', 'Starred') : '';
    } else if ($time == 0) {
      // start
      Yii::app()->user->setState('timeStart', true);
      Yii::app()->user->setState('time_check', time());
      Yii::app()->user->setState('checkpoint', 0);
      $results['time'] = time();
      $results['start'] = true;
    }
    echo json_encode($results);
    Yii::app()->end();
  }

  public function actionCheckPoint() {
    $results = array(
        'status' => Constant::RS_ST_OK,
        'message' => '',
    );
    if (Yii::app()->request->isAjaxRequest) {
      $previousCheckPoint = Yii::app()->user->getState('time_check', time());
      if (time() - $previousCheckPoint >= Constant::TIME_CHECKPOINT) {
        // save checkpoint
        $check = Yii::app()->user->getState('checkpoint', 1);
        Yii::app()->user->setState('checkpoint', ++$check);
        Yii::app()->user->setState('time_check', time());
        $results['message'] = 'Checkpoint ' . $check . ' ' . Yii::app()->user->getState('timeStart', -1);
        ;
      } else {
        $results['status'] = Constant::RS_ST_ERROR;
        $results['message'] = 'Cheat';
      }
    } else {
      $results['status'] = Constant::RS_ST_ERROR;
      $results['message'] = 'sdaf';
    }
    echo json_encode($results);
    Yii::app()->end();
  }

}
