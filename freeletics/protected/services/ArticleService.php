<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ArticleService extends BaseService {

  /**
   * 
   * @param ArticleService $class
   * @return ArticleService
   */
  public static function getInstance($class = 'ArticleService') {
    return parent::getInstance($class);
  }

  public function getList() {
    return Articles::model()->findAll();
  }

  public function getListByCon($conditions = array(), $values = array(), $opertation = 'AND', $order = 'create_date desc', $limit = 10) {
    $con = array();
    foreach ($conditions as $condition) {
      $con[] = $condition . ' = :' . $condition;
    }
    $con = implode($opertation, $con);
    if (count($conditions) != count($values)) {
      //error
      throw new Exception('Error not match');
    }
    $criteria = new CDbCriteria();
    $criteria->condition = $con;
    $criteria->params = $values;
    $criteria->order = $order;
    $criteria->limit = $limit;

    $articles = Articles::model()->findAll($criteria);

    if (count($articles) == 0) {
      return array();
    }

    return $articles;
  }

  public function getSummarizeArticle($article_other = array(
      "articles_training",
      "articles_nutrition",
      "articles_motivation",
      "articles_lifestyle",
      "articles_success_stories",
  )) {
    $summarize = array();
    $crite = new CDbCriteria();
    $crite->order = "create_date desc";
    $summarize['news'] = Articles::model()->findAll($crite);
    $conditions = array(
        "hot"
    );
    $values = array(
        ":hot" => 1
    );
    $hots = $this->getListByCon($conditions, $values, 'AND', 'create_date desc', 1);
    $summarize['hot'] = isset($hots[0]) ? $hots[0] : $summarize['news'][0];

    foreach ($article_other as $other) {
      $atr = Articles2::model()->findByAttributes(array("name" => $other));
      $arrAtricleIds = $atr->getNewestArticleIdsLimit(2);
      $criteria = new CDbCriteria();
      $criteria->condition = "id in ('" . implode("', '", $arrAtricleIds) . "')";
      $criteria->order = "create_date desc";
      $articles = Articles::model()->findAll($criteria);
      $summarize[$other] = $articles;
    }

    return $summarize;
  }

  public function getSpecifyArticle($category = null, $next = 1) {
    $arrAtricleIds = array();
    if ($category) {
      $arrAtricleIds = $category->getNewestArticleIdsLimit(10, $next);
      $criteria = new CDbCriteria();
      $criteria->condition = "id in ('" . implode("', '", $arrAtricleIds) . "')";
      $criteria->order = "create_date desc";
      
      //$criteria->condition = "category_id = $category->id";
      //$criteria->order = "create_date desc";
    } else {
      $criteria = new CDbCriteria();
      $criteria->order = "create_date desc";
    }
    $summarize = array();
    $summarize['news'] = Articles::model()->findAll($criteria);
    foreach ($summarize['news'] as $art) {
      if ($art->hot == 1) {
        $summarize['hot'] = $art;
        break;
      }
    }
//    $criteria->addCondition("hot = 1");
//    $hots = Articles::model()->find($criteria);
    if (isset($summarize['hot'])) {
      //$summarize['hot'] = isset($hots[0]) ? $hots[0] : $summarize['news'][0];
    } else {
      $summarize['hot'] = isset($summarize['news'][0]) ? $summarize['news'][0] : array();
    }
    $summarize[isset($category) ? $category->name : ""] = $summarize['news'];

    return $summarize;
  }

}
