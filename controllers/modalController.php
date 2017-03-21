<?php

class modalController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //$ciudades = DAOFactory::getLocalityDAO()->getLocalityOrder();
        //$this->_view->assign('departamentos', $ciudades);
        $this->_view->setLayout('empty');
        $this->_view->renderizar();
    }

    public function saveregister() {
        require_once APP_ROOT . '/libraries/recaptcha/recaptchalib.php';
        // Llaves privadas creadas de google para el captcha
        
        // para www.toquela.com
        $privatekey = "6Lepgv0SAAAAAHqHxW3B-eVR9JlX-E4Nv9MoRk9F";//llave privada

        // para localhost 
        // $privatekey = "6LeYuQATAAAAAE3oyiplpg_XaPNuG2SF4PAGXaCD";//llave privada
        
        $reCaptcha = new ReCaptcha($privatekey);
        if ($_POST["g-recaptcha-response"]) {
            $resp = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
                );
            if ($resp != null && $resp->success) {
            // cuando reCAPTCHA es válido";
                $user = new Users();
                $user->set();
                if (Util::isEmail($user->email)) {
                    if (($user->email != '') && ($user->password != '') && isset($user->name) && isset($user->lastname)) {
                        $mails = DAOFactory::getUsersDAO()->queryByEmail($user->email);

                        if (count($mails) == 0) {
                            $user->username = $user->email;
                            $user->codrole = 1;
                            $user->password = sha1($user->password);
                            $user->age = 1;
                            $user->skilledleg = "AMBAS";
                            $user->sex = "UNDEFINED";
                            $user->idfan = 1;  
                            try {
                                $user->coduser = DAOFactory::getUsersDAO()->insertWithValsNulls($user);

                                $this->verificar($user->coduser);
                            } catch (Exception $e) {
                                $this->redireccionar("/index/index/surgio_error");
                            }
                        } else {
                            $this->redireccionar("/index/index/existe_usuario");
                        }
                    } else {
                        $this->redireccionar("/index/index/error_datos");
                    }
                } else {
                    $this->redireccionar("/index/index/error_email");
                }
            } else {
                $this->redireccionar("/index/index/error_captcha");
            }
        } else {
            $this->redireccionar("/index/index/error_captcha");
        }
    }

    public function login() {
        $this->_view->setLayout('empty');
        $this->_view->renderizar(__FUNCTION__);
    }

    private function verificar($cod_user) {
        $this->_sesion->user = $this->loaduser($cod_user);
        $this->redireccionar('/perfil');
    }

    public function changepassword() {
        $password = $this->post("password");
        $repassword = $this->post("repassword");
        if ($this->cambiarContrasena($this->_sesion->user->coduser, $password, $repassword)) {

        }
        $this->redireccionar('/perfil');
    }

    private function cambiarContrasena($coduser, $new, $renew) {
        if (($new == $renew) && is_numeric($coduser)) {
            $affets = DAOFactory::getUsersDAO()->updatePassword($coduser, $new);
            if ($affets > 0) {
                return true;
            }
        }
        return false;
    }

}

?>
