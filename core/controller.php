<?php

abstract class Controller {

    const TYPE_1 = 'Eliminación directa';
    const TYPE_2 = 'Grupos y Eliminación directa';
    const TYPE_3 = 'Todos contra todos';
    const TYPE_4 = 'Personalizado';

    /**
     * Objeto que gestiona la vista de la aplicación.
     * 
     * @var View $_view 
     */
    protected $_view;

    /**
     * Objeto que gestiona las solicitudes.
     * 
     * @var Request $_request 
     */
    protected $_request;

    /**
     * Array $_POST
     * 
     * @var array $_helper
     */
    protected $_helper;

    /**
     * Objeto Sesion
     *
     * @var Session $_sesion 
     */
    protected $_sesion;

    public function __construct() {
        $this->_sesion = Session::singleton();
        $this->_request = new Request();
        $this->_view = new View($this->_request);
        $this->_view->user_register = $this->_sesion->isInit();
        $this->clean_array_injection($_POST);
        $this->clean_array_injection($_GET); //Tener en cuenta por si se ha dañando algo para solicitud del Bootstrap
        $this->_helper = $_POST;
    }

    public function getTiposTorneo() {
        return array(self::TYPE_1, self::TYPE_2, self::TYPE_3, self::TYPE_4);
    }

    abstract public function index();

    /**
     * Obtiene una libreria del directorio libraries
     * 
     * @example email realiza la carga del archivo que permite enviar correo electronico.
     * @param String $libreria
     * @throws Exception se producte cuando no encuentra una libreria.
     */
    protected function getLibrary($libreria) {
        $rutaLibreria = APP_ROOT . 'libraries' . DS . $libreria . '.php';
        if (is_readable($rutaLibreria)) {
            require_once $rutaLibreria;
        } else {
            throw new Exception('Error de libreria');
        }
    }

    /**
     * Limpia de injección sql el valor solicitado en el array $_POST.
     * 
     * @param string $clave
     * @return String
     */
    public static function post($clave = null) {
        if(is_null($clave)){
            return $_POST;
        }
        if (isset($_POST[$clave])) {
            if (is_string($_POST[$clave])) {
                $_POST[$clave] = strip_tags($_POST[$clave]);
                if (!get_magic_quotes_gpc()) {
                    $_POST[$clave] = ($_POST[$clave]);
                }
                return trim($_POST[$clave]);
            } elseif (is_array($_POST[$clave])) {
                return $_POST[$clave];
            }
        } else {
            return NULL;
        }
    }

    
    /**
     * Limpia de injección sql el valor solicitado en el array $_GET
     * 
     * @param string $clave
     * @return String
     */
    public static function get($clave = null) {
        if(is_null($clave)){
            return $_GET;
        }
        if (isset($_GET[$clave]) && !empty($_GET[$clave])) {
            $_GET[$clave] = strip_tags($_GET[$clave]);
            if (!get_magic_quotes_gpc()) {
                $_GET[$clave] = ($_GET[$clave]);
            }
            return trim($_GET[$clave]);
        }
    }

    /**
     * Limpia de injección sql un array
     * 
     * @param array $array
     * @return array
     */
    protected function clean_array_sql_injection($array) {
        foreach ($array as $clave => $value) {
            $array[$clave] = str_replace("'", "&#39;", $value);
            $array[$clave] = str_replace('"', "&#34;", $value);
            $array[$clave] = str_replace(";", "&#59;", $value);
            $array[$clave] = str_replace("<", "&#60;", $value);
            $array[$clave] = str_replace(">", "&#62;", $value);
            $array[$clave] = str_replace("drop", "&#100;&#114;&#111;&#112;", $value);
            $array[$clave] = str_replace("javascript", "&#106;&#97;&#118;&#97;&#115;&#99;&#114;&#105;&#112;&#116;", $value);
            $array[$clave] = str_replace("script", "&#118;&#98;&#115;&#99;&#114;&#105;&#112;&#116;", $value);
            $array[$clave] = str_replace("vbscript", "&#115;&#99;&#114;&#105;&#112;&#116;", $value);
        }
        return $array;
    }

    /**
     * 
     * @param String $ruta Ruta a la cual desea redireccionar
     */
    protected function redireccionar($ruta = false) {
        if ($ruta) {
            header('location:' . BASE_URL . $ruta);
            exit;
        } else {
            header('location:' . BASE_URL);
            exit;
        }
    }

    /**
     * Comprueba si la sessión esta activa, si es así devuelve True <br />
     * de lo contrario redirecciona al login.
     * 
     * @return boolean Devulve si la sessión esta activa.
     */
    public function validacionSession() {
        if (!$this->_sesion->isInit()) {
            $this->redireccionar('/login');
        } else {
            $user = $this->_sesion->user;
            if (is_object($user)) {
                $this->_view->assign('user', $user);
            }
            return true;
        }
    }

    public function initVarUser() {
        $user = $this->_sesion->user;
        if (is_object($user)) {
            $this->_view->assign('user', $user);
        }
    }

