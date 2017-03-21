<?php

class ProgramacionController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->redireccionar("/programacion/lifutbol");
    }

    public function lifutbol() {
        $this->_view->renderizar("lifutbol");
    }

}
