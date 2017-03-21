<?php

class DialogController extends Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->_request->isAjax()) {
            $this->redireccionar();
        }
        //$this->validacionSession();
        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);
    }

    public function index() {
        $this->redireccionar();
    }

    public function localities() {
        $localities = DAOFactory::getLocalityDAO()->queryByCodCity($this->post('city'));
        $this->_view->assign('localities', $localities);
        echo $this->_view->renderizar(__FUNCTION__);
    }

}