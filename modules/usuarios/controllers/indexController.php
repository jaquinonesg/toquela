<?php

/**
 * Controlador Index
 *
 */
class IndexController extends Controller {

    /**
     *
     * @var Users 
     */
    private $_user;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
    }

    public function index() {
        //------ permisos admin
        if ($this->_sesion->user->codrole == 3) {
            $idRoleUser = $this->_sesion->user->codrole;
            $idUsuario = $this->_sesion->user->coduser;
            $privilegio = $this->validatePermissionsAdmin($idRoleUser, $idUsuario, 7);
        }
        //aquí coge alguno de los repetidos, y lo pone en el parametro que se necesita para validar
        if ($privilegio == 7) {
            $cod_role = $this->_sesion->user->codrole;
            $pasa = $this->validarRolesPrivilegios($cod_role, $privilegio, "Para acceder a esta seccion necesita tener permisos para administrar torneos.", null);
        }
        if ($pasa == true || $this->_sesion->user->codrole == 2) {
            require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
            $total_jugadores = DAOFactory::getUsersDAO()->getTotalJugadores();
            $pj = new PaginatorJorge("pagina_jugadores", $total_jugadores, 8);
            $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/jugadores/");
            $jugadores = DAOFactory::getUsersDAO()->getJugadores($pj->inicio_limit, $pj->fin_limit);
            
        // --------------
        for ($i=0; $i < count($jugadores) ;$i++) { 
        // elimina mi usuario del arreglo jugadores
            if($jugadores[$i]->coduser == $this->_sesion->user->coduser){
               unset($jugadores[$i]);   
            }
        // // elimina EL usuario maestro del arreglo jugadores
        //     if($jugadores[$i]->codrole == 2){
        //         unset($jugadores[$i]);   
        //     }
        }
        // ------------

            $posiciones = DAOFactory::getVirtuesDAO()->getVirtuesByGroupArray(2);
            $this->_view->assign('posiciones', $posiciones);
            $this->_view->assign('jugadores', $jugadores);
            $this->_view->assign('htmlpaginator', $htmlpaginator);
            $this->_view->renderizar();
        }else{
            $this->validarRolesPrivilegios(null, null, null, null);
        }
    }

    public function search_jugadores() {
        require_once APP_ROOT . '/controllers/class/Encrypter.php';
        $encripter = new Encrypter();
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $genero = $this->post("genero");
        $posicion = $this->post("posicion");
        $strjugador = $this->post("strjugador");
        $pagina = $this->post("pag");
        if ($pagina < 1) {
            $pagina = 1;
        }
        $gen = Users::validateSexByNum($genero);
        $this->_view->setLayout("empty");
        $this->_view->assign("template", "listar_usuarios");
        $this->_view->assign("is_buscador_jugadores", false);
        $this->_view->assign("is_paginator", true);
        $this->_view->assign("init_js_paginator", false);
        $this->_view->setOutput(false);
        $total_jugadores = DAOFactory::getUsersDAO()->getJugadoresBuscador($strjugador, $gen, $posicion, null, null, true);
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $pj = new PaginatorJorge("pagina_jugadores", $total_jugadores, 8, $pagina);
        $jugadores = DAOFactory::getUsersDAO()->getJugadoresBuscador($strjugador, $gen, $posicion, $pj->inicio_limit, $pj->fin_limit);

        // --------------
        for ($i=0; $i < count($jugadores) ;$i++) { 
        // elimina mi usuario del arreglo jugadores
            if($jugadores[$i]->coduser == $this->_sesion->user->coduser){
               unset($jugadores[$i]);   
            }
        // // elimina EL usuario maestro del arreglo jugadores
        //     if($jugadores[$i]->codrole == 2){
        //         unset($jugadores[$i]);   
        //     }
        }
        // ------------
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/jugadores/");
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('jugadores', $jugadores);
        $this->_view->assign('encripter', $encripter);
        $data["html"] = $this->_view->renderizar();
        if (isset($data["html"])) {
            $data["message"] = "Operación realizada con éxito.";
            $data["status"] = true;
        }
        $this->_view->_print($data);
    }

    public function usuario($coduser = null) {
        $usuario_no_master = true;
        if(isset($coduser)){
            $usuario = DAOFactory::getUsersDAO()->load($coduser);
            if($usuario->codrole == 2){
                $usuario_no_master = false;
            }
        }
        if($usuario_no_master){
            $user = $this->loaduser($coduser);
            $lista_privilegios = DAOFactory::getPrivilegiosDAO()->selectAll();
            $lista_roles = DAOFactory::getRoleDAO()->selectAll();
            $rol_user = $user->codrole;
            $privilegios_user = $user->privilegios;

            $privilegiosRol = DAOFactory::getRoleDAO()->getByIdRol($user->codrole);
            $aux_privilegios_rol = explode(",", $privilegiosRol[0]->privilegios);
            $aux_privilegios_rol = str_replace(" ", "", $aux_privilegios_rol);

        //para que se deshabilite el privilegio por defecto
            for ($i = 0; $i < count($lista_privilegios); $i++) {
                $lista_privilegios[$i]->val_default = false;
                for ($e = 0; $e < count($aux_privilegios_rol); $e++) {
                    if ($lista_privilegios[$i]->idprivilegios === $aux_privilegios_rol[$e]) {
                        $lista_privilegios[$i]->val_default = true;
                    }
                }
            }
        //para ue checkee los privilegios por defecto
            for ($i = 0; $i < count($lista_privilegios); $i++) {
                $lista_privilegios[$i]->checked = false;
                for ($e = 0; $e < count($privilegios_user); $e++) {
                    if ($lista_privilegios[$i]->idprivilegios === $privilegios_user[$e]) {
                        $lista_privilegios[$i]->checked = true;
                    }
                }
            }
        //para checkear el rol que tiene
            for ($i = 0; $i < count($lista_roles); $i++) {
                if ($lista_roles[$i]->codrole === $rol_user) {
                    $lista_roles[$i]->checked = true;
                    $role_checked = $lista_roles[$i]->codrole;
                }
            }
            $this->_view->assign('role_checked', $role_checked);
            $this->_view->assign('lista_roles', $lista_roles);
            $this->_view->assign('lista_privilegios', $lista_privilegios);
            $this->_view->assign('usuario', $user);
            $this->_view->renderizar('usuario');
        }
        $this->redireccionar('/usuarios');
    }

    public function modificar() {
        $respuesta['status'] = false;
        $respuesta['message'] = 'No se pudo realizar la acción';
        $privilegios = $this->post('dataByComma');
        $privilegiosArray = $this->post('privileges');
        $rol = rawurldecode($this->post('rol'));
        $coduser = rawurldecode($this->post('id'));

        $usuario = new Users();
        $usuario->coduser = $coduser;
        $usuario->codrole = $rol;

        $usuario->privilegios = $privilegios;

        if (isset($usuario)) {
            $insertaRol = DAOFactory::getUsersDAO()->insertRol($usuario);
            $insertaPrivilegios = DAOFactory::getUsersDAO()->insertPrivileges($usuario);
            if ($insertaRol == true) {
                $respuesta['status'] = true;
                $respuesta['message'] = '¡Se ha modificado la información del usuario!.';
            }
            if ($insertaPrivilegios == true) {
                $respuesta['status'] = true;
                $respuesta['message'] = '¡Se ha modificado la información del usuario!.';
            }
            if ($insertaPrivilegios == false && $insertaRol == false) {
                $respuesta['status'] = false;
                $respuesta['message'] = '¡No se ha modificado la información del usuario!.';
            }
        }
        $this->_view->_print($respuesta, true);
    }

}
