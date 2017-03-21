<?php

class noticiasController extends Controller {

    public function __construct(){
        parent::__construct();
        //$this->validacionSession();
    }

    public function administrar(){
        $this->validacionSession();
        if ($this->_sesion->user->codrole == 3) {
            $idRoleUser = $this->_sesion->user->codrole;
            $idUsuario = $this->_sesion->user->coduser;
            $privilegio = $this->validatePermissionsAdmin($idRoleUser, $idUsuario, 2);
        }
        //aquí coge alguno de los repetidos, y lo pone en el parametro que se necesita para validar
        if ($privilegio == 2) {
            $cod_role = $this->_sesion->user->codrole;
            $pasa = $this->validarRolesPrivilegios($cod_role, $privilegio, "Para acceder a esta seccion necesita tener permisos para administrar torneos.", null);
        }
        if ($pasa == true || $this->_sesion->user->codrole == 2) {
            if($this->_sesion->user->codrole == 2){
                //Usuario maestro
                $noticias = DAOFactory::getNoticiasDAO()->queryAllOrderBy("type DESC");
                $usuarios_temp = DAOFactory::getUsersDAO()->getUsersAll();
                $usuarios = array();
                foreach ($usuarios_temp as $usuario) {
                    $usuarios[$usuario->coduser] = $usuario->name .' '. $usuario->lastname;
                }
                $this->_view->assign('noticias',$noticias);
                $this->_view->assign('usuarios',$usuarios);

                
            }else{
                // usuario administrador 
            }
            
        //-----        
            $this->_view->renderizar('administrarNoticias');
        }else{
            $this->validarRolesPrivilegios(null, null, null, null);
        }
    }
    public function despriorizar($id=null){
        if(!is_null($id) and is_numeric($id)){
            $this->validacionSession();
            DAOFactory::getNoticiasDAO()->despriorizarHome($id);
        }
    }
    public function priorizar($id=null){
        if(!is_null($id) and is_numeric($id)){
            $this->validacionSession();
            DAOFactory::getNoticiasDAO()->priorizarHome($id);
        }
    }
    public function despriorizarTorneo($id=null){
        if(!is_null($id) and is_numeric($id)){
            $this->validacionSession();
            DAOFactory::getNoticiasDAO()->despriorizarTorneo($id);
        }
    }
    public function priorizarTorneo($id=null){
        if(!is_null($id) and is_numeric($id)){
            $this->validacionSession();
            DAOFactory::getNoticiasDAO()->priorizarTorneo($id);
        }
    }
    public function index(){
    	//$this->redireccionar();
    }
    public function publicar($id){
        if(!is_null($id) and is_numeric($id)){
            $this->validacionSession();
            DAOFactory::getNoticiasDAO()->publicar($id);
        }
    }
    public function noPublicar($id){
        if(!is_null($id) and is_numeric($id)){
            $this->validacionSession();
            DAOFactory::getNoticiasDAO()->noPublicar($id);
        }
    }
    
    public function ver($id){/**Para ver una noticia*/
        $noticia = DAOFactory::getNoticiasDAO()->getbyId($id);
        if(!is_null($id) and is_numeric($id)){
            $DateArray = explode(' ',$noticia->date);
            $fecha = explode('-',$DateArray[0]);
            //print_r($fecha);
            $noticia->date = date('d/m/y' ,mktime(0,0,0, (int)$fecha[2] , (int)$fecha[1], (int)$fecha[0])) . "\n" ;
            //$val->date = strtr( $val->date , $dias_semana );

            $autor = DAOFactory::getUsersDAO()->getInfoBasic($noticia->coduser);
            $this->_view->assign('titulo', $noticia->titulo);
            $this->_view->assign('loc_imagen',$noticia->locimg);
            $this->_view->assign('resumen',$noticia->resumen);
            $this->_view->assign('contenido',$noticia->message);
            $this->_view->assign('autor', $autor->name . ' ' . $autor->lastname );
            
            $this->_view->assign('date',$noticia->date);

            //print_r($noticia);
            $this->_view->renderizar('verNoticia');
        }else{
            $this->redireccionar('/ops/error/404');
        }
    }
}
