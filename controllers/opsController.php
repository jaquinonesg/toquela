<?php

class OpsController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->error(249);
    }

    public function error($code_error = 0, $str_error = null) {
        if (!is_numeric($code_error)) {
            $code_error = 250;
        }
        echo "<pre>";
        @print_r($str_error);
        echo "</pre>";
        exit();
        if (isset($str_error)) {
            $str_error = rawurldecode($str_error);
        }
        $this->_view->assign('url', 'dfsa');
        $this->_view->assign('code', $code_error);
        $this->_view->assign('str_error', $str_error);
        $this->_view->renderizar();
    }

}
