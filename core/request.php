<?php

class Request {

    /**
     * Nombre del controlador resultante de la solicitud.
     *
     * @var string $_controlador 
     */
    private $_controlador;

    /**
     * Nombre del metodo resultante de la solicitud.
     *
     * @var string $_metodo 
     */
    private $_metodo;

    /**
     * Array de datos, que conforman los valores que se pasaran por 
     * parametro al metodo del controlador.
     *
     * @var array $_argumentos 
     */
    private $_argumentos;

    /**
     *
     * @var string $_modulo
     */
    private $_modulo;

    /**
     * Actualiza los valores de los atributos (controlador,metodo,argumentos)
     * respectivamente en caso de que la solicitud se realice via GET, en caso de
     * que la solicitud se realice via POST el atributo helper asumira dichos valores
     * que seran pasados al bootstrap.
     */
    public function __construct() {
        if (isset($_GET['url'])) {
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);
            $modules = Dictionary::getModules();
            $this->_modulo = strtolower(array_shift($url));
            if (!$this->_modulo) {
                $this->_modulo = false;
            } else {
                if (count($modules)) {
                    if (!in_array($this->_modulo, $modules)) {
                        $this->_controlador = $this->_modulo;
                        $this->_modulo = false;
                    } else {
                        $this->_controlador = strtolower(array_shift($url));
                        if (!$this->_controlador) {
                            $this->_controlador = 'index';
                        }
                    }
                } else {
                    $this->_controlador = $this->_modulo;
                    $this->_modulo = false;
                }
            }
            $this->_metodo = strtolower(array_shift($url));
            $this->_argumentos = $url;
        }

        if (!$this->_controlador) {
            $this->_controlador = DEFAULT_CONTROLLER;
        }

        if (!$this->_metodo) {
            $this->_metodo = 'index';
        }

        if (!isset($this->_argumentos)) {
            $this->_argumentos = array();
        }
    }

    /**
     * Retorna el nombre del controlador
     * 
     * @return string
     */
    public function getControlador() {
        return $this->_controlador;
    }

    /**
     * Retorna el nombre del método
     * 
     * @return string
     */
    public function getMetodo() {
        return $this->_metodo;
    }

    /**
     * Retorna en forma de array los valores de los parametros del método
     * 
     * @return array
     */
    public function getArgs() {
        return $this->_argumentos;
    }

    /**
     * Retorna el nombre del modulo solicitado.
     * 
     * @return string
     */
    public function getModulo() {
        return $this->_modulo;
    }

    /**
     * Esta función se tomara para poder obtener la url <b>raiz</b> que el usuario solicto <br/>
     * para que llegara al metodo que controlara la vista; teniendo encuenta si <br/>
     * es un módulo o un controlador inicial; que desea ver con los <br/>
     * siguientes formatos:
     * <p>
     * si es algún modulo:<br/>
     * /modulo/controlador/metodo
     * </p>
     * <p>
     * si es controlador inicial<br/>
     * /controlador/metodo
     * </p>
     * @return String  <br/>
     */
    public function getRequestURI() {
        $url = "";
        if ($this->_modulo) {
            $url = "$this->_modulo/$this->_controlador";
        } else {
            $url = "$this->_controlador";
        }
        if ($this->_metodo == 'index')
            return "/$url";
        else
            return "/$url/$this->_metodo";
    }

    public function getHeader($header) {
        $headers = getallheaders();
        if (isset($headers[$header])) {
            return $headers[$header];
        }
        return null;
    }

    public function isAjax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

}