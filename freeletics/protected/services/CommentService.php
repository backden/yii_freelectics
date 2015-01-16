<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CommentService extends BaseService {

  /**
   * 
   * @param type $class
   * @return CommentService
   */
  public static function getInstance($class = __CLASS__) {
    return parent::getInstance($class);
  }

  public function addComment($userId, $commentData = array(), $articleId = '') {
    $user = User::model()->findByPk($userId);
    if ($user != null) {
      $comment = new CommentDetail;
      $comment->comment_id = uniqid("Cmt_");
      $comment->parent_id = $commentData['parent_id'];
      $comment->article_id = $commentData['article_id'];
      $comment->element_id = "134";
      $comment->created_by = $commentData['user_id'];
      $comment->in_reply_to = $commentData['name_to'];
      $comment->picture = isset($user->avatar) ? $user->avatar : '';
      $comment->fullname = $user->first . ' ' . $user->last;
      $comment->posted_date = date('Y-m-d H:i:s', time());
      $comment->text = $commentData['text'];
      $comment->like = '';
      $comment->total_like_comment = '';
      $comment->attachments = '';
      $comment->childrens = serialize(array());

      if ($comment->save(true)) {
        
      } else {
        throw new Exception("New comment occur error, please try again");
      }
    } else {
      $comment = new CommentDetail;
      $comment->comment_id = uniqid("Cmt_");
      $comment->parent_id = $commentData['parent_id'];
      $comment->article_id = $commentData['article_id'];
      $comment->element_id = "134";
      $comment->created_by = $commentData['user_id'];
      $comment->in_reply_to = $commentData['name_to'];
      $comment->picture = 'avatar';
      $comment->fullname = "first" . ' ' . "last";
      $comment->posted_date = date('Y-m-d H:i:s', time());
      $comment->text = $commentData['text'];
      $comment->like = '';
      $comment->total_like_comment = '';
      $comment->attachments = '';
      $comment->childrens = serialize(array());

      if ($comment->save(true)) {
        
      } else {
        throw new Exception("New comment occur error, please try again");
      }
    }
    return $comment;
  }

  public function getComments($articleId = '', $options = array()) {
    $article = Articles::model()->findByPk($articleId);
    if ($article == null) {
      throw new Exception("Article not found");
    }
    $order = array(
        'posted_date',
    );
    if (isset($options['order'])) {
      switch ($options['order']) {
        case 'most':
          $order = array("total_like_comment desc");
          break;
        case 'newest':
          break;
        default :
          break;
      }
    }
    $criteria = new CDbCriteria();
    $criteria->condition = "article_id = :id AND parent_id = -1";
    $criteria->limit = Constant::LIMIT_COMMENTS_PERPAGE;
    $criteria->offset = isset($options['page']) && $options['page'] != '' ? $options['page'] * Constant::LIMIT_COMMENTS_PERPAGE : 0;
    $criteria->order = implode(", ", $order);
    $criteria->params = array(":id" => $article->id);
    $commentArticle = CommentDetail::model()->findAll($criteria);
    $comments = $this->_getChildComments($commentArticle);
    return $comments;
  }

  private function _getChildComments($commentArticle) {
    $comments = array();
    foreach ($commentArticle as $cmm) {
      $commentP = $this->generateComment($cmm);
      $childs = CommentDetail::model()->findAllByAttributes(array("parent_id" => $cmm->comment_id));
      foreach ($childs as $index => $child) {
        $nextChilds = $this->_getChildComments($child);
        $commentChild = $this->generateComment($child, $cmm->comment_id);
        $commentChild['childrens'] = $nextChilds;
        $commentP['childrens'][] = $commentChild;
      }
      $comments[] = $commentP;
    }
    return $comments;
  }

  /**
   * 
   * @param CommentDetail $comment
   * @return string
   */
  public function generateComment($comment, $parent_id = '') {
    if ($comment == null) {
      return array();
    }
    var_dump($comment);exit;
    if (is_array($comment)) {
      $prototype = array(
          "comment_id" => $comment['comment_id'],
          "parent_id" => $parent_id,
          "in_reply_to" => $comment['in_reply_to'],
          "element_id" => "134",
          "created_by" => $comment['created_by'],
          "fullname" => $comment['fullname'],
          "picture" => $comment['picture'],
          "posted_date" => $comment['posted_date'],
          "text" => $comment['text'],
          "attachments" => '',
          "childrens" => '',
          "total_like" => $comment['total_like'],
          'liked' => $comment['liked'],
      );
    } else {
      $prototype = array(
          "comment_id" => $comment->comment_id,
          "parent_id" => $parent_id,
          "in_reply_to" => $comment->in_reply_to,
          "element_id" => "134",
          "created_by" => $comment->created_by,
          "fullname" => $comment->fullname,
          "picture" => $comment->picture,
          "posted_date" => $comment->posted_date,
          "text" => $comment->text,
          "attachments" => '',
          "childrens" => '',
          "total_like" => $comment->getTotalLike(),
          'liked' => $comment->isLiked(),
      );
    }
    return $prototype;
  }

  public function addLike($ip = '', $commentId = '') {
    $cmm = CommentDetail::model()->findByPk($commentId);
    if ($cmm == null) {
      return false;
    }
    $likes = $cmm->like;
    $arrIps = array();
    if (($likes != null || trim($likes) != '')) {
      $arrIps = explode("***", $likes);
    }
    $tmpLike = TempLike::model()->findByAttributes(array(
        "comment_id" => $commentId,
        "ip_email" => $ip,
    ));
    if (count($arrIps) > 0 && in_array($ip, $arrIps)) {
      // liked, so unlike this ip
      foreach ($arrIps as $index => $value) {
        if (trim($ip) == $value) {
          unset($arrIps[$index]);
          break;
        }
      }
      $cmm->like = implode("***", $arrIps);
      if ($tmpLike == null) {
        $tmpLike = new TempLike();
        $tmpLike->comment_id = $commentId;
        $tmpLike->ip_email = $ip;
        $tmpLike->status = 0;
        $tmpLike->save(false);
      } else {
        if ($tmpLike->timestamp + 60 * 15 > time()) {
          if ($tmpLike->status == 1) {
            // Spam like
            throw new Exception(Yii::t("app", "Fast click, please try again after 15 minutes"));
          } else {
            // Can like this comment
            $tmpLike->status = 1;
            $tmpLike->update();
          }
        } else {
          $tmpLike->status = 0;
          $tmpLike->update();
        }
      }
    } else {
      if ($tmpLike != null) {
        if ($tmpLike->timestamp + 60 * 15 > time()) {
          if ($tmpLike->status == 1) {
            // Spam like
            throw new Exception(Yii::t("app", "Fast click, please try again after 15 minutes"));
          } else {
            // Can like this comment
            $arrIps[] = $ip;
            $cmm->like = implode("***", $arrIps);
            $tmpLike->status = 1;
            $tmpLike->update();
          }
        } else {
          $arrIps[] = $ip;
          $cmm->like = implode("***", $arrIps);
          $tmpLike->status = 0;
          $tmpLike->update();
        }
      } else {
        $arrIps[] = $ip;
        $cmm->like = implode("***", $arrIps);
        $tmpLike = new TempLike();
        $tmpLike->comment_id = $commentId;
        $tmpLike->ip_email = $ip;
        $tmpLike->status = 0;
        $tmpLike->save(false);
      }
    }

    return array(
        'status' => $cmm->update(),
        'data' => $arrIps,
    );
  }

}
