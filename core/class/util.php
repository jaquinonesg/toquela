<?php

class Util {

    /**
     * Devuelve una cadena de ciertos caracteres, controlados por el 
     * parametro $long
     * 
     * @param int $long
     * @return string cadena
     */
    static function getRandom($long = 10) {
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        mt_srand((double) microtime() * 1000000);
        $i = 0;
        $pass = "";
        while ($i != $long) {
            $rand = mt_rand() % strlen($chars);
            $tmp = $chars[$rand];
            $pass = $pass . $tmp;
            $chars = str_replace($tmp, "", $chars);
            $i++;
        }
        return strrev($pass);
    }

    static function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }
        $objects = array();
        $object = new stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name => $value) {
                if (is_array($value)) {
                    $objects[] = Util::arrayToObject($value);
                }
                $name = strtolower(trim($name));
                if (!empty($name) && !is_array($value)) {
                    $object->$name = utf8_encode($value);
                }
            }
            if (is_array($objects) && !empty($objects)) {
                $object->objects = $objects;
            }
            return $object;
        } else {
            return false;
        }
    }

    /**
     * Comprueba si un string es un correo electronico valido.
     * 
     * @param string $email_address
     * @return boolean
     */
    static function validate_email($email_address) {
        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+
                    ([a-zA-Z0-9\._-]+)+$/", $email_address)) {
            return false;
        }
        return true;
    }

    /**
     * 
     * @param type $form
     * @return null
     */
    static function get_template($form) {
        if (!empty($form)) {
            $file = trim(APP_ROOT . "views/_templates/$form.tpl");
            if (!@file_get_contents($file)) {
                return null;
            }
            return file_get_contents($file);
        }
        return null;
    }

    /**
     * Evalua si un dirección http es un video de youtube. <br />
     * Si el video si existe retorna el id del video en caso contrario <br />
     * retorna False.
     * 
     * @param string $dir Url del video
     * @param boolean $validate si es falso retorna el id del video
     * @return boolean|string
     */
    static function isVideoYoutube($dir, $validate = true) {
        if (filter_var($dir, FILTER_VALIDATE_URL)) {
            $items = explode('?', $dir);
            $parameters = explode('&', $items[1]);
            foreach ($parameters as $param) {
                list($key, $value) = explode('=', $param);
                if (strtolower($key) == 'v') {
                    $id = $value;
                    break;
                }
            }
            if (strlen($id) == 11) {
                $url = 'http://i2.ytimg.com/vi/' . $id . '/default.jpg';
                if (!$validate) {
                    return $id;
                }
                if (@fopen($url, "rt")) {
                    return $id;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Valida un dirección de correo electrónico.
     * 
     * @param string $email Email
     * @return boolean
     */
    static function isEmail($email) {
        return preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email);
    }

    /**
     * Valida la seguridad de un password
     * 
     * @param string $password Password
     * @return boolean
     */
    static function isSafe($password) {
        return preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password);
    }

    /**
     * Valida un nombre
     * 
     * @param string $name
     * @return type
     */
    static function isName($name) {
        return preg_match('/^[a-zA-ZñÑ\\s]+$/', $name);
    }

    /**
     * Modifica un string para que se muestre en la URL 
     * reemplazando los espacios, '-' , '_' por nada
     * @param String $name
     * @return String
     */
    static function encodeStringToUrl($name) {
        if (!is_string($name)) {
            return null;
        }
        $name = str_replace('-', '', $name);
        $name = str_replace('_', '', $name);
        $name = str_replace(' ', '', $name);
        $name = strtolower($name);
        $name = urlencode($name);
        return $name;
    }

    static function isUrl($url) {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    static function datecheck($input, $format = "") {
        $separator_type = array("/", "-", ".");
        foreach ($separator_type as $separator) {
            $find = stripos($input, $separator);
            if ($find <> false) {
                $separator_used = $separator;
            }
        }
        $input_array = explode($separator_used, $input);
        if ($format == "mdy") {
            return checkdate($input_array[0], $input_array[1], $input_array[2]);
        } elseif ($format == "ymd") {
            return checkdate($input_array[1], $input_array[2], $input_array[0]);
        } else {
            return checkdate($input_array[1], $input_array[0], $input_array[2]);
        }
    }

    static function validateTime($time) {
        $pattern = "/^([0-1][0-9]|[2][0-3])[\:]([0-5][0-9])[\:]([0-5][0-9])$/";
        return preg_match($pattern, $time);
    }

    static function mylog($data, $json_encode = false, $exit = false) {
        $file = fopen(DOCUMENT_ROOT_SITE . "/core/mylog/mylog.txt", "a+") or exit("Errores en la Creación del Archivo ...");
        fputs($file, "\n\n\n\n--------" . gmdate("D, Y/m/d H:i:s", time() - 18000) . "---------\n");
        if ($json_encode) {
            fputs($file, json_encode($data));
        } else {
            fputs($file, $data);
        }
        fclose($file);
        if ($exit) {
            exit();
        }
    }

    static function mergeObject($obj1, $obj2) {
        if (is_object($obj1) && is_object($obj2)) {
            return (object) array_merge((array) $obj1, (array) $obj2);
        }
        return (object) $obj1;
    }

}
