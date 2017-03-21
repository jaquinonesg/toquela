<?php
/**
 * Muestra todos los errores generados por PHP excepto los Notice.
 */
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 1);

/**
 * Establece la zona horaria predeterminada usada por <br />
 * todas las funciones de fecha/hora en un script
 */
date_default_timezone_set('America/Bogota');

/**
 * Ruta del de inicio del sitio.
 * 
 * @global string SITE
 */
define('DOMINIO', 'www.toquela.com');
define('URL', 'http://toquela.com');
define('SITE', '');
// define('URL', 'http://www.toquela.com');
// define('SITE', '');

/**
 * Separador
 * 
 * @global string DS
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * Ruta absoluta del sitio desde el servidor.
 * 
 * @global string APP_ROOT
 */
define('APP_ROOT', realpath(dirname(__FILE__)) . DS);

/**
 * Ruta absoluta al directorio principal del sitio.
 * 
 * @global string APP_PATH
 */
define('CORE_PATH', APP_ROOT . 'core' . DS);
/**
 * Puerto de la aplicación
 * 
 * @global int PORT
 */
define('PORT', 80);

/**
 * Ruta del dominio del sitio.
 * 
 * @global string BASE_URL
 */
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . ":" . PORT . SITE);

/**
 * 
 * 
 * @global boolean OFF_LINE
 */
define('OFF_LINE', false);

try {
    require_once CORE_PATH . 'config.php';
    require_once CORE_PATH . 'dictionary.php';
    require_once CORE_PATH . 'db.php';
    require_once CORE_PATH . 'autoload.php';

    Dictionary::getClass();
    Dictionary::getInterfaces();
    require_once CORE_PATH . 'exceptionDatabase.php';
    require_once CORE_PATH . 'model.php';
    require_once CORE_PATH . 'request.php';
    require_once CORE_PATH . 'bootstrap.php';
    require_once CORE_PATH . 'controller.php';
    require_once CORE_PATH . 'session.php';
    require_once CORE_PATH . 'view.php';
    Bootstrap::run(new Request);
} catch (Exception $e) {
    $trace = $e->getTrace();
    $i = 0;
    foreach ($trace as $tr) {
        if ($_GET['view_file'])
            $file = "    -file: $tr[file] line: $tr[line]";

        $str .= " $i -- Class:$tr[class]::$tr[function]  $file<br>";
        $i++;
    }
    die("<pre style='color: bisque;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
            "<br> Mensaje   = " . $e->getMessage() .
            "<br> Codigo    = " . $e->getCode() .
            "<br> Trace     =  <br/>" . $str);
}
