<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FAQService extends BaseService {

  /**
   * 
   * @param type $class
   * @return FAQService
   */
  public static function getInstance($class = __CLASS__) {
    return parent::getInstance($class);
  }

  public function findAll() {
    $list = array();
    $header = SystemUtils::getCsvToArray("/data/FAQ/FAQ_Header.csv");

    foreach ($header as $index => $hdr) {
      $criteria = new CDbCriteria();
      $criteria->condition = "category_header = '" . $hdr['name'] . "'";
      $criteria->order = "category_subheader asc, create_date desc";
      $models = Faq::model()->findAll($criteria);
      $list[] = $models;
    }
    return $list;
  }

  public function generateForm($type = "") {
    $xmlString = file_get_contents($this->_getFormPath($type));
    $xml = simplexml_load_string($xmlString);

    $elements = $xml->Element;
    $arrModel = array();
    foreach ($elements as $ele) {
      $model = new BaseDTO();
      $attrs = $ele->attributes();
      foreach ($attrs as $key => $value) {
        $model->__set($key, $value);
      }
      $model->__set("description", $ele->child);
      $arrModel["data"][] = $model;
    }
    $arrModel["name"] = $xml->attributes()->name;
    return $arrModel;
  }

  private function _getFormPath($type) {
    return $this->getRootDir() . DIRECTORY_SEPARATOR . 'files/data/FAQ' . DIRECTORY_SEPARATOR . "Form_" . $type . ".xml";
  }

  public function uploadFile() {
    $upload_handler = new UploadHandler(array(
        'upload_dir' => dirname(@$_SERVER['SCRIPT_FILENAME']) . '/files/question/',
        'upload_url' => dirname(@$_SERVER['SCRIPT_FILENAME']).'/files/question/',
        'readfile_chunk_size' => Yii::app()->params["max_file_size"],
    ));
    
    return $upload_handler->get_response();
  }

  public function deleteFile() {
    $upload_handler = new UploadHandler();
    return $upload_handler->delete(true);
  }
}
