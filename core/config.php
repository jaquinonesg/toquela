<?php

/**
 * Este archivo inicializara en constantes valores <br />
 * que se utilicen a lo largo de la aplicación. 
 */
/**
 * Controlador por defecto, en caso de que no se especifique el controlador <br />
 * durante la petición.
 * 
 * @global string DEFAULT_CONTROLLER
 */
define('DEFAULT_CONTROLLER', 'index');

/**
 * Layout por defecto que utiliza la aplicación.
 * 
 * @global string DEFAULT_LAYOUT
 */
define('DEFAULT_LAYOUT', 'default');
/**
 * Layout por defecto que utiliza la aplicación.
 * 
 * @global string SDS
 */
define('SDS', '/');
/**
 * Layout por defecto que utiliza la aplicación.
 * 
 * @global string SDS
 */
define('SECTIONS', 'sections' . SDS);

/**
 * Ruta de la raiz del servidor.
 * 
 * @global string DOCUMENT_ROOT
 */
define("DOCUMENT_ROOT", $_SERVER["DOCUMENT_ROOT"]);

/**
 * Ruta de la raiz del sitio, para la gestion de archivos.
 * 
 * @global string DOCUMENT_ROOT_SITE
 */
define("DOCUMENT_ROOT_SITE", $_SERVER["DOCUMENT_ROOT"] . SITE);

/**
 * Nombre de la sessión para el manejo del login.
 * 
 * @global string NAME_SESSION
 */
define("NAME_SESSION", 'us3rt0qu3l4');

/**
 * Nombre de la variable de de sessión que permitira <br />
 * saber si se ha iniciado sessión o no.
 * 
 * @global string VAR_SESSION
 */
define("VAR_SESSION", 'user');

/**
 * Host de la base de datos.
 * 
 * @global string DB_HOST
 */
define("DB_HOST", 'localhost');
//define("DB_HOST", '192.168.1.122');
//define("DB_HOST", 'www.grimorum.com');
//define("DB_HOST", 'puntoenlace.net');
// define("DB_HOST", 'puntoenlace.net');
//define("DB_HOST", 'tcp:qf6p82ohtf.database.windows.net,1433');

/**
 * Usuario de la base de datos
 * 
 * @global string DB_USER
 */
define("DB_USER", "root");
//define("DB_USER", "bunkeruser");
// define("DB_USER", "user_toquela");
//define("DB_USER", "grimorum.com.co");

/**
 * Password
 * 
 * @global string DB_PASSWORD
 */
define("DB_PASSWORD", 'P3E6ypGT');
//define("DB_PASSWORD", 'T0q3Buft!');
// define("DB_PASSWORD", 'T0q3l4Grim');
//define("DB_PASSWORD", 'Upwueru&0@94Lfsdf');

/**
 * Nombre de la base de datos.
 * 
 * @global string DB_NAME
 */
define("DB_NAME", 'db_toquela');

/**
 * Motor de base de datos.
 * 
 * @global string DB_NAME
 */
define("ENGINE_DATABASE", 'MYSQL');
//define("ENGINE_DATABASE", 'SQLSERVER');



