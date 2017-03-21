<?php

class Terminos_condicionesController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->initVarUser();
    }

    public function index() {
        $this->_view->renderizar();
    }

}
