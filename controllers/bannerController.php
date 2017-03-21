<?php

class BannerController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->initVarUser();
    }

    public function index($error = null) {
    	$this->_view->assign('soybanner', true);
        $this->_view->renderizar();
    }
    
   
}