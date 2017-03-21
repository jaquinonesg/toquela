<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CodeEncript
 *
 * @author Jorge Luis Romero Castañeda - jorgeromen27@gmail.com
 */
class Encrypter {

    private static $key = KEY;

    public static function encript($value) {
        $result = '';
        $value = urlencode($value);
        for ($i = 0; $i < strlen($value); $i++) {
            $char = substr($value, $i, 1);
            $keychar = substr(Encrypter::$key, ($i % strlen(Encrypter::$key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result.=$char;
        }
        return base64_encode($result);
    }

    public static function decript($value) {
        $result = '';
        $value = base64_decode($value);
        $value = urldecode($value);
        for ($i = 0; $i < strlen($value); $i++) {
            $char = substr($value, $i, 1);
            $keychar = substr(Encrypter::$key, ($i % strlen(Encrypter::$key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result.=$char;
        }
        return $result;
    }

}
