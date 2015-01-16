<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserServices extends BaseService {

  /**
   * 
   * @return UserServices
   */
  public static function getInstance() {
    return parent::getInstance(__CLASS__);
  }

  public function updateRelation($userId = null, $relation = '', $params = array()) {
    if ($userId === null || $relation == '') {
      return false;
    }

    $model = User::model()->findByPk($userId);
    if ($model !== NULL) {
      $class = ModelUtils::returnClassName($relation);
      $rlModel = $class::model()->findByAttributes(array("user_id" => $userId));
      $rlModel->attributes = $params;
      $result = $rlModel->update();
      if ($result) {
        return true;
      }
    }
    return false;
  }

  public function updateExerciseResult($userResult, $attributes, $save = false) {
    $results = array(
        'status' => Constant::RS_ST_OK,
        'message' => '',
        'start' => false
    );
    $userResult->attributes = $attributes;
    if (!$save && $userResult->update()) {
      $results['status'] = Constant::RS_ST_OK;
    } else if ($save && $userResult->save()) {
      $results['status'] = Constant::RS_ST_OK;
    } else {
      $results['status'] = Constant::RS_ST_ERROR;
      $results['message'] = $userResult->getErrors();
    }
    return $results;
  }

  public function getListFollowings() {
    $followings = array();
    $userFL = UserFollowing::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
    if ($userFL != null) {
      $fls = explode("***", $userFL->following);
      foreach ($fls as $index => $f) {
        $followings[] = User::model()->findByPk($f);
      }
    }
    return $followings;
  }

  public function getListFollowers() {
    $followers = array();
    $userFL = UserFollower::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
    if ($userFL != null) {
      $fls = explode("***", $userFL->follower);
      foreach ($fls as $index => $f) {
        $followers[] = User::model()->findByPk($f);
      }
    }
    return $followers;
  }

  public function updateFollowing($params) {
    $results = array(
        'status' => Constant::RS_ST_OK,
        'message' => '',
    );
    $following = $params['following'];
    $rs = User::model()->findByPk($following);
    if ($rs != null) {
      $userFL = UserFollowing::model()->findByAttribute(array('user_id' => Yii::app()->user->id));
      $fls = explode("***", $userFL->following);
      if ($fls != false) {
        $isExisted = false;
        foreach ($fls as $index => $f) {
          if ($f == $following) {
            $isExisted = true;
            unset($fls[$index]);
          }
        }
        if (!$isExisted) {
          $fls[] = $following;
        }
        $userFL->following = implode("***", $fls);
        $userFL->update();
      } else {
        $results['status'] = Constant::RS_ST_ERROR;
      }
    }
    return $results;
  }
  
  public function updateViewFeeds($params) {
    $notifi = $params['notifis'];
    
  }

}
