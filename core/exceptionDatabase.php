<?php

class ExceptionDatabase extends Exception {

    /**
     *
     * @var type 
     */
    protected $code;

    /**
     *
     * @var type 
     */
    protected $message;

    /**
     * 
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * 
     */
    public function log() {
        $file = fopen("core/log-mysql/error-" . strtolower(ENGINE_DATABASE) . ".txt", "a+") or exit("Errores en la Creación del Archivo ...");
        fputs($file, "\n\n\n---------" . gmdate("D, Y/m/d H:i:s", time() - 18000) . "---------");
        fputs($file, "\nCódigo de error:\t $this->code");
        fputs($file, "\nMensaje del error:\t $this->message");
        fputs($file, "\n---------Fin del error---------");
        fclose($file);
    }

}