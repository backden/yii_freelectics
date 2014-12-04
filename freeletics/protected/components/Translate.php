<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Translate{
 
    public $language    = "you language constant or variable or session variable";
    private $lang       = array();
    private $path;
 
    private static function findString($str,$lang,$language) {
 
 
        if (array_key_exists($str, $lang[$language])) {
            return $lang[$language][$str];
            return;
        }
        else if (array_key_exists(strtolower($str), $lang[$language])) {
            return $lang[$language][strtolower($str)];
            return;
        }
 
        return $str;
    }
 
    private function splitStrings($str) {
        return explode('=',trim($str));
    }
 
    public static function __($str) {
 
        $language = LANG;
        $lang     = array();
 
        if($language == "en")return $str;
 
        $path = Yii::app()->basePath."/messages/es/".$language.'.txt';
 
        if (!array_key_exists($language, $lang)) {
 
            if(file_exists($path)) {
 
                $txt_arr = file($path);
 
 
                foreach($txt_arr  as $val){
                    $strings[] = explode('=',trim($val));
                }
 
                foreach ($strings as $k => $v) {
 
                    if(!empty($v[0]) && !empty($v[1]))
                        $lang[$language][trim($v[0])] = trim($v[1]);
 
                }
 
                return self::findString($str,$lang,$language);
            }
            else {
                return $str;
            }
        }
        else {
            return self::findString($str,$lang,$language);
        }
    }
    public static function t($str) {
        return self::__($str);
    }
}
?>