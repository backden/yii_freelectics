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
      $feedFLs = explode("***", $userFL->feeds);
      foreach ($fls as $index => $f) {
        if ($f == '') {
          continue;
        }
        $fl = array(
            'user' => User::model()->findByPk($f),
            'isFeed' => in_array($f, $feedFLs),
        );
        $followings[] = $fl;
      }
    }
    return $followings;
  }

  public function getListFollowers() {
    $followers = array();
    $userFL = UserFollower::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
    if ($userFL != null) {
      $fls = explode("***", $userFL->follower);
      $feedFLs = explode("***", $userFL->feeds);
      foreach ($fls as $index => $f) {
        if ($f == '') {
          continue;
        }
        $fl = array(
            'user' => User::model()->findByPk($f),
            'isFeed' => in_array($f, $feedFLs),
        );
        $followers[] = $fl;
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
  
  public function updateFollower($params) {
    $results = array(
        'status' => Constant::RS_ST_OK,
        'message' => '',
    );
    $follower = $params['follower'];
    $rs = User::model()->findByPk($follower);
    if ($rs != null) {
      $userFL = UserFollower::model()->findByAttribute(array('user_id' => Yii::app()->user->id));
      $fls = explode("***", $userFL->follower);
      if ($fls != false) {
        $isExisted = false;
        foreach ($fls as $index => $f) {
          if ($f == $follower) {
            $isExisted = true;
            unset($fls[$index]);
          }
        }
        if (!$isExisted) {
          $fls[] = $following;
        }
        $userFL->follower = implode("***", $fls);
        $userFL->update();
      } else {
        $results['status'] = Constant::RS_ST_ERROR;
      }
    }
    return $results;
  }

  /**
   * View feed of followings/followers
   * @param type $params
   */
  public function updateViewFeeds($params) {
    $notifiList = $params['notifis'];
    if (isset($params['type']) == false) {
      throw new Exception("Error");
    }
    $type = $params['type'];
  }

  public function getFeedRelated($id) {
    $users = $this->_getUserForFeeds($id);
    $users[] = $id;
    $criteria = new CDbCriteria();
    $criteria->addInCondition("user_id", $users);
    $criteria->limit = 20;
    $criteria->order = 'last_update desc';
    $userFeeds = UserFeeds::model()->findAll($criteria);
    return $userFeeds;
  }

  private function _getUserForFeeds($id) {
    $uFollower = UserFollower::model()->findByAttributes(array("user_id" => $id));
    $uFollowing = UserFollowing::model()->findByAttributes(array("user_id" => $id));
    $user = explode("***", $uFollower->feeds);
    $fl = explode("***", $uFollowing->feeds);
    foreach ($fl as $f) {
      $user[] = $f;
    }
    return $user;
  }

  public function getUserChallenge() {
    return User::model()->findAll();
  }

  /**
   * Checking user can challenge
   * 
   * @param type $user
   * @return boolean
   */
  public function isCanChallenge($user) {
    return true;
  }

  public function sendMail($userParams, $type, $to = "", $from = "") {

    //create token
    $data = "";
    foreach ($userParams as $param) {
      $data .= $param;
    }
    $data .= time() . Yii::app()->params["stringcode"];
    $token = hash('sha512', $data);

    $userActive = new UserActive;
    $userActive->user_id = $userParams['user_id'];
    $userActive->token = $token;
    $userActive->url = Yii::app()->params["domain"] . Yii::app()->baseUrl . "/index.php/user/activeaccount?token=" . $token;
    $userActive->save();

    $mail = Yii::app()->Smtpmail;
    $mail->SMTPDebug = 1;
    $mail->SetFrom($from == '' ? Yii::app()->params['adminEmail'] : $from, Yii::app()->params["CompanyName"]);
    $mail->Subject = "Hello, your account...";
    $mail->MsgHTML("Your account is create, but not active.<br/><a href='" . $userActive->url . "'>Active now!</a>");
    $mail->AddAddress($to, "");
    if (!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      //echo "Message sent!";
    }
  }

  public function getAllFeeds($id) {
    $crite = new CDbCriteria();
    $crite->condition = "user_id = :id";
    $crite->params = array(
        ":id" => $id,
    );
    $crite->order = "last_update desc, create_date desc";
    $userFeeds = UserFeeds::model()->findAll($crite);

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
    return $feeds;
  }

  public function getRecentExercise($id) {
    $crite = new CDbCriteria();
    $crite->condition = "user_id = :id";
    $crite->params = array(
        ":id" => $id,
    );
    $crite->order = "last_update desc, create_date desc";
    $userRecents = UserExerciseResult::model()->findAll($crite);
    $data = array();
    foreach ($userRecents as $recent) {
      $exercise = Exercise::model()->findByPk($recent->exercise_id);
      $recentDTO = array(
          'recent' => $recent,
          'exercise' => $exercise,
      );
      $data[$recent->id] = $recentDTO;
    }
    return $data;
  }

}
