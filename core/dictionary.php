<?php

class Dictionary {

    /**
     * Retorna un array con los modulos de la aplicación.
     * 
     * @return array
     */
    public static function getModules() {
        $dir_modules = array();
        $path = APP_ROOT . 'modules' . DS;
        @$handle = opendir($path);
        while (false !== ($directory = readdir($handle))) {
            if ($directory != '.' && $directory != '..') {
                $dir_modules[] = $directory;
            }
        }
        closedir($handle);
        return $dir_modules;
    }

    /**
     * Realiza los require de todas la interfaces de la ruta <br />
     * core/interface/
     * 
     * @return void
     */
    public static function getInterfaces() {
        $path = APP_ROOT . 'core' . DS . 'interface' . DS;
        @$handle = opendir($path);
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $ruta = APP_ROOT . 'core' . DS . 'interface' . DS . $file;
                if (file_exists($ruta)) {
                    require_once $ruta;
                }
            }
        }
        closedir($handle);
    }

    /**
     * Realiza los require de todas las clases de la ruta <br />
     * core/class/
     * 
     * @return void
     */
    public static function getClass() {
        $path = APP_ROOT . 'core' . DS . 'class' . DS;
        @$handle = opendir($path);
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $ruta = APP_ROOT . 'core' . DS . 'class' . DS . $file;
                if (file_exists($ruta)) {
                    require_once $ruta;
                }
            }
        }
        closedir($handle);
    }

}