<?php

class Translator {

    private $language;
    private $lang = array('es', 'en');

    public function __construct() {
        $sesion = Session::singleton();
        if ($sesion->__get('language') === false) {
            $sesion->__set('language', 'es');
            $this->language = 'es';
        } else {
            $this->language = $sesion->__get('language');
        }
    }

    public function __($str) {
        $straux = $str;
        $str = strtoupper($str);
        if (in_array($this->language, $this->lang)) {
            $path = APP_ROOT . "core" . DS . "language" . DS . "$this->language" . DS;
            $ini = parse_ini_file($path . "$this->language.ini");
            if (@file_exists($path . $ini[$str])) {
                if (($txt = @file_get_contents($path . $ini[$str]))) {
                    return $txt;
                }
                return "Contenido no disponible";
            }
            return array_key_exists($str, $ini) ? $ini[$str] : $straux;
        }
        return $str;
    }

    static function setLanguaje($language) {
        $sesion = Session::singleton();
        $sesion->__set('language', $language);
    }

    /**
     * Esta funcion se utilizara para el mejo de los archivos .ini para renderizr los contenidos
     * 
     * @param type $name
     */
    public function __get($name) {
        list($file_ini, $key) = explode("_", $name);
        // $file_ini = $items[0];
        // $key = $items[1];
        $path = APP_ROOT . "contents" . DS;
        $ini = @parse_ini_file("$path{$file_ini}.ini");
        if (@file_exists($path . $ini[$key])) {
            if (($txt = @file_get_contents($path . $ini[$key]))) {
                return $txt;
            }
            return "Contenido no disponible";
        }

        return array_key_exists($key, $ini) ? $ini[$key] : $name;
    }

}