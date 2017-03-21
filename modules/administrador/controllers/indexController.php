<?php

/**
 * Description of indexController
 *
 * @author DESARROLLO2
 */
class indexController extends Controller {

	public function __construct() {
		parent::__construct();
		$this->_view->setLayout('administrador');
	}

	public function index() {
    	//------ permisos admin
		if ($this->_sesion->user->codrole == 3) {
			$idRoleUser = $this->_sesion->user->codrole;
			$idUsuario = $this->_sesion->user->coduser;
			$privilegio = $this->validatePermissionsAdmin($idRoleUser, $idUsuario, 4);
		}
        //aquí coge alguno de los repetidos, y lo pone en el parametro que se necesita para validar
		if ($privilegio == 4) {
			$cod_role = $this->_sesion->user->codrole;
			$pasa = $this->validarRolesPrivilegios($cod_role, $privilegio, "Para acceder a esta seccion necesita tener permisos para administrar.", null);
		}

		if ($pasa == true || $this->_sesion->user->codrole == 2) {
			$this->_view->renderizar();
		}else{
        //----------------------
			$this->validarRolesPrivilegios(null, null, null, null);
		}
	}

}

?>
