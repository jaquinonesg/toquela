<?php

require_once APP_ROOT . 'libraries' . DS . 'smarty' . DS . 'libs' . DS . 'Smarty.class.php';

class View extends Smarty {

    /**
     * Permite obtener información respecto a una solicitud.
     *
     * @var Request $_request
     */
    private $_request;

    /**
     * Titulo de la página actual.
     *
     * @var String $_title
     */
    private $_title;

    /**
     * Charset que utiliza la página actual.
     * 
     * @var String $_charset
     */
    private $_charset;

    /**
     * Idioma que utiliza la página actual.
     * 
     * @var String $_lang
     */
    private $_lang;

    /**
     * Meta descripción
     * 
     * @var String $_meta_description
     */
    private $_meta_description;

    /**
     * Meta keywords
     * 
     * @var String $_meta_keywords
     */
    private $_meta_keywords;

    /**
     * Contiene las rutas de (views, js, css, img) utilizados por la 
     * vista solicitada.
     * 
     * @var Array $_rutas
     */
    private $_rutas;

    /**
     * Nombre del archivo tpl base de la vista, por defecto
     * su nombre es template.tpl
     * 
     * @var String $_display
     */
    private $_display;

    /**
     * Nombre del archivo tpl base de la vista, por defecto
     * su nombre es template.tpl
     * 
     * @var String $_layout
     */
    private $_layout;

    /**
     *
     * @var type 
     */
    public $user_register;

    /**
     * Determina la salida del smarty
     * @var type 
     */
    private $_output;

    /**
     * Items que serán unicamente cargados exclusivamente <br/>como parte de la vista renderizada
     * @var Array &items_exclusive
     * @author Hernan Cortés <heralfstb@gmail.com>
     */
    private $items_only;

    /**
     * Items que no serán cargados de la vista renderizada
     * @var Array items
     * @author Hernan Cortés <heralfstb@gmail.com>
     */
    private $items_except;

    /**
     * Items que no serán cargados de la vista renderizada
     * @var Array items
     * @author Hernan Cortés <heralfstb@gmail.com>
     */
    private $items_add;

    /**
     * Items que seran agregados
     * @var $items_add
     */

