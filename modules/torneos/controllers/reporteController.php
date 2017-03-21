<?php

class ReporteController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        echo "<pre>";
        @print_r("reporte");
        echo "</pre>";
        exit();
    }
    
}
