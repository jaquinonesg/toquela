<?php

class FileController extends Controller {

    const NAME_FILE = 'name_files';

    public $_attachment;
    private $_files;
    private $_attachments;

    public function __construct() {
        parent::__construct();
        //$this->_attachment = new AttachmentModel();
        $this->_files = $_FILES[$this->post(self::NAME_FILE)];
        $this->_attachments = array();
    }

    public function index() {
        $this->redireccionar();
    }

    private function delete($path) {
        if (!empty($path)) {
            if (unlink(APP_ROOT . 'public' . $path)) {
                return true;
            }
        }
        return false;
    }

    public function demo() {
        $result = array('status' => false, 'message' => "Ha ocurrido un error intentando cambiar la photo de perfil. Por favor vuelva a intentarlo.");
        $user = new UserModel($this->_sesion->__get(VAR_SESSION)->getCode());
        foreach ($this->_files['error'] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $name_original = $this->_files['name'][$key];
                $extension = pathinfo($name_original, PATHINFO_EXTENSION);
                if ($this->validateExtension('photo', $extension)) {
                    $name_encrypt = trim($this->_attachment->encryptString($name_original) . '.' . $extension);
                    $path = '/files/attachments/photos/' . $name_encrypt;
                    $path_final = APP_ROOT . 'public' . $path;
                    if (move_uploaded_file($this->_files['tmp_name'][$key], $path_final)) {
                        if ($user->update('tb_user', array('photo' => $path), "cod_user = {$user->getCode()}")) {
                            $result['status'] = true;
                            $result['message'] = "Se ha cambiado la foto de perfil correctamente.";
                            $result['photo'] = $path;
                            $this->delete($user->photo);
                        }
                    }
                }
            }
        }
        $this->_view->_print($result);
    }

    private function validateExtension($section, $ext) {
        if (!empty($ext) && !empty($section)) {
            switch ($section) {
                case 'canvas':
                    $extensions = array('doc', 'docx', 'pdf', 'txt', 'jpg', 'png', 'jpeg', 'mp3', 'mp4', 'wma');
                    if (in_array($ext, $extensions)) {
                        return true;
                    }
                    break;
                case 'photo' :
                    $extensions = array('jpg', 'png', 'jpeg', 'bmp');
                    if (in_array($ext, $extensions)) {
                        return true;
                    }
                    break;
                default:
                    break;
            }
        }
        return false;
    }

    public function phototeam() {
        if ($this->_request->isAjax()) {

            $code = $this->post('code');
            $team = DAOFactory::getTeamDAO();

            $dtoComplex = $team->load($code);
            if (is_object($dtoComplex)) {
                $files = $_FILES[$this->post('name_files')];
                if (is_array($files['error'])) {

                    foreach ($files['error'] as $key => $error) {
                        if ($error == UPLOAD_ERR_OK) {
                            $name_original = $files['name'][$key];
                            $extension = strtolower(pathinfo($name_original, PATHINFO_EXTENSION));
                            $name_encrypt = trim((sha1($name_original . Util::getRandom(20))) . '.' . $extension);
                            if (in_array($extension, array('png', 'jpg', 'jpeg', 'gif'))) {
                                $path = '/files/teams/' . $name_encrypt;
                                $path_final = APP_ROOT . 'public' . $path;
                                if (move_uploaded_file($files['tmp_name'][$key], $path_final)) {
                                    $dtoAttachment = new Attachment();
                                    $dtoAttachment->nameencode = $name_encrypt;
                                    $dtoAttachment->namefile = $name_original;
                                    $dtoAttachment->path = $path;
                                    $dtoAttachment->type = 'image';

                                    $id = DAOFactory::getAttachmentDAO()->insert($dtoAttachment);
                                    if (is_numeric($id)) {
                                        $dtoTeamHasAttachment = new TeamHasAttachment();
                                        $dtoTeamHasAttachment->codattachment = $id;
                                        $dtoTeamHasAttachment->codteam = $code;

                                        try {
                                            DAOFactory::getTeamHasAttachmentDAO()->insert($dtoTeamHasAttachment);
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

    public function endProcess($message, $status = false) {
        $this->_view->_print(array('message' => $message, 'status' => $status));
        exit();
    }

    public function deletephototeam() {
        if ($this->_request->isAjax()) {
            $team = $this->post('team');
            $cod_attachment = $this->post('attachment');

            $teamHasAttachment = DAOFactory::getTeamHasAttachmentDAO();
            $dtoTeamHasAttachment = $teamHasAttachment->load($cod_attachment, $team);
            if (is_object($dtoTeamHasAttachment)) {
                try {
                    $teamHasAttachment->delete($cod_attachment, $team);
                    $attachment = DAOFactory::getAttachmentDAO();
                    $dtoAttachment = $attachment->load($cod_attachment);
                    $this->delete($dtoAttachment->path);
                    DAOFactory::getAttachmentDAO()->delete($cod_attachment);
                    $message = "Se ha eliminado la imagen.";
                    $this->endProcess($message, true);
                } catch (Exception $exc) {
                    $message = "Ha ocurrido un error eliminando la imagen";
                    $this->endProcess($message);
                }
            }
        }
    }
    
     public function postertournament() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            $coduser = $this->_sesion->user->coduser;
            if (is_numeric($tournament->codtournament) && $tournament->coduser == $coduser) {
                $files = $_FILES[$this->post('name_files')];
                if (is_array($files['error'])) {
                    foreach ($files['error'] as $key => $error) {
                        if ($error == UPLOAD_ERR_OK) {
                            $name_original = $files['name'][$key];
                            $extension = strtolower(pathinfo($name_original, PATHINFO_EXTENSION));
                            $name_encrypt = trim((sha1($name_original . Util::getRandom(20))) . '.' . $extension);
                            if (in_array($extension, array('png', 'jpg', 'jpeg', 'gif'))) {
                                $path = '/files/posters/' . $name_encrypt;
                                $path_final = APP_ROOT . 'public' . $path;
                                if (move_uploaded_file($files['tmp_name'][$key], $path_final)) {
                                    try {
                                        if (!is_null($tournament->poster)) {
                                            $this->delete($tournament->poster);
                                        }
                                        $tournament->poster = $path;
                                        DAOFactory::getTournamentDAO()->update($tournament);
                                        $this->endProcess("¡Se ha cambiado la imagen de poster!", true);
                                    } catch (Exception $exc) {
                                        $this->endProcess('Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.');
                                    }
                                }
                            } else {
                                $this->endProcess("Archivo invalido para la cancha.");
                            }
                        }
                    }
                }
            } else {
                $this->endProcess('Ha ocurrido un error en la validación.');
            }
        }
    }

}