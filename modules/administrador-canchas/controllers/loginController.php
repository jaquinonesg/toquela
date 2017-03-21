<?php

class LoginController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->_view->setLayout('login');
        $this->_view->renderizar();
    }

    public function validate() {
        if ($this->_request->isAjax()) {
            $email = $this->post('email');
            $password = $this->post('password');

            if (!empty($email) && !empty($password)) {
                $administrator = DAOFactory::getAdministratorDAO();
                $user = $administrator->login($email, $password);
                if (!is_null($user)) {

                    $path = "";

                    if ($user->isindex) {
                        $path = BASE_URL . '/administrador-canchas/index/inicio/';
                    } else if ($user->isdiary) {
                        $path = BASE_URL . '/administrador-canchas/index/agenda/';
                    } else if ($user->iscomplex) {
                        $path = BASE_URL . '/administrador-canchas/index/cancha/' . $user->codcomplex;
                    } else if ($user->isuser) {
                        $path = BASE_URL . '/administrador-canchas/index/usuarios/';
                    } else if ($user->istoquela) {
                        $path = BASE_URL . '/administrador-canchas/toquela/';
                    }

                    $this->_sesion->__set('admintoquela', $user);
                    $this->_view->_print(array('status' => true, 'path' => $path));
                } else {
                    $message = "Error en la autenticación.";
                    $this->endProcess($message);
                }
            }
        }
    }

    public function endProcess($message, $status = false) {
        $this->_view->_print(array('message' => $message, 'status' => $status));
        exit();
    }

    public function logout() {
        $this->_sesion->__destroy();
        $this->redireccionar('/administrador-canchas/login');
    }

}
