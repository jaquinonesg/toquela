<?php

class CronController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        echo 'Cron...';
    }

    public function sendtempemails() {
        $tempmails = DAOFactory::getMailtempDAO()->getLisTempMails();
        $this->getLibrary("mailing/correo.class");
        $cont_msg = 0;
        foreach ($tempmails AS $tempemail) {
            $mail = new Correo();
            $mail->agregarCorreos($tempemail->tomails, true);
            $mail->setAsunto(utf8_encode($tempemail->subject));
            $mail->setMensaje($tempemail->text);
            $mail->enviar();
            if ($mail->mensaje_enviado) {
                $cont_msg++;
                DAOFactory::getMailtempDAO()->delete($tempemail->codmailtemp);
            }
        }
        echo 'Se enviaron correctamente '.$cont_msg.' correos...';
    }

}
