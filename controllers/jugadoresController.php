<?php

class JugadoresController extends Controller {

    public function __construct() {
        parent::__construct();
        // $this->validacionSession();
        $this->user = $this->_sesion->user;
    }

    public function index() {
        require_once APP_ROOT . '/controllers/class/Encrypter.php';
        $encripter = new Encrypter();
        $this->_view->setItems('only', array('jugadores.css', 'jugadores.js'));
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $total_jugadores = DAOFactory::getUsersDAO()->getTotalJugadores();
        $pj = new PaginatorJorge("pagina_jugadores", $total_jugadores, 8);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/jugadores/");
        $jugadores = DAOFactory::getUsersDAO()->getJugadores($pj->inicio_limit, $pj->fin_limit);
        $posiciones = DAOFactory::getVirtuesDAO()->getVirtuesByGroupArray(2);
        $this->_view->assign('posiciones', $posiciones);
        $this->_view->assign('jugadores', $jugadores);
        $this->_view->assign('encripter', $encripter);
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $user = $this->_sesion->user;
        $this->_view->assign('user', $user);
        $this->_view->renderizar();
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
        $this->_view->assign("template", "listar_jugadores");
        $this->_view->assign("is_buscador_jugadores", false);
        $this->_view->assign("is_paginator", true);
        $this->_view->assign("init_js_paginator", false);
        $this->_view->setOutput(false);
        $total_jugadores = DAOFactory::getUsersDAO()->getJugadoresBuscador($strjugador, $gen, $posicion, null, null, true);
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $pj = new PaginatorJorge("pagina_jugadores", $total_jugadores, 8, $pagina);
        $jugadores = DAOFactory::getUsersDAO()->getJugadoresBuscador($strjugador, $gen, $posicion, $pj->inicio_limit, $pj->fin_limit);
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

}