    /**
     * 
     * @return type
     */
    public function getUriMVC() {
        $peti = new Request();
        return $peti->getRequestURI();
    }

    /**
     * 
     * @param type $string
     * @return type
     */
    private function string_clean($string) {
        $string = str_ireplace("'", "&#39;", $string);
        $string = str_ireplace('"', "&#34;", $string);
        $string = str_ireplace(";", "&#59;", $string);
        $string = str_ireplace("<", "&#60;", $string);
        $string = str_ireplace(">", "&#62;", $string);
        $string = str_replace("drop", "&#100;&#114;&#111;&#112;", $string);
        $string = str_ireplace("javascript", "&#106;&#97;&#118;&#97;&#115;&#99;&#114;&#105;&#112;&#116;", $string);
        $string = str_ireplace("script", "&#118;&#98;&#115;&#99;&#114;&#105;&#112;&#116;", $string);
        $string = str_ireplace("vbscript", "&#115;&#99;&#114;&#105;&#112;&#116;", $string);
        return $string;
    }

    /**
     * 
     * @param type $array
     * @return type
     */
    private function clean_array_injection(&$array) {
        foreach ($array as $clave => $value) {
            if (is_string($value)) {
                $array[$clave] = $this->string_clean($value);
            } elseif (is_array($value)) {
                $array[$clave] = $this->clean_array_injection($value);
            }
        }
        return $array;
    }

    /**
     * @param array $pages_current 
     * @param array $paginator 
     * @param string $url
     * @param boolean $numbers
     * @param boolean $paginatorAjax
     * @return string Paginador HTML
     */
    protected function paginator(array $pages_current, array $paginator, $url, $numbers = TRUE, $paginatorAjax = FALSE) {
        $layout = $this->_view->getLayout();
        $output = $this->_view->getOutput();
        $template = $this->_view->tpl_vars['template'];
        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);

        $this->_view->assign('template', 'paginator');
        $this->_view->assign("paginators", $paginator);
        $this->_view->assign("current", $pages_current);
        $this->_view->assign("url", $url);
        $this->_view->assign("numbers", $numbers);
        $this->_view->assign("paginatorAjax", $paginatorAjax);
        $paginator = $this->_view->renderizar();
        $this->_view->setLayout($layout);
        $this->_view->setOutput($output);
        if ($template != "") {
            $this->_view->assign('template', $template);
        } else {
            unset($this->_view->tpl_vars['template']);
        }

