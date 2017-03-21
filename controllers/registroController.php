<?php

class registroController extends Controller {


    public function __construct() {
        parent::__construct();
        $this->initVarUser();
    }

    public function index($error = null) {
//      $ciudades = DAOFactory::getLocalityDAO()->getLocalityOrder();
//      $this->_view->assign('ciudades', $ciudades);
        require_once APP_ROOT . '/controllers/class/UtilNovedades.php';
        
        $utilnovedades = new UtilNovedades();
        $num_miembros = DAOFactory::getUsersDAO()->getCountAll();
        $this->_view->assign('error', $error);
        $this->_view->assign('num_miembros', $num_miembros);
        $this->_view->assign('utilnovedades', $utilnovedades);
        $this->_view->assign('ciudades', "");
        //$this->_view->assign('only_content', true);
        $this->_view->assign('base_url', SITE);
        $this->_view->renderizar();
    }
    
    public function get_jugadores() {
        $jugadores = DAOFactory::getUsersDAO()->getJugadoresMap();
        print json_encode($jugadores);
    }

    public function get_jugador_map($val) {
        $jugador = "";
        if ($val != "") {
            if (is_numeric($val)) {
                $jugador = DAOFactory::getUsersDAO()->get_jugador_map($val);
            }
        }
        $this->_view->_print($jugador);
    }

    public function get_complex_map($val) {
        $complejo = "";
        if ($val != "") {
            if (is_numeric($val)) {
                $complejo = DAOFactory::getComplexDAO()->get_complex_map($val);
            }
        }
        $this->_view->_print($complejo);
    }

    public function get_complejos() {
        $complejos = DAOFactory::getComplexDAO()->getComplejosMap();
        print json_encode($complejos);
    }

    public function get_coindencias() {
        $coin = "";
        $key = $this->get('term');
        if ($key != "") {
            $coin = DAOFactory::getLocalityDAO()->getCoinciUsersComplex($key);
        }
        $this->_view->_print($coin);
    }
}
