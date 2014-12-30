<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CString
{
    public static function truncate($text = '', $length = 100, $suffix = 'read more&hellip;', $isHTML = true){
        $output = substr($text, 0, $length) . ( strlen($text) > $length ? "..." : "");
        return htmlspecialchars($output);
    }
}