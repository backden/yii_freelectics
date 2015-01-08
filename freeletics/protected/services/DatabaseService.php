<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DatabaseService extends BaseService {

  /**
   * 
   * @return DatabaseService
   */
  public static function getInstance($class = __CLASS__) {
    parent::getInstance($class);
  }

  public function fillDatabase($csvFile, $modelClass) {
    $webroot = Yii::getPathOfAlias('webroot');
    $file = $webroot . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $csvFile;
    $fp = fopen($file, "r");
    $csvArray = array();
    $groupArray = array(
    );
    if ($fp) {
      $headers = fgetcsv($fp);
      $index = 0;
      while (($line = fgetcsv($fp))) {
        $groupArray[$index] = array();
        foreach ($line as $key => $value) {
          $groupArray[$index][$headers[$key]] = $value;
        }
        $index++;
      }
      fclose($fp);
      $csvArray = $groupArray;
    }

    foreach ($csvArray as $data) {
      $model = ModelUtils::returnModelByClassName($modelClass);
      foreach ($data as $field => $value) {
        $model->$field = $value;
      }
      $model->save();
    }
  }

}
