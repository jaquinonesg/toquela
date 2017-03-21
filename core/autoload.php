<?php

/**
 * Carga dinamicamente los modelos utilizados durante
 * la ejecución de los scripts.
 * 
 * @param String $class Nombre de la clase (Modelo) que se necesita cargar.
 * @return void
 */
function __autoload($class) {
    $class = lcfirst($class);
    $path = APP_ROOT . "models" . DS . $class . ".php";
    if (file_exists($path)) {
        require_once $path;
    } else {
        $dir_modules = Dictionary::getModules();
        foreach ($dir_modules as $modulo) {
            $pathModule = APP_ROOT . 'modules' . DS . $modulo . DS . 'models' . DS . $class . '.php';
            if (file_exists($pathModule)) {
                require $pathModule;
            }
        }
    }
}

function __autoloadDAO($class) {
    $path = APP_ROOT . "persistence" . DS . "dao" . DS . "daofactory.class.php";
    if (file_exists($path)) {
        require_once $path;
    }
    $class = strtolower($class);
    $path = APP_ROOT . "persistence" . DS . "dto" . DS . $class . ".class.php";
    if (file_exists($path)) {
        require_once $path;
    }
    $path = APP_ROOT . "persistence" . DS . "dao" . DS . $class . ".interface.php";
    if (file_exists($path)) {
        require_once $path;
    }

    $path = APP_ROOT . "persistence" . DS . strtolower(ENGINE_DATABASE) . DS . $class . ".class.php";
    if (file_exists($path)) {
        require_once $path;
    }

    $path = APP_ROOT . "persistence" . DS . strtolower(ENGINE_DATABASE) . DS . "ext" . DS . $class . ".class.php";
    if (file_exists($path)) {
        require_once $path;
    }
}

function __loadDriver($class) {
    $path = APP_ROOT . "core" . DS . "drivers" . DS . $class . ".driver.php";
    if (file_exists($path)) {
        require_once $path;
    }
}