        return $paginator;
    }

    /**
     * 
     * @param AttachmentModel $video
     * @param int $width
     * @param int $height
     * @return string
     */
    protected function renderVideo(AttachmentModel $video, $width = 1280, $height = 720) {
        $layout = $this->_view->getLayout();
        $output = $this->_view->getOutput();
        $template = $this->_view->tpl_vars['template'];
        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);
        $this->_view->assign("video", $video);
        $this->_view->assign("width", $width);
        $this->_view->assign("height", $height);
        $this->_view->assign('template', 'video');
        $video_html = $this->_view->renderizar();
        $this->_view->setLayout($layout);
        $this->_view->setOutput($output);
        if (!empty($template)) {
            $this->_view->assign('template', $template);
        } else {
            unset($this->_view->tpl_vars['template']);
        }
        return $video_html;
    }

    public function endProcess($message, $status = false) {
        $this->_view->_print(array('status' => $status, 'message' => $message), true);
        exit();
    }

    public function paginator_person($total_elementos, $num_elmen_pag, $pagina_select, $return_html = false, $clase_css_pag = "pag", $url = null) {
        if (($total_elementos <= 0) || ($num_elmen_pag <= 0) || ($pagina_select <= 0)) {
            return null;
        }
        $num_paginas = (int) ceil($total_elementos / $num_elmen_pag);
        if ($num_paginas <= 0) {
            $num_paginas = 1;
        }
        if ($pagina_select > $num_paginas) {
            return null;
        }
        if ($return_html) {
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $this->_view->assign('template', 'paginator_person');
        }
        $multiplo = (int) ($num_elmen_pag * $pagina_select);
        $init_rango = ($multiplo - $num_elmen_pag);
        if ($init_rango < 0) {
            $init_rango = 0;
        }
        $end_rango = ($multiplo - 1);
        if ($end_rango == 0) {
            $end_rango = 1;
        }
        if ($end_rango > $total_elementos) {
            $end_rango = ($total_elementos - 1);
        }
        $this->_view->assign("init_rango", $init_rango);
        $this->_view->assign("end_rango", $end_rango);
        $this->_view->assign("pagina_select", $pagina_select);
        $this->_view->assign("num_paginas", $num_paginas);
        $this->_view->assign("clase_css_pag", $clase_css_pag);
        $this->_view->assign("url", $url);
        if ($return_html) {
            return $this->_view->renderizar();
        }
        return null;
    }

    public function loaduser($coduser) {
        $user = DAOFactory::getUsersDAO()->load($coduser);
        $user->photoprofile = DAOFactory::getUserHasAttachmentDAO()->getPhotProfileUser($user->coduser);
        $user->nummsg = DAOFactory::getMessageDAO()->notificacionMessage($user->coduser);
        $user->notify = DAOFactory::getNotificationDAO()->notificationsUser($user->coduser);
        $user->positiongame = DAOFactory::getUserHasVirtuesDAO()->getFavoritePostionGame($user->coduser);
        $user->levelgame = DAOFactory::getUserHasVirtuesDAO()->getLevelGame($user->coduser);
        $user->locality = DAOFactory::getLocalityDAO()->load($user->codlocality);
        $user->photos = DAOFactory::getAttachmentDAO()->getPhotosAndVideosUser($user->coduser);
        $user->fan = DAOFactory::getFanDAO()->load($user->idfan);
        $user->rol = DAOFactory::getRoleDAO()->load($user->coduser);
        $aux_privilegios = explode(",", $user->privilegios . "," . $user->rol->privilegios);

        $aux_privilegios = array_filter($aux_privilegios);

        $aux_privilegios = array_unique($aux_privilegios);
        $user->privilegios = $aux_privilegios;
        return $user;
    }

    public function opsErrorRedirection($error_text) {
        if (empty($error_text) || $error_text == "") {
            $url = SITE . "/ops/error/";
        } else {
            $error_text = rawurlencode($error_text);
            $url = SITE . "/ops/error/0/" . $error_text;
        }
        if (strlen($url) > 2000) {
            $url = SITE . "/ops/error/";
        }
        header('Location: ' . $url);
    }
    
    
    public function getTiposFiltrosTorneos(){
        $aux_arr = array();
        $aux_arr[1] = "Equipos";
        $aux_arr[2] = "Jugadores";
        $aux_arr[3] = "Complejos - Lugares";
        $aux_arr[4] = "Arbitros";
        return $aux_arr;
    }

    // ---------
    // -----------
    // ----------------
    // validar roles y privilegios
    public function validarRolesPrivilegios($rol, $privilegio, $message = null, $refer = null) {
        if ($this->validacionSession()) {
            if (is_numeric($rol) && is_numeric($privilegio)) {
                if ($this->_sesion->user->codrole == 2 || $this->_sesion->user->codrole == $rol) {
                    if($this->_sesion->user->codrole == 2){
                        return true;
                    }
                    if($this->_sesion->user->codrole == $rol){
                        if (in_array($privilegio, $this->_sesion->user->privilegios)) {
                            return true;
                        }
                    }
                }else{
                    if (empty($message)) {
                        $message = "No tiene permiso para acceder a esta sección, por favor inténtelo de nuevo.";
                    }
                    $this->initDefaultSession($message, $refer, true);
                    return false;
                }
            }else{
                if (empty($message)) {
                    $message = "No tiene permiso para acceder a esta sección, por favor inténtelo de nuevo.";
                }
                $this->initDefaultSession($message, $refer, true);
                return false;
            }
        }
    }
    
    public function validatePermissionsAdmin($idRoleUser, $idUsuario, $privilegioAdmin) {
        $privilegiosRol = DAOFactory::getRoleDAO()->getByIdRol($idRoleUser);
        $privilegiosUser = DAOFactory::getUsersDAO()->getByPrivileges($idUsuario);
        $aux_privilegios_rol = explode(",", $privilegiosRol[0]->privilegios);
        $aux_privilegios_rol = str_replace(" ", "", $aux_privilegios_rol);

        $aux_privilegios_user = explode(",", $privilegiosUser[0]->privilegios);
        $aux_privilegios_user = str_replace(" ", "", $aux_privilegios_user);

        //valida que valores repetidos hay en los dos arreglos
        for ($i = 0; $i < count($aux_privilegios_rol); $i++) {
            for ($e = 0; $e < count($aux_privilegios_user); $e++) {
                if ($aux_privilegios_rol[$i] === $aux_privilegios_user[$e]) {
                    $privilegios_repetidos[$i] = $aux_privilegios_rol[$i];
                }
            }
        }

        if (count($privilegios_repetidos) === count($aux_privilegios_rol)) {
            //si se cumple, es que el usuario, ya puede administrar usuarios
            $privilegio = $privilegioAdmin;
        }
        return $privilegio;
    }

    public function initDefaultSession($message = null, $refer = null, $gologin = false) {
        $default_session = new stdClass();
        if (isset($message)) {
            $default_session->message = $message;
        } else {
            if (isset($this->_sesion->default->message)) {
                $default_session->message = $this->_sesion->default->message;
            } else {
                $default_session->message = null;
            }
        }
        if (isset($refer)) {
            $default_session->refer = $refer;
        } else {
            if (isset($this->_sesion->default->refer)) {
                $default_session->refer = $this->_sesion->default->refer;
            } else {
                $default_session->refer = null;
            }
        }
        $this->_sesion->default = $default_session;

        $this->_view->assign('default_session', $default_session);
        if ($gologin) {
            $this->redireccionar("/index/index/error_permisos");
        }
    }

}
