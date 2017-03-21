<?php

class AdministrarController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
    }

    public function index() {
    	//------ permisos admin
    	if ($this->_sesion->user->codrole == 3) {
    		$idRoleUser = $this->_sesion->user->codrole;
    		$idUsuario = $this->_sesion->user->coduser;
    		$privilegio = $this->validatePermissionsAdmin($idRoleUser, $idUsuario, 2);
    	}
        //aquí coge alguno de los repetidos, y lo pone en el parametro que se necesita para validar
    	if ($privilegio == 2) {
    		$cod_role = $this->_sesion->user->codrole;
    		$pasa = $this->validarRolesPrivilegios($cod_role, $privilegio, "Para acceder a esta seccion necesita tener permisos para administrar.", null);
        }

        if ($pasa == true || $this->_sesion->user->codrole == 2) {
    		$user = $this->_sesion->user;
    		$this->loadUser($this->_sesion->user->coduser);
    		$lista_privilegios = DAOFactory::getPrivilegiosDAO()->selectAll();
    		
    		if($this->_sesion->user->codrole == 2){	
    			$privilegiosUser = $lista_privilegios;
    		}else{
    			$privilegiosUser = $this->_sesion->user->privilegios;
    		}
    		$privilegios = array();
    		for ($i = 0; $i < count($lista_privilegios); $i++) {
    			for ($e = 0; $e < count($privilegiosUser); $e++) {
    				if ($lista_privilegios[$i]->idprivilegios === $privilegiosUser[$e]) {
    					$privilegios[$e]['nombre']  = $lista_privilegios[$i]->nombre;
    					$privilegios[$e]['link'] = $lista_privilegios[$i]->link;
    				}
    			}
    		}

    		if ($this->_sesion->user->codrole == 2) {
    			for ($i = 0; $i < count($lista_privilegios); $i++) {
    				$privilegios[$i]['nombre'] = $lista_privilegios[$i]->nombre;
    				$privilegios[$i]['link'] = $lista_privilegios[$i]->link;
    			}
    		}
    		$this->_view->assign('privilegios', $privilegios);
    		$this->_view->renderizar();
    	}else{
        //----------------------
    		$this->validarRolesPrivilegios(null, null, null, null);
    	}
    }

}
