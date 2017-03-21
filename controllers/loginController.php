<?php

/**
 * sitios relacionados con el inicio de sesión de los usuarios
 *
 * @package controller.login
 * @todo Terminar de documentar
 * @author Grimorum
 */

class LoginController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->_view->renderizar();
    }

    /**
     * Inicio de seccion y asigancion de la variable _view->_sesion es posible 
     * iniciar secion con documento de identidad y correo electronico. 
     * Recibe los campos username que puede contener el correo o documento y recibe 
     * la contraseña sin codificar,.
     * 
     * @since revición 14/08/2015
     * 
     */
    public function verificar() {
        require_once APP_ROOT . '/controllers/class/Encrypter.php';

        $user = null;
        //inicio de sesión con documento de identidad.
        if(is_numeric($this->post('username'))){
            $aditional_user = DAOFactory::getAditionalDAO()->queryByNumdoc( $this->post('username') );
            $coduser = $aditional_user[0]->coduser;
            $user = DAOFactory::getUsersDAO()->loginCoduser($coduser, $this->post('password'));
        }else{//inicio de sesión con cédula.
            $user = DAOFactory::getUsersDAO()->login( $this->post('username'), $this->post('password') );
        }

        if (is_null($user) || is_null($this->post('username')) || is_null($this->post('password')) || $this->post('username') == '' || $this->post('password') == '') {
            $this->_view->assign('null', true);
            $this->_view->renderizar();
        } else {
            //redireccion a administrar perfil
            $this->_sesion->user = $this->loaduser($user->coduser);
            $this->redireccionar('/perfil');
        }
    }

    public function close_session() {
        $this->_sesion->__destroy();
        $this->redireccionar();
    }

    public function passrecovery() {
        $message = "No se pudo realizar la acción, por favor inténtelo de nuevo.";
        $status = false;
        $email = $this->post("email");
        if (Util::isEmail($email)) {
            $user = DAOFactory::getUsersDAO()->getUserByEmail($email);
            if (isset($user)) {
                $this->getLibrary("mailing/correo.class");
                $newpass = Util::getRandom(5);
                $mail = new Correo();
                $mail->agregarCorreos($user->email);
                $mail->setAsunto("Reestablecer usuario Toquela");
                $cuerpo_mensaje = "<p>Se ha asignado una nueva contraseña para el usuario de Tóquela: " . $user->name . " " . $user->lastname . "</p>
                                        <p>Usuario o correo: " . $user->email . "</p>
                                        <p>Contraseña: " . $newpass . "</p>
                                        <p>Después de haber ingresado se recomiendo cambiar esta contraseña.</p>";
                $mail->setMensaje($cuerpo_mensaje);
                $mail->enviar();
                if ($mail->mensaje_enviado) {
                    if (DAOFactory::getUsersDAO()->updatePassword($user->coduser, $newpass) > 0) {
                        $status = true;
                        $message = "Contraseña reestablecida con éxito, se envió a su correo electrónico una nueva contraseña para que pueda ingresar, revisar también en correos no deseados.";
                    } else {
                        $message = "El usuario existe pero no se pudo reestablecer contraseña, por favor inténtelo de nuevo.";
                    }
                } else {
                    $message = "No se puedo enviar el correo para reestablecer contraseña, por favor inténtelo de nuevo.";
                }
            } else {
                $message = "No existe un usuario con este correo, por lo tanto no se puede reestablecer la contraseña.";
            }
        }
        $this->endProcess($message, $status);
    }

}

?>
