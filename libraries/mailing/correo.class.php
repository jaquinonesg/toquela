<?php

require_once 'mailer.lib/class.phpmailer.php';

class Correo {

    /**
     * template tiene los carateres que se utilizan para hacer una nueva contraseña
     * @var string
     */
    private $template = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    /**
     * xmlt retorna el xml que sirve par enviar
     * @var string
     */
    var $xmlt;

    /**
     * mensaje_enviado tiene el valor si es enviado o no
     * @var boolean
     */
    var $mensaje_enviado = false;

    /**
     * mail es el objeto de la clase que envia el correo
     * @var Objetc
     */
    private $mail;

    /**
     * correos_agregados es el objeto de la clase que envia el correo
     * @var boolean
     */
    private $correos_agregados = false;

    /**
     * Esta varible es para guardar el asunto de del mail que se va a enviar
     * @var string 
     */
    private $subject;

    /**
     * Guarda el correo emisor quien enviara el correo
     * @var string 
     */
    private $emisor_correo;

    /**
     * Guarda el nombre del emisor quien enviara el correo
     * @var string 
     */
    private $emisor_nombre;

    /**
     * Guarda el cuwerpo del mensaje ya sea un mensaje simple o un mensaje html;
     * @var string
     */
    private $body;

    /**
     * Se genera un objeto el cual enviará un correo<br/> 
     * se recomienda utilizar los métodos:<br/>
     * - setMensaje();<br/>
     * - setEmisorNombre();<br/>
     * - setEmisorCorreo();<br/>
     * - setAsunto();<br/>
     * para cambiar los valores por default.
     * 
     */
    function __construct() {
        $this->mail = new PHPMailer();
        $this->subject = "Envio de correo";
        $this->emisor_correo = "toquela@grimorum.com";
        $this->emisor_nombre = "Tóquela";
        $this->body = utf8_encode("Mensaje desde Tóquela");
        $this->variablesIgnition();
    }

    private function variablesIgnition() {
        $this->mail->IsSMTP();
        $this->mail->SMTPSecure = "tls"; //eso toca configurar
        $this->mail->SMTPDebug = false;
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 587;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'toquela@grimorum.com'; //colocar el nombre del correo desde donde se va enviar
        $this->mail->Password = 'toquela_123'; //la clave del correo
        $this->mail->CharSet = "utf-8";
    }

    /**
     * Envia el correo en una sola conexion
     * @return void
     */
    public function enviar() {

        $this->mail->SetFrom($this->emisor_correo, $this->emisor_nombre);
        $this->mail->Subject = $this->subject;
        $this->mail->AltBody = "Para ver este correo, por favor utilize un visor compatible con HTML";
        $this->mail->MsgHTML($this->body);

        if ($this->correos_agregados == true) {

            if (!$this->mail->Send()) {

                $str = 'Mensaje no fue Enviado.';
                $str .= 'Error de Correo: ' . $this->mail->ErrorInfo;
                $this->mensaje_enviado = false;
            } else {
                $str = 'Mensaje Fue Enviado Satisfactoriamente a su correo.';
                $this->mensaje_enviado = true;
            }

            $this->xmlt = $str;
        } else {
            $this->xmlt = "Por favor agregue un correo para enviar el mail";
        }
    }

    /**
     * añade un correo ya sea destinatario, copia o copia oculta
     * @param type $correo el correo o correos separdos por ;
     * @param type $multiples  si esta en false agrga solo una direccion <br> si esta en true agrega varios 
     * @param type $modo el cual es el valor como se envia destinatario = D , copia C, copia oculta = H
     */
    public function agregarCorreos($correo, $multiples = false, $modo = 'D') {
        if ($correo != "") {
            $this->correos_agregados = true;
            if ($multiples == false) {
                $correos = explode(";", $correo);
                $dir = $correos[0];
                if ($dir != "") {
                    switch ($modo) {
                        case 'D':
                            $this->mail->AddAddress($dir);
                            break;

                        case 'C':
                            $this->mail->AddCC($dir);
                            break;

                        case 'H':
                            $this->mail->AddBCC($dir);
                            break;
                        default :
                            $this->correos_agregados = false;
                            break;
                    }
                }
            } else {

                $this->correos_agregados = true;
                $correos = explode(";", $correo);

                foreach ($correos as $dir) {
                    if ($dir != "") {
                        switch ($modo) {
                            case 'D':
                                $this->mail->AddAddress($dir);
                                break;

                            case 'C':
                                $this->mail->AddCC($dir);
                                break;

                            case 'H':
                                $this->mail->AddBCC($dir);
                                break;
                            default :
                                $this->correos_agregados = false;
                                break;
                        }
                    }
                }
            }
        }
    }

    /**
     * Se utiliza para colocar el cuerpo del mensaje <br/>
     * ya se un en plano o un html embebido
     * @param String $mensaje el mensaje que va hacer enviado
     * @return void;
     */
    public function setMensaje($mensaje, $is_html = false) {
        if ($is_html === false) {
            $this->body = preg_replace('/\\\\/', '', $mensaje);
        } elseif ($is_html === true) {
            $this->mail->IsHTML(true);
            $this->body = $mensaje;
        }
    }

    /**
     * Coloca el correo a la persona quien supuestamente envia el correo <br/>
     * y aquien sera devuelto el correo.
     * @param String $correo
     * @return boolean <b>FALSE</b> si la validación de correo es incorrecta
     */
    public function setEmisorCorreo($correo) {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL))
            return false;
        $this->emisor_correo = $correo;
    }

    /**
     * Fija el nombre de del usuario quien envia el correo 
     * @param String $nombre
     * @return void 
     */
    public function setEmisorNombre($nombre) {
        $this->emisor_nombre = htmlentities($nombre);
    }

    /**
     * Metodo el cual  agrega archivos adjuntos al correo que se enviará
     * @param String $archivo ruta del archivo
     * @return boolean retorna <b>FALSE</b> si el archivo no se encuentra
     */
    public function agregarArchivos($archivo) {
        if (!@file_exists($archivo))
            return false;

        $this->mail->AddAttachment($archivo);
    }

    /**
     * Fija el asunto del correo
     * @param type $subject
     */
    public function setAsunto($subject) {
        $this->subject = htmlentities($subject);
    }

}

?>
