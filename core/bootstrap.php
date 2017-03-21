<?php

class Bootstrap {

    /**
     * Carga el controlador que la solicitud previa necesita, a la vez <br />
     * llama a los métodos y pasa por párametro los datos que el el <br />
     * respectivo método necesita.
     * 
     * @param Request $peticion
     * @throws Exception Se produce cuando no encuentra un controlador
     */
    public static function run(Request $peticion) {
        self::offlinerun($peticion);
        self::moduleRun($peticion);
        $controller = $peticion->getControlador() . 'Controller';
        $method = $peticion->getMetodo();
        $args = $peticion->getArgs();
        $rutaControlador = APP_ROOT . 'controllers' . DS . $controller . '.php';
        if (is_readable($rutaControlador)) {
            require_once $rutaControlador;
            $controller = new $controller;
            $method = str_replace('-', '', $peticion->getMetodo());            
            if (is_callable(array($controller, $method))) {
                $method = str_replace('-', '', $peticion->getMetodo());
            } else {
                $method = 'index';
            }
            if (isset($args)) {
                call_user_func_array(array($controller, $method), $args);
            } else {
                call_user_func(array($controller, $method));
            }
        } else {
            header("Location: " . SITE . "/ops/error/247");
        }
    }

    /**
     * Carga el módulo que la solicitud previa necesita, llamando <br />
     * tanto el controlador, acción y vista solicitada.
     * 
     * @param Request $peticion
     * @throws Exception
     */
    private static function moduleRun(Request $peticion) {
        $modulo = $peticion->getModulo();
        $controller = $peticion->getControlador() . 'Controller';
        $method = $peticion->getMetodo();
        $args = $peticion->getArgs();
        if ($modulo) {
            $rutaModulo = APP_ROOT . 'modules' . DS . $modulo . DS . 'controllers' . DS . $controller . '.php';
            if (is_readable($rutaModulo)) {
                require_once $rutaModulo;
                $controller = new $controller;
                $method = str_replace('-', '', $peticion->getMetodo());
                if (is_callable(array($controller, $method))) {
                    $method = str_replace('-', '', $peticion->getMetodo());
                } else {
                    $method = 'index';
                }
                if (isset($args)) {
                    call_user_func_array(array($controller, $method), $args);
                } else {
                    call_user_func(array($controller, $method));
                }
                die();
            } else {
                header("Location: " . SITE . "/ops/error/248");
            }
        }
    }

    /**
     * 
     * @param Request $peticion
     * @throws Exception
     */
    private static function offlinerun(Request $peticion) {
        if (OFF_LINE) {
            if ($peticion->getControlador() != CONTROLLER_ERROR)
                header("Location: " . SITE . "/" . CONTROLLER_ERROR . "/");
            $controller = CONTROLLER_ERROR . 'Controller';
            $method = 'index';
            $rutaControlador = APP_ROOT . 'controllers' . DS . $controller . '.php';
            if (is_readable($rutaControlador)) {
                require_once $rutaControlador;
                $controller = new $controller;
                call_user_func(array($controller, $method));
            } else {
                header("Location: " . SITE . "/ops/error/247");
            }
            die();
        }
    }

}