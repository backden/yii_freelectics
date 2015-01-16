<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SystemUtils {

  public static function randomString($length = null) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    if (!isset($length)) {
      $length = Yii::app()->params['code_coupon_length'];
    }
    $count = 0;
    $maxCount = 5;
    for ($i = 0; $i < $length; $i++) {
      if ($count < $maxCount) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        $count++;
      } else {
        $randomString .= "-" . $characters[rand(0, $charactersLength - 1)];
        $count = 0;
      }
    }
    return $randomString;
  }

  public static function underScoreToCamelCase($string) {
    $extract = explode('_', $string);
    $merge = array();
    foreach ($extract as $str) {
      $merge[] = ucwords($str);
    }
    return implode("", $merge);
  }

  public static function date_diff($date1, $date2) {
    $current = $date1;
    $datetime2 = date_create($date2);
    $count = 0;
    while (date_create($current) < $datetime2) {
      $current = gmdate("Y-m-d", strtotime("+1 day", strtotime($current)));
      $count++;
    }
    return $count;
  }

  public static function getCsvToArray($csvFileName) {
    $webroot = Yii::getPathOfAlias('webroot');
    $file = $webroot . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . $csvFileName;
    $fp = fopen($file, "r");
    $csvArr = array();
    $arr = array(
    );
    if ($fp) {
      $headers = fgetcsv($fp);
      $index = 0;
      while (($line = fgetcsv($fp))) {
        $arr[$index] = array();
        foreach ($line as $key => $value) {
          $arr[$index][$headers[$key]] = $value;
        }
        $index++;
      }
      fclose($fp);
      $csvArr = $arr;
    }

    return $csvArr;
  }

  public static function getTmpFile($fileName) {
    $webroot = Yii::getPathOfAlias('webroot');
    $file = $webroot . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . $fileName;
    $fp = fopen($file, "r");
    $csvArr = array();
    $arr = array(
    );
    if ($fp) {
      $headers = fgets($fp);
      $index = 0;
      while (($line = fgets($fp))) {
        $arr[$index] = array();
        $arr[$index] = $value;
        $index++;
      }
      fclose($fp);
      $csvArr = $arr;
    }

    if (count($csvArr) == 0) {
      
    }
    return $csvArr;
  }

  public static function appendTmpFile($fileName, $value) {
    $webroot = Yii::getPathOfAlias('webroot');
    $file = $webroot . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . $fileName;
    $fp = fopen($file, "a+");
    fwrite($fp, $value);
    fflush($fp);
    fclose($fp);
  }

}