    /**
     * Actualiza las rutas, y layout solicitado por la vista.
     * 
     * @param Request $peticion
     */
    public function __construct(Request $peticion) {
        parent::__construct();
        $this->user_register = FALSE;
        $this->_request = $peticion;
        $this->_title = "Toquela | Su comunidad de fútbol en la web";
        $this->_charset = "UTF-8";
        $this->_lang = "en-US";
        $this->_display = "template.tpl";
        $this->_layout = DEFAULT_LAYOUT;
        $this->_meta_description = "";
        $this->_meta_keywords = "";
        $this->_output = true;

        $modulo = $this->_request->getModulo();
        $controlador = $this->_request->getControlador();

        if ($modulo) {
            $this->_rutas['view'] = APP_ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/js/';
            $this->_rutas['css'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/css/';
            $this->_rutas['img'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/img/';
        } else {
            $this->_rutas['view'] = APP_ROOT . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = APP_ROOT . 'views/' . $controlador . '/js/';
            $this->_rutas['css'] = APP_ROOT . 'views/' . $controlador . '/css/';
            $this->_rutas['img'] = APP_ROOT . 'views/' . $controlador . '/img/';
        }
        //Coloca por defecto el layout default.
        $this->template_dir = APP_ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS;
        $this->config_dir = APP_ROOT . 'views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'configs' . DS;
        $this->cache_dir = APP_ROOT . 'libraries' . DS . 'tmp\cache' . DS;
        $this->compile_dir = APP_ROOT . 'libraries' . DS . 'tmp\template' . DS;
    }

    /**
     * Cambia la vista del modulo respectivo para las 
     * que se encuentren dentro de ese módulo
     * 
     * @param type $vista
     * @return null
     */
    private function changeView($vista) {
        $modulo = $this->_request->getModulo();
        $controlador = $this->_request->getControlador();
        if (is_null($vista))
            $vista = $controlador;

        if (($modulo) && ($controlador != $vista)) {
            //$controlador = $vista;
            $this->_rutas['view'] = APP_ROOT . 'modules' . DS . $modulo . DS . 'views' . DS . $controlador . DS;
            $this->_rutas['js'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/js/';
            $this->_rutas['css'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/css/';
            $this->_rutas['img'] = APP_ROOT . 'modules/' . $modulo . '/views/' . $controlador . '/img/';
        }
    }

    /**
     * Renderiza los datos de la vista solicitada.
     * 
     * @param String $vista Nombre de la vista
     * @throws Exception Se lanza cuando no se encuentra la vista solicitada.
     */
    public function renderizar($vista = null) {
        $this->changeView($vista);
        if (is_null($vista)) {
            $vista = $this->_request->getControlador();
        } else {
            $vista = SECTIONS . $vista;
        }
        $_params = array(
            'js' => array_merge($this->getAssetsLayout('js'), $this->getItems('js', $vista)),
            'css' => array_merge($this->getAssetsLayout('css'), $this->getItems('css', $vista)),
            'img' => array_merge($this->getAssetsLayout('img'), $this->getItems('img', $vista)),
            'site' => SITE,
            'base' => BASE_URL,
            'root' => APP_ROOT,
            'module' => $this->_request->getModulo(),
            'controller' => $this->_request->getControlador(),
            'configs' => array(
                'titulo' => $this->_title,
                'view' => $vista,
                'm_description' => $this->_meta_description,
                'm_keywords' => $this->_meta_keywords
            )
        );

        $sesion = Session::singleton();
        if ($sesion->isInit()) {
            $user = $sesion->__get(VAR_SESSION);
            $_params['user'] = $user;
        }
        $dto = $sesion->__get('admintoquela');
        if (is_object($dto)) {
            $this->assign('dtoadmin', $dto);
        }        
        if (is_readable($this->_rutas['view'] . $vista . '.tpl')) {
            $this->assign('_contenido', $this->_rutas['view'] . $vista . '.tpl');
        } else {
            throw new Exception('Error de vista');
        }
        $_translator = new Translator();
        $this->assign('_params', $_params);
        $this->assign('_languaje', $_translator);
        if ($this->_output) {
            $this->display($this->_display);
        } else {
            return $this->fetch($this->_display);
        }
    }

    /**
     * Obtiene los respectivos js, css, img de la vista.
     * 
     * @param String $item Item que se desea cargar
     * @param String $vista La vista solicitada
     * @return Array Rutas solicitadas por el item.
     */
    private function getItems($item, $vista) {
        $_items = array();
        if (in_array($item, array('js', 'css', 'img'))) {
            if (@$handle = opendir($this->_rutas[$item])) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != '.' && $file != '..') {
                        $modulo = $this->_request->getModulo();
                        if (strpos($vista, SECTIONS) !== FALSE) {
                            $vista = $this->_request->getControlador();
                        }
                        if ($modulo) {
                            $_ruta = SITE . SDS . 'modules' . SDS . $modulo . SDS . 'views' . SDS . $vista . SDS . $item . SDS;
                        } else {
                            $_ruta = SITE . SDS . 'views' . SDS . $this->_request->getControlador() . SDS . $item . SDS;
                        }
                        if (is_dir($this->_rutas[$item] . $file)) {
                            foreach ($this->items_add as $it) {
                                if ($it[0] == '/') {
                                    $it[0] = '';
                                }
                                $arr = explode("/", $it);
                                if (count($arr) > 1) {
                                    if (is_file($this->_rutas[$item] . $it)) {
                                        $_ruta = $_ruta . $it;
                                        $_items[] = $_ruta;
                                    }
                                }
                            }
                        } else {
                            $_ruta = $_ruta . $file;
                            
                            if (empty($this->items_except) && empty($this->items_only)) {
                                $_items[] = $_ruta;
                            } else {
                                if (!empty($this->items_only) && in_array($file, $this->items_only)) {
                                    $_items[] = $_ruta;
                                }
                                if (!empty($this->items_except) && !in_array($file, $this->items_except)) {
                                    $_items[] = $_ruta;
                                }
                            }
                        }
                    }
                }
                closedir($handle);
            }
        }
        return $_items;
    }

    /**
     * 
     * @param type $item
     * @return string
     */
    private function getAssetsLayout($item) {
        $path = APP_ROOT . 'views/layout/' . $this->_layout . DS . $item;
        $_items = array();
        if (in_array($item, array('js', 'css', 'img'))) {
            if (@$handle = opendir($path)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != '.' && $file != '..') {
                        $_items[] = SITE . DS . 'views/layout/' . $this->_layout . DS . $item . DS . $file;
                    }
                }
                closedir($handle);
            }
        }
        return $_items;
    }

    /**
     * Selecciona el layout que se va utilizar para renderizar.
     * 
     * @param String $name
     */
    public function setLayout($name = DEFAULT_LAYOUT) {
        $this->_layout = $name;
        $this->template_dir = APP_ROOT . 'views' . DS . 'layout' . DS . $name . DS;
        $this->config_dir = APP_ROOT . 'views' . DS . 'layout' . DS . $name . DS . 'configs' . DS;
    }

    /**
     * 
     * @return string Nombre del Layout
     */
    public function getLayout() {
        return $this->_layout;
    }

    /**
     * Este función se utiliza para fijar un <br/>
     * layout que no se el principal y que se necesite <br/>
     * renderizar otra cosa. <br/>
     * @param type $_display
     */
    public function setDisplay($_display) {
        $this->_display = $_display;
    }

    public function _print($data_request, $json = true) {
        if ($json) {
            if (is_array($data_request)) {
                header("content-type: application/json");
                print json_encode($data_request);
                exit();
            }
        }
        if (is_array($data_request)) {
            $temp = Array();
            foreach ($data_request as $value) {
                if (is_object($value)) {
                    $temp[] = ((object) get_object_vars($value));
                } else {
                    $temp[] = ($value);
                }
            }
            @print_r($temp);
        }
    }
    
    public function setTitle($title) {
        $this->_title = $title;
    }

    public function setMetaDescription($meta) {
        $this->_meta_description = $meta;
    }

    public function setMetaKeywords($meta) {
        $this->_meta_keywords = $meta;
    }

    public function setOutput($output) {
        $this->_output = $output;
    }

    public function getOutput() {
        return $this->_output;
    }

    /**
     * Metodo el cual se pdra obtern los js necesarios en la vista que se necesite
     * @param String $clave Es para saber si se solo se van a incluir (only) o no se van a incluir (except)
     * @param array $js 
     * @param boolean $mantener si desea borrar el set items anteriores
     */
    public function setItems($clave, array $items, $mantener = false) {
        if ($mantener === false) {
            $this->items_add = $this->items_except = $this->items_only = array();
        }
        foreach ($items as $item) {
            $arr = explode(".", $item);
            $ext = end($arr);
            if (in_array($ext, array('js', 'css', 'img'))) {
                switch ($clave) {
                    case 'except':
                        if (!in_array($item, $this->items_except)) {
                            $this->items_except[] = $item;
                        }
                        break;
                    case 'only':
                        if (!in_array($item, $this->items_only)) {
                            $this->items_only[] = $item;
                        }
                        break;
                    case 'add':
                        if (!in_array($item, $this->items_add)) {
                            $this->items_add[] = $item;
                        }
                        break;
                }
            }
        }
    }

}