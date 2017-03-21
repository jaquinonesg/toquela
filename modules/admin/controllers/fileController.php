<?php

class fileController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function uploadphoto() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $complex = DAOFactory::getComplexDAO();
            $stdClass = $complex->getCountAttachments($code);

            if ($stdClass->total > 6) {
                $message = "No se pueden incluir mas imagenes, el maximo es de 6.";
                $this->endProcess($message);
            }

            $dtoComplex = $complex->load($code);
            if (is_object($dtoComplex)) {
                $files = $_FILES[$this->post('name_files')];
                if (is_array($files['error'])) {

                    foreach ($files['error'] as $key => $error) {
                        if ($error == UPLOAD_ERR_OK) {
                            $name_original = $files['name'][$key];
                            $extension = strtolower(pathinfo($name_original, PATHINFO_EXTENSION));
                            $name_encrypt = trim((sha1($name_original . Util::getRandom(20))) . '.' . $extension);
                            if (in_array($extension, array('png', 'jpg', 'jpeg', 'gif'))) {
                                $path = '/files/complex/' . $name_encrypt;
                                $path_final = APP_ROOT . 'public' . $path;
                                if (move_uploaded_file($files['tmp_name'][$key], $path_final)) {
                                    $dtoAttachment = new Attachment();
                                    $dtoAttachment->nameencode = $name_encrypt;
                                    $dtoAttachment->namefile = $name_original;
                                    $dtoAttachment->path = $path;
                                    $dtoAttachment->type = 'image';




                                    $id = DAOFactory::getAttachmentDAO()->insert($dtoAttachment);
                                    if (is_numeric($id)) {
                                        /* echo "lalala $id";
                                          exit; */

                                        $dtoComplexHasAttachment = new ComplexHasAttachment();
                                        $dtoComplexHasAttachment->codattachment = $id;
                                        $dtoComplexHasAttachment->codcomplex = $code;

                                        try {
                                            DAOFactory::getComplexHasAttachmentDAO()->insert($dtoComplexHasAttachment);
                                            $message = "Se ha subido la foto correctamente.";
                                            $this->endProcess($message, true);
                                        } catch (Exception $exc) {
                                            $message = "Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.";
                                            $this->endProcess($message);
                                        }
                                    }
                                }
                            } else {
                                $message = "Archivo invalido para la cancha.";
                                $this->endProcess($message);
                            }
                        }
                    }
                }
            }
        }
    }

    public function deletephoto() {
        if ($this->_request->isAjax()) {
            $complex = $this->post('complex');
            $cod_attachment = $this->post('attachment');

            $complexHasAttachment = DAOFactory::getComplexHasAttachmentDAO();
            $dtoComplexHasAttachment = $complexHasAttachment->load($cod_attachment, $complex);
            if (is_object($dtoComplexHasAttachment)) {
                try {
                    $complexHasAttachment->delete($cod_attachment, $complex);
                    $attachment = DAOFactory::getAttachmentDAO();
                    $dtoAttachment = $attachment->load($cod_attachment);
                    $this->delete($dtoAttachment->path);
                    $message = "Se ha eliminado la imagen.";
                    $this->endProcess($message, true);
                } catch (Exception $exc) {
                    $message = "Ha ocurrido un error eliminando la imagen";
                    $this->endProcess($message);
                }
            }
        }
    }

    private function delete($path) {
        if (!empty($path)) {
            if (unlink(APP_ROOT . 'public' . $path)) {
                return true;
            }
        }
        return false;
    }

    private function endProcess($message, $status = false) {
        $this->_view->_print(array('message' => $message, 'status' => $status));
        exit();
    }

}
