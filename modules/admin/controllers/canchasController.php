<?php

class CanchasController extends Controller {

    /**
     *
     * @var Administrator 
     */
    private $user;
    private $_cancha;
    private $_days;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();

        $this->user = $this->_sesion->user;
        $this->_days = array(1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo', 8 => 'Festivo');
        $this->_view->assign('days', $this->_days);
    }

    public function index() {
        $this->_view->renderizar();
    }

    public function inicio($complejo = null) {
        //        if ($this->user->isindex) {
        $this->_view->setItems('only', array('index.js'));
        $reserve = DAOFactory::getReserveDAO();
        $stdMin = DAOFactory::getReserveDAO()->getMinDate($complejo);
        $stdMax = DAOFactory::getReserveDAO()->getMaxDate($complejo);
        if (!is_null($stdMax->date) && !is_null($stdMin->date)) {
            $canal1 = $reserve->porcentajeByCanal(1, $complejo, $stdMin->date->format('Y-m-d'), $stdMax->date->format('Y-m-d'));
            $canal2 = $reserve->porcentajeByCanal(2, $complejo, $stdMin->date->format('Y-m-d'), $stdMax->date->format('Y-m-d'));
            $this->_view->assign('canal1', $canal1);
            $this->_view->assign('canal2', $canal2);
            $this->_view->assign('dateS', $stdMin->date->format('d/m/Y'));
            $this->_view->assign('dateE', $stdMax->date->format('d/m/Y'));
        }
        $dtoComplex = DAOFactory::getComplexDAO()->load($complejo);
        $this->_view->assign('dtoComplex', $dtoComplex);
        $this->_view->renderizar('inicio');
//        } else {
//            die('Acceso no permitido para el usuario.');
//        }
    }

    public function complejos() {
        $this->_view->setItems('only', array('complejos.js'));
        $all_complex = DAOFactory::getComplexDAO()->queryAllComplex();
        if (isset($all_complex)) {
            $this->_view->assign('all_complex', $all_complex);
        }
        $this->_view->renderizar(__FUNCTION__);
    }

    public function deletecomplex() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $complex = DAOFactory::getComplexDAO();
            $dtoComplex = $complex->load($code);
            if (is_object($dtoComplex)) {
                try {
                    $count = DAOFactory::getComplexHasAttachmentDAO()->hasReserve($code);
                    if ($count == 0) {
                        $attachtments = $complex->getAttachments($code);
                        DAOFactory::getComplexHasAttachmentDAO()->deleteByComplex($code);
                        //eliminar los adjuntos
                        if (!empty($attachtments)) {
                            foreach ($attachtments as $attachtment) {
                                $this->delete($attachtment->path);
                                DAOFactory::getAttachmentDAO()->delete($attachtment->cod_attachment);
                            }
                        }
                        DAOFactory::getFavoritesComplexDAO()->deleteByComplex($code);
                        //eliminar los administradores
                        DAOFactory::getAdministratorDAO()->deleteByCodComplex($code);
                        //eliminar canchas
                        DAOFactory::getSubComplexDAO()->deleteByCodComplex($code);
                        //eliminar complejo
                        $complex->delete($code);
                        $messsage = "Se ha eliminado el complejo correctamen.";
                        $this->endProcess($messsage, true);
                    } else {
                        $messsage = "El complejo que intenta eliminar tiene reservas asignadas.";
                        $this->endProcess($messsage);
                    }
                } catch (Exception $exc) {
                    $messsage = "Ha ocurrido un error eliminado el complejo, por favor vuelva a intentarlo.";
                    $this->endProcess($messsage);
                }
            }
        }
    }

    public function createcomplex() {
        $result = array('status' => false, 'message' => "Ha ocurrido un error en el proceso. Por favor vuelva a intentarlo.");
        if ($this->_request->isAjax()) {
            $dtoComplex = new Complex();
            $dtoComplex->name = $this->post('name_complex');
            $dtoComplex->email = $this->post('email');
            $dtoComplex->description = $this->post('description');
            $dtoComplex->phone = $this->post('phone');
            $dtoComplex->address = $this->post('address');
            $dtoComplex->lat = $this->post('lat');
            $dtoComplex->lng = $this->post('lng');
            $dtoComplex->ifqualification = 0;

            if (!empty($dtoComplex->name) && !empty($dtoComplex->address) && !empty($dtoComplex->phone) && !empty($dtoComplex->email) && !empty($dtoComplex->description) && is_numeric($dtoComplex->lat) && is_numeric($dtoComplex->lng)) {
                if (Util::isEmail($dtoComplex->email)) {
                    $extension = pathinfo($_FILES['fotocomplex']['name'], PATHINFO_EXTENSION);
                    if (in_array(strtolower($extension), array('jpeg', 'jpg', 'gif', 'png'))) {
                        $this->getLibrary("upload" . DS . "class.upload");
                        $handle = new upload($_FILES['fotocomplex']);
                        if ($handle->uploaded) {
                            $handle->file_new_name_body = time();
                            $handle->process(APP_ROOT . "public" . DS . "files" . DS . "complex" . DS);
                            if ($handle->processed) {
                                $img = "public" . SDS . "files" . SDS . "complex" . SDS . $handle->file_dst_name;
                                $handle->clean();
                                $attachment = new Attachment();
                                $attachment->type = "image";
                                $attachment->path = $img;
                                $attachment->description = "Imagen del complejo...";
                                $attachment->nameencode = $attachment->namefile;
                                $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);
                                if (is_numeric($attachment->codattachment)) {
                                    $dtoComplex->codcomplex = DAOFactory::getComplexDAO()->insert($dtoComplex);
                                    if (is_numeric($dtoComplex->codcomplex)) {
                                        $complex_has_attachment = new ComplexHasAttachment();
                                        $complex_has_attachment->codattachment = $attachment->codattachment;
                                        $complex_has_attachment->codcomplex = $dtoComplex->codcomplex;
                                        $id = DAOFactory::getComplexHasAttachmentDAO()->insert($complex_has_attachment);
                                        if (is_numeric($id)) {
                                            $result['status'] = true;
                                            $result['message'] = 'Se ha creado el complejo correctamente, para agregar canchas haga click <a href="' . BASE_URL . '/admin/canchas/editarcomplejo/' . $dtoComplex->codcomplex . '">AQUI</a>';
                                            $result['url'] = BASE_URL . "/admin/canchas/editarcomplejo/$dtoComplex->codcomplex";
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        $result['message'] = "El formato de la imagen ingresada no es válido, por favor ingrese otra.";
                    }
                } else {
                    $result['message'] = "El email o correo electrónico no es válido, por favor ingrese otro.";
                }
            }
        }
        $this->_view->_print($result);
    }

    public function addphotocomplex() {
        $result = array('status' => false, 'message' => "Ha ocurrido un error en el proceso. Por favor vuelva a intentarlo.");
        if ($this->_request->isAjax()) {
            $cod_complex = $this->post("complejo");
            if (is_numeric($cod_complex) && isset($_FILES['fotocomplex'])) {
                $extension = pathinfo($_FILES['fotocomplex']['name'], PATHINFO_EXTENSION);
                if (in_array(strtolower($extension), array('jpeg', 'jpg', 'gif', 'png'))) {
                    $this->getLibrary("upload" . DS . "class.upload");
                    $handle = new upload($_FILES['fotocomplex']);
                    if ($handle->uploaded) {
                        $handle->file_new_name_body = time();
                        $handle->process(APP_ROOT . "public" . DS . "files" . DS . "complex" . DS);
                        if ($handle->processed) {
                            $img = "public" . SDS . "files" . SDS . "complex" . SDS . $handle->file_dst_name;
                            $handle->clean();
                            $attachment = new Attachment();
                            $attachment->type = "image";
                            $attachment->path = $img;
                            $attachment->description = "Imagen del complejo...";
                            $attachment->nameencode = $attachment->namefile;
                            $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);
                            if (is_numeric($attachment->codattachment)) {
                                $complex_has_attachment = new ComplexHasAttachment();
                                $complex_has_attachment->codattachment = $attachment->codattachment;
                                $complex_has_attachment->codcomplex = $cod_complex;
                                $id = DAOFactory::getComplexHasAttachmentDAO()->insert($complex_has_attachment);
                                if (is_numeric($id)) {
                                    $result['status'] = true;
                                    $result['message'] = 'Se agregó la imagen correctamente al complejo.';
                                }
                            }
                        }
                    }
                } else {
                    $result['message'] = "El formato de la imagen ingresada no es válido, por favor ingrese otra.";
                }
            }
        }
        $this->_view->_print($result);
    }

    public function updatecomplex() {
        $result = array('status' => false, 'message' => "Ha ocurrido un error en el proceso. Por favor vuelva a intentarlo.");
        if ($this->_request->isAjax()) {
            $dtoComplex = new Complex();
            $dtoComplex->codcomplex = $this->post('complejo');
            $dtoComplex->name = $this->post('name_complex');
            $dtoComplex->email = $this->post('email');
            $dtoComplex->description = $this->post('description');
            $dtoComplex->phone = $this->post('phone');
            $dtoComplex->address = $this->post('address');
            $dtoComplex->lat = $this->post('lat');
            $dtoComplex->lng = $this->post('lng');
            if (is_numeric($dtoComplex->codcomplex) && !empty($dtoComplex->name) && !empty($dtoComplex->address) && !empty($dtoComplex->phone) && !empty($dtoComplex->email) && !empty($dtoComplex->description) && is_numeric($dtoComplex->lat) && is_numeric($dtoComplex->lng)) {
                if (Util::isEmail($dtoComplex->email)) {
                    DAOFactory::getComplexDAO()->update($dtoComplex);
                    $result['status'] = true;
                    $result['message'] = "Se ha actualizado la información de la cancha correctamente.";
                } else {
                    $result['message'] = "El email o correo electrónico no es válido, por favor ingrese otro.";
                }
            }
        }
        $this->_view->_print($result);
    }

    public function addsubcomplex() {
        $result = array('status' => false, 'message' => "Ha ocurrido un error en el proceso. Por favor vuelva a intentarlo.");
        if ($this->_request->isAjax()) {
            $sub = new SubComplex();
            $sub->codcomplex = $this->post("complejo");
            $sub->name = $this->post("name");
            if (is_numeric($sub->codcomplex)) {
                $sub->codsubcomplex = DAOFactory::getSubComplexDAO()->insert($sub);
            } else {
                $this->_view->_print($result);
                return;
            }
            if (isset($_FILES['fotocancha'])) {
                $extension = pathinfo($_FILES['fotocancha']['name'], PATHINFO_EXTENSION);
                if (in_array(strtolower($extension), array('jpeg', 'jpg', 'gif', 'png'))) {
                    $this->getLibrary("upload" . DS . "class.upload");
                    $handle = new upload($_FILES['fotocancha']);
                    if ($handle->uploaded) {
                        $handle->file_new_name_body = time();
                        $handle->process(APP_ROOT . "public" . DS . "files" . DS . "complex" . DS);
                        if ($handle->processed) {
                            $img = "public" . SDS . "files" . SDS . "complex" . SDS . $handle->file_dst_name;
                            $handle->clean();
                            $attachment = new Attachment();
                            $attachment->type = "image";
                            $attachment->path = $img;
                            $attachment->description = "Imagen del complejo y su cancha...";
                            $attachment->nameencode = $attachment->namefile;
                            $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);
                            if (is_numeric($attachment->codattachment) && is_numeric($sub->codsubcomplex)) {
                                $complex_has_attachment = new ComplexHasAttachment();
                                $complex_has_attachment->codattachment = $attachment->codattachment;
                                $complex_has_attachment->codcomplex = $sub->codcomplex;
                                $complex_has_attachment->codsubcomplex = $sub->codsubcomplex;
                                $id = DAOFactory::getComplexHasAttachmentDAO()->insert($complex_has_attachment);
                                if (is_numeric($id)) {
                                    $result['status'] = true;
                                    $result['message'] = 'Se agrego la cancha correctamente.';
                                }
                            }
                        }
                    }
                } else {
                    $result['message'] = "El formato de la imagen ingresada no es válido, por favor ingrese otra.";
                }
            } else {
                if (is_numeric($sub->codsubcomplex)) {
                    $result['status'] = true;
                    $result['message'] = 'Se agrego la cancha correctamente.';
                }
            }
        }
        $this->_view->_print($result);
    }

    public function load_edit_cancha() {
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $cod_cancha = $this->post('cancha');
        if (is_numeric($cod_cancha)) {
            $cancha = DAOFactory::getSubComplexDAO()->loadConFoto($cod_cancha);
            if (isset($cancha)) {
                $this->_view->setLayout("empty");
                $this->_view->setOutput(false);
                $this->_view->assign('cancha', $cancha);
                $data["html"] = $this->_view->renderizar(__FUNCTION__);
                if (isset($data["html"])) {
                    $data["message"] = "Operación realizada con exito.";
                    $data["status"] = true;
                }
            }
        }
        $this->_view->_print($data);
    }

    public function updatesubcomplex() {
        $result = array('status' => false, 'message' => "Ha ocurrido un error en el proceso. Por favor vuelva a intentarlo.");
        if ($this->_request->isAjax()) {
            $sub = new SubComplex();
            $sub->codcomplex = $this->post("complejo");
            $sub->name = $this->post("name");
            $sub->codsubcomplex = $this->post("cancha");
            if (is_numeric($sub->codcomplex) && is_numeric($sub->codsubcomplex)) {
                $affets = DAOFactory::getSubComplexDAO()->update($sub);
                if (isset($_FILES['fotocancha'])) {
                    $auxsubcomplex = DAOFactory::getComplexHasAttachmentDAO()->getBySubComplex($sub->codsubcomplex);
                    if (isset($auxsubcomplex)) {
                        DAOFactory::getComplexHasAttachmentDAO()->deleteByCodSubComplex($auxsubcomplex->codsubcomplex);
                    }
                    $extension = pathinfo($_FILES['fotocancha']['name'], PATHINFO_EXTENSION);
                    if (in_array(strtolower($extension), array('jpeg', 'jpg', 'gif', 'png'))) {
                        $this->getLibrary("upload" . DS . "class.upload");
                        $handle = new upload($_FILES['fotocancha']);
                        if ($handle->uploaded) {
                            $handle->file_new_name_body = time();
                            $handle->process(APP_ROOT . "public" . DS . "files" . DS . "complex" . DS);
                            if ($handle->processed) {
                                $img = "public" . SDS . "files" . SDS . "complex" . SDS . $handle->file_dst_name;
                                $handle->clean();
                                $attachment = new Attachment();
                                $attachment->type = "image";
                                $attachment->path = $img;
                                $attachment->description = "Imagen del complejo y su cancha...";
                                $attachment->nameencode = $attachment->namefile;
                                $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);
                                if (is_numeric($attachment->codattachment) && is_numeric($sub->codsubcomplex)) {
                                    $complex_has_attachment = new ComplexHasAttachment();
                                    $complex_has_attachment->codattachment = $attachment->codattachment;
                                    $complex_has_attachment->codcomplex = $sub->codcomplex;
                                    $complex_has_attachment->codsubcomplex = $sub->codsubcomplex;
                                    $id = DAOFactory::getComplexHasAttachmentDAO()->insert($complex_has_attachment);
                                    if (is_numeric($id)) {
                                        $result['status'] = true;
                                        $result['message'] = 'Se actualizó la cancha correctamente.';
                                    }
                                }
                            }
                        }
                    } else {
                        $result['message'] = "El formato de la imagen ingresada no es válido, por favor ingrese otra.";
                    }
                } else {
                    $result['status'] = true;
                    $result['message'] = 'Se actualizó la cancha correctamente.';
                }
            }
        }
        $this->_view->_print($result);
    }

    public function deletesubcomplex() {
        $messsage = "Ha ocurrido un error eliminado el complejo, por favor vuelva a intentarlo.";
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            if (is_numeric($code)) {
                $sub_complex = DAOFactory::getSubComplexDAO()->load($code);
                if (isset($sub_complex)) {
                    try {
                        $affets = DAOFactory::getSubComplexDAO()->delete($code);
                        if (is_numeric($affets)) {
                            $messsage = "La cancha se eliminó correctamente.";
                            $this->endProcess($messsage, true);
                        }
                    } catch (Exception $exc) {
                        $messsage = "Ha ocurrido un error eliminado el complejo, por favor vuelva a intentarlo.";
                        $this->endProcess($messsage);
                    }
                }
            }
        }
        $this->endProcess($messsage);
    }

    //-----------editarcomplejo
    public function editarcomplejo($complejo = null) {
        if (is_numeric($complejo)) {
            $dtoComplex = DAOFactory::getComplexDAO()->load($complejo);
            if (isset($dtoComplex)) {
                $this->_view->setItems('only', array('editarcomplejo.js'));
                $this->_view->assign('dtoComplex', $dtoComplex);
                $all_complex = DAOFactory::getSubComplexDAO()->queryByCodComplex($complejo);
                $attachment = DAOFactory::getComplexDAO()->getAttachments($complejo);
                $this->_view->assign("photos", $attachment);
                if (isset($all_complex)) {
                    $this->_view->assign('all_complex', $all_complex);
                }
                $this->_view->renderizar(__FUNCTION__);
            }
        }
    }

    public function agenda($complejo = null, $render_iframe = NULL) {
        $subComplex = DAOFactory::getSubComplexDAO();
        $subs = $subComplex->queryByCodComplex($complejo);
        if (!is_null($subs)) {
            $this->_view->setItems('only', array('fullcalendar.js', 'agenda.js', 'fullcalendar.css', 'fullcalendar.print.css'));
            $this->_view->assign('subs', $subs);
            $this->_cancha = $subs[0]->codsubcomplex;
            $dtoComplex = DAOFactory::getComplexDAO()->load($complejo);
            $attachment = DAOFactory::getComplexDAO()->getAttachments($complejo);
            $desde = date("Y") . "-" . date("m") . "-" . 01;
            $hasta = date("Y") . "-" . date("m") . "-" . cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
            $mes = $this->reservaMesDias($desde, $hasta);
            $this->_view->assign("dtoComplex", $dtoComplex);
            $this->_view->assign("_complejo", $dtoComplex);
            $this->_view->assign("_imagenes", $attachment);
            $this->_view->assign("_mes", $mes);
            if ($render_iframe == "loadiframe") {
                $mygame = $this->get('game');
                $this->_view->assign('only_content', true);
                $this->_view->assign('isiframe', true);
                $this->_view->assign('codgame', $mygame);
            }
            $this->_view->renderizar(__FUNCTION__);
        } else {
            die('El complejo no cuenta con canchas para poder realizar reservas a traves de la agenda.');
        }
    }

    //Traer Resrvas del Mes AJAX

    public function reservaMes() {
        $mes = $this->post('mes') + 1;
        $ano = $this->post('ano');
        $desde = $ano . "-" . $mes . "-" . 01;
        $hastaaux = $ano . "-" . $mes . "-" . cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
        $hasta = date('Y-m-d', strtotime("+1 days", strtotime($hastaaux)));
        echo $this->reservaMesDias($desde, $hasta, true);
    }

//Traer DÃ­as con reservas

    public function reservaMesDias($desde, $hasta, $ajax = false) {
        if ($ajax) {
            $cancha = $this->post('cancha');
        } else {
            $cancha = $this->_cancha;
        }
        if ($cancha) {
            $limit = $this->getLimit($cancha);
            $response = DAOFactory::getReserveDAO()->getMonth($desde, $hasta, $cancha);
            if ($response) {
                $dias = array();
                $acumulativo = 0;
                foreach ($response as $key => $value) {
                    $value->start = new DateTime($value->start);
                    $value->end = new DateTime($value->end);
                    $end = (float) $value->end->format('H') + $value->end->format('i') / 60;
                    $start = (float) $value->start->format('H') + $value->start->format('i') / 60;
                    $acumulativo += $end - $start;
                    $dias[(int) $value->start->format('d')]['hours'] += $end - $start;
                    $dias[(int) $value->start->format('d')]['codsubcomplex'] = $value->codsubcomplex;
                    $dias[(int) $value->start->format('d')]['week'] = $value->start->format('w');
                    $dias[(int) $value->start->format('d')]['limit'] = $limit[$value->start->format('w')];
                }
                foreach ($dias as $key => $value) {
                    $hours_now = $value['hours'];
                    $hours_limit = $value['limit'];
                    if (!$hours_limit) {
                        $hours_limit = -1000;
                    }
                    $status = (float) $hours_limit - $hours_now;
                    if ($status == $hours_limit) {
                        $dias[$key]['status'] = 'green'; // Todo el dÃ­a Ocupado
                    } elseif ($status > 0) {
                        $dias[$key]['status'] = 'orange'; // Hay Cupos Disponibles
                    } elseif ($status <= 0) {
                        $dias[$key]['status'] = 'gray'; // Todo el DÃ­a Ocupado
                    }
                    $dias[$key]['hours_free'] = $status < 0 ? 0 : $status;
                }
                return json_encode($dias, true);
            } else {
                return;
            }
        }
    }

    // Traer limites por semana

    public function getLimit($cod_sub) {
        $schedules = DAOFactory::getScheduleDAO()->getScheduleByComplexOrderByDay($cod_sub);

        $limit = array();
        if (!is_null($schedules)) {
            foreach ($schedules as $value) {
                $value->starthour = new DateTime($value->starthour);
                $value->endhour = new DateTime($value->endhour);
                $start = (float) $value->starthour->format('H') + $value->starthour->format('i') / 60;
                $end = (float) $value->endhour->format('H') + $value->endhour->format('i') / 60;
                $limit[$value->day] += ($end - $start);
            }
        }
        return $limit;
    }

    public function sscancha() {
        $complex = DAOFactory::getComplexDAO()->queryAll();
        $this->_view->assign('fields', $complex);
        $this->_view->setItems('only', array('complex.js'));
        $this->_view->renderizar(__FUNCTION__);
    }

    public function horario($cod_complex = null) {
        if (is_null($cod_complex)) {
            die('Parametros invalidos.');
        }
        if (is_numeric($cod_complex)) {
            $this->_view->setItems('only', array('jquery.price_format.1.8.min.js_.js', 'horario.js'));
            $complex = DAOFactory::getComplexDAO();
            $dtoComplex = $complex->load($cod_complex);
            $attachments = $complex->getAttachments($cod_complex);
            $subComplex = DAOFactory::getSubComplexDAO();
            $subs = $subComplex->queryByCodComplex($cod_complex);
            if (!is_null($subs)) {
                $this->_view->assign('subs', $subs);
                $schedule = DAOFactory::getScheduleDAO();
                $first = $subs[0];
                $morning = $schedule->getSchedulesByTime(1, $first->codsubcomplex);
                $afternoon = $schedule->getSchedulesByTime(2, $first->codsubcomplex);
                $this->_view->assign('morning', $morning);
                $this->_view->assign('afternoon', $afternoon);
                $this->_view->assign('first', $first);
            }
            if (!is_null($attachments)) {
                $this->_view->assign('attachments', $attachments);
            }
            if (is_object($dtoComplex)) {
                $this->_view->assign('dtoComplex', $dtoComplex);
                $this->_view->renderizar(__FUNCTION__);
            } else {
                die('Acceso no permitido');
            }
        }
    }

    public function usuarios() {
        if ($this->user->isuser) {
            $this->_view->setItems('only', array('users.js'));
            $complex = DAOFactory::getComplexDAO();
            $dtoComplex = $complex->load($this->user->codcomplex);
            if (is_object($dtoComplex)) {
                $administrator = DAOFactory::getAdministratorDAO();
                $users = $administrator->queryByCodComplex($this->user->codcomplex);
                $this->_view->assign('users', $users);
                $this->_view->assign('complex', $dtoComplex);
                $this->_view->renderizar(__FUNCTION__);
            } else {
                die('Acceso no permitido.');
            }
        } else {
            die('Acceso no permitido para el usuario.');
        }
    }

    public function subcomplex() {
        if ($this->_request->isAjax()) {
            $cod_sub = $this->post('code');
            $day = $this->post('day');
            $days_keys = array_keys($this->_days);
            if (in_array($day, $days_keys)) {
                $subComplex = DAOFactory::getSubComplexDAO();
                $dtoSub = $subComplex->load($cod_sub);
                if (is_object($dtoSub)) {
                    $schedule = DAOFactory::getScheduleDAO();
                    $morning = $schedule->getSchedulesByTime(1, $cod_sub, $day);
                    $afternoon = $schedule->getSchedulesByTime(2, $cod_sub, $day);
                    $this->_view->assign('morning', $morning);
                    $this->_view->assign('afternoon', $afternoon);
                    $this->_view->setLayout('empty');
                    $this->_view->setOutput(false);
                    $this->_view->assign('template', 'schedule');
                    $html = $this->_view->renderizar();
                    $this->_view->_print(array('html' => $html, 'status' => true), true);
                }
            }
        }
    }

    public function addschedule() {
        if ($this->_request->isAjax()) {
            $day = $this->post('day');
            $days_keys = array_keys($this->_days);
            $start = $this->post('start');
            $end = $this->post('end');
            $price = $this->post('price');
            $cod_sub = $this->post('sub');
            $multiplo_hora = $this->post('mult');
            if (is_numeric($multiplo_hora)) {
                if ($multiplo_hora > 2) {
                    $multiplo_hora = 1;
                }
            } else {
                $multiplo_hora = 1;
            }
            $subComplex = DAOFactory::getSubComplexDAO();
            $dtoSubComplex = $subComplex->load($cod_sub);
            if (in_array($day, $days_keys) && !empty($start) && !empty($end) && is_numeric($price) && is_object($dtoSubComplex) && is_numeric($cod_sub)) {
                if ($start != $end) {
                    $hour1 = strtotime($start);
                    $hour2 = strtotime($end);
                    if ($hour1 < $hour2) {
                        $schedule = DAOFactory::getScheduleDAO();
                        if (!$schedule->isScheduleBetweenHours($day, $start, $end, $cod_sub)) {
                            if (!$schedule->schedule_exist($day, $start, $end, $cod_sub)) {
                                if ($price > 0) {
                                    $dtoSchedule = new Schedule();
                                    $dtoSchedule->day = $day;
                                    $dtoSchedule->starthour = $start;
                                    $dtoSchedule->endhour = $end;
                                    $dtoSchedule->price = $price;
                                    $dtoSchedule->codsubcomplex = $cod_sub;
                                    try {
                                        for ($i = (int) $start; $i < (int) $end; $i = ($i + $multiplo_hora)) {
                                            $fin_hora = ($i + $multiplo_hora);
                                            if ($fin_hora > 23) {
                                                $fin_hora = 23;
                                            }
                                            $dtoSchedule = new Schedule();
                                            $dtoSchedule->day = $day;
                                            $dtoSchedule->starthour = "$i:00";
                                            $dtoSchedule->endhour = $fin_hora . ":00";
                                            $dtoSchedule->price = $price;
                                            $dtoSchedule->codsubcomplex = $cod_sub;
                                            $schedule->insert($dtoSchedule);
                                        }
                                        $message = "Se ha asigando correctamente el horario.";
                                        $this->endProcess($message, true);
                                    } catch (Exception $exc) {
                                        $message = "Surgió un error en el proceso, por favor intentelo de nuevo.";
                                    }
                                } else {
                                    $message = "El precio debe ser mayor a $ 0";
                                    $this->endProcess($message);
                                }
                            } else {
                                $message = "El día ya tiene definidio horario para las horas ingresadas.";
                                $this->endProcess($message);
                            }
                        } else {
                            $message = "Las horas seleccionadas para el día se cruzan con horarios ya establecidos, por favor inténtelo de nuevo.";
                            $this->endProcess($message);
                        }
                    } else {
                        $message = "La hora de inicio debe ser menor a la hora final.";
                        $this->endProcess($message);
                    }
                } else {
                    $message = "La hora de inicio no puede ser igual a la hora final.";
                    $this->endProcess($message);
                }
            } else {
                $message = "Ha ocurrido un error en la validación de los datos, por favor vuelva a intentarlo.";
                $this->endProcess($message);
            }
        }
    }

    public function deleteschedule() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $schedule = DAOFactory::getScheduleDAO();
            $dtoSchedule = $schedule->load($code);
            if (is_object($dtoSchedule)) {
                try {
                    $schedule->delete($code);
                    $message = "Se ha eliminado el horario.";
                    $this->endProcess($message, true);
                } catch (Exception $exc) {
                    $message = "Surgió un error en el proceso, por favor intentelo de nuevo.";
                }
            } else {
                $message = "Ha ocurrido un error eliminando el horario, por favor vuelva a intentarlo.";
                $this->endProcess($message);
            }
        }
    }

    public function endProcess($message, $status = false) {
        $this->_view->_print(array('message' => $message, 'status' => $status));
        exit();
    }

    public function createuser() {
        if ($this->_request->isAjax()) {
            $name = $this->post('name');
            $email = $this->post('email');
            $address = $this->post('address');
            $phone = $this->post('phone');
            $password = $this->post('password');
            $is_index = $this->post('is_index') == "true" ? true : false;
            $is_diary = $this->post('is_diary') == "true" ? true : false;
            $is_complex = $this->post('is_complex') == "true" ? true : false;
            $is_user = $this->post('is_user') == "true" ? true : false;
            $cod_complex = $this->post('complex');

            $complex = DAOFactory::getComplexDAO();
            $dtoComplex = $complex->load($cod_complex);

            if (!empty($name) && !empty($email) && !empty($address) && !empty($phone) && is_object($dtoComplex) && !empty($password)) {
                if (is_bool($is_index) && is_bool($is_diary) && is_bool($is_complex) && is_bool($is_user)) {
                    if ($is_index || $is_diary || $is_user || $is_complex) {

                        if (Util::isEmail($email)) {
                            $dtoA = DAOFactory::getAdministratorDAO()->queryByEmail($email);
                            if (empty($dtoA)) {
                                if ($this->user->codcomplex == $cod_complex && $this->user->isuser) {

                                    $administrator = DAOFactory::getAdministratorDAO();

                                    $dto = new Administrator();
                                    $dto->name = $name;
                                    $dto->address = $address;
                                    $dto->iscomplex = $is_complex;
                                    $dto->password = sha1($password);
                                    $dto->isdiary = $is_diary;
                                    $dto->isindex = $is_index;
                                    $dto->isuser = $is_user;
                                    $dto->phone = $phone;
                                    $dto->email = $email;
                                    $dto->codcomplex = $cod_complex;

                                    try {
                                        $id = $administrator->insert($dto);
                                        if (is_numeric($id)) {
                                            $message = "Se ha creado el usuario.";
                                            $this->endProcess($message, true);
                                        }
                                    } catch (Exception $exc) {
                                        $message = "Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.";
                                        $this->endProcess($message);
                                    }
                                }
                            } else {
                                $message = "El correo electrónico ya se encuentra registrado, por favor elija otro.";
                                $this->endProcess($message);
                            }
                        } else {
                            $message = "Debe ingresar una dirección de correo electronico valida.";
                            $this->endProcess($message);
                        }
                    } else {
                        $message = "Debe seleccionar al menos un permiso para el usuario.";
                        $this->endProcess($message);
                    }
                } else {
                    $message = "Error en la validación de los datos, por favor vuelva a intentarlo.";
                    $this->endProcess($message);
                }
            } else {
                $message = "Todos los datos son obligatorios.";
                $this->endProcess($message);
            }
        }
    }

    public function subs($cod_complex = null) {
        if (is_null($cod_complex)) {
            die('Parametros invalidos.');
        }
        if ($this->user->iscomplex && $this->user->codcomplex == $cod_complex) {
            $this->_view->setItems('only', array('subs.js'));
            $this->_view->assign('codecomplex', $cod_complex);

            $subs = DAOFactory::getSubComplexDAO()->queryByCodComplex($cod_complex);
            if (!is_null($subs)) {
                $this->_view->assign('subs', $subs);
            }
            $this->_view->renderizar(__FUNCTION__);
        } else {
            die('Acceso no definido');
        }
    }

    public function createsub() {
        if ($this->_request->isAjax()) {
            $name = $this->post('name');
            $code = $this->post('code');

            $this->_view->setItems('only', array('subs.js'));

            if (is_numeric($code)) {
                if (!empty($name) && is_numeric($code)) {
                    $dto = new SubComplex();
                    $dto->name = $name;
                    $dto->codcomplex = $code;
                    $id = DAOFactory::getSubComplexDAO()->insert($dto);
                    if (is_numeric($id)) {
                        $this->endProcess("Se ha creado la cancha correctamente.", true);
                    } else {
                        $this->endProcess("Ha ocurrido un error creando la cancha, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("Ha ocurrido un error creando la cancha, por favor vuelva a intentarlo.");
                }
            }
        }
    }

    public function editarsub($cod_sub) {

        $dtoSub = DAOFactory::getSubComplexDAO()->load($cod_sub);
        if (is_object($dtoSub)) {
            if ($this->user->codcomplex == $dtoSub->codcomplex) {
                $this->_view->setItems('only', array('subs.js'));
                $this->_view->assign('sub', $dtoSub);
                $this->_view->renderizar(__FUNCTION__);
            } else {
                die('Acceso no permitido.');
            }
        }
    }

    public function updatesub() {
        if ($this->_request->isAjax()) {

            $cod_sub = $this->post('code');
            $name = $this->post('name');

            $dtoSub = DAOFactory::getSubComplexDAO()->load($cod_sub);
            if (is_object($dtoSub)) {
                $dtoSub->name = $name;
                try {
                    DAOFactory::getSubComplexDAO()->update($dtoSub);
                    $message = "Se ha actualizado la información de la cancha.";
                    $this->endProcess($message, true);
                } catch (Exception $exc) {
                    $message = "Ha ocurrido un error actualizando la cancha, por favor vuelva a intentarlo.";
                    $this->endProcess($message);
                }
            } else {
                $message = "Ha ocurrido un error actualizando la cancha, por favor vuelva a intentarlo.";
                $this->endProcess($message);
            }
        }
    }

    public function deletesub() {
        if ($this->_request->isAjax()) {
            $cod_sub = $this->post('code');

            $dtoSub = DAOFactory::getSubComplexDAO()->load($cod_sub);
            if (is_object($dtoSub)) {
                try {
                    DAOFactory::getSubComplexDAO()->delete($cod_sub);
                    $message = "Se ha eliminado la cancha.";
                    $this->endProcess($message, true);
                } catch (Exception $exc) {
                    $message = "Ha ocurrido un error eliminando la cancha, por favor vuelva a intentarlo.";
                    $this->endProcess($message);
                }
            } else {
                $message = "Ha ocurrido un error eliminando la cancha, por favor vuelva a intentarlo.";
                $this->endProcess($message);
            }
        }
    }

    public function changeday() {
        if ($this->_request->isAjax()) {
            $cod_sub = $this->post('code');

            $day = strtolower($this->post('day'));
            $days = array('lunes' => 1, 'martes' => 2, 'miercoles' => 3, 'jueves' => 4, 'viernes' => 5, 'sabado' => 6, 'domingo' => 7, 'festivos' => 8);

            if (in_array($day, array_keys($days))) {

                $subComplex = DAOFactory::getSubComplexDAO();
                $dtoSub = $subComplex->load($cod_sub);

                if (is_object($dtoSub)) {
                    $schedule = DAOFactory::getScheduleDAO();
                    $morning = $schedule->getSchedulesByTime(1, $cod_sub, $days[$day]);
                    $afternoon = $schedule->getSchedulesByTime(2, $cod_sub, $days[$day]);

                    $this->_view->assign('morning', $morning);
                    $this->_view->assign('afternoon', $afternoon);
                    $this->_view->setLayout('empty');
                    $this->_view->setOutput(false);
                    $this->_view->assign('template', 'schedule');
                    $html = $this->_view->renderizar();
                    $this->_view->_print(array('html' => $html, 'status' => true));
                }
            }
        }
    }

    public function deleteuser() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $cod_complex = $this->post('complex');

            if ($this->user->isuser && $this->user->codcomplex == $cod_complex) {
                $administrator = DAOFactory::getAdministratorDAO()->load($code);
                if (is_object($administrator)) {
                    try {
                        DAOFactory::getAdministratorDAO()->delete($code);
                        $message = "Se ha eliminado el usuario.";
                        $this->endProcess($message, true);
                    } catch (Exception $exc) {
                        $message = "Ha ocurrido un error eliminando el usuario, por favor vuelva a intentarlo.";
                        $this->endProcess($message);
                    }
                }
            } else {
                $message = "Ha ocurrido un error eliminando el usuario, por favor vuelva a intentarlo.";
                $this->endProcess($message);
            }
        }
    }

    public function editarusuario($cod_user = null) {
        if (is_null($cod_user)) {
            die('Parametros invalidos');
        }

        $administrator = DAOFactory::getAdministratorDAO();
        $dtoAdministrator = $administrator->load($cod_user);

        if (is_object($dtoAdministrator)) {
            if ($this->user->isuser && $dtoAdministrator->codcomplex == $this->user->codcomplex) {
                $this->_view->assign('dtoadministrator', $dtoAdministrator);
                $this->_view->setItems('only', array('users.js'));
                $this->_view->renderizar(__FUNCTION__);
            } else {
                die('Acceso no permitido.');
            }
        } else {
            die('El usuario no existe.');
        }
    }

    public function updateuser() {
        if ($this->_request->isAjax()) {
            $name = $this->post('name');
            $address = $this->post('address');
            $phone = $this->post('phone');
            $password = $this->post('password');
            $is_index = $this->post('is_index') == "true" ? true : false;
            $is_diary = $this->post('is_diary') == "true" ? true : false;
            $is_complex = $this->post('is_complex') == "true" ? true : false;
            $is_user = $this->post('is_user') == "true" ? true : false;
            $cod_administrator = $this->post('code');

            $administrator = DAOFactory::getAdministratorDAO();
            $dtoAdministrator = $administrator->load($cod_administrator);

            if (!empty($name) && !empty($address) && !empty($phone) && is_object($dtoAdministrator)) {
                if (is_bool($is_index) && is_bool($is_diary) && is_bool($is_complex) && is_bool($is_user)) {
                    if ($is_index || $is_diary || $is_user || $is_complex) {

                        if ($dtoAdministrator->codcomplex == $this->user->codcomplex && $this->user->isuser) {
                            $administrator = DAOFactory::getAdministratorDAO();
                            $dto = new Administrator();
                            $dto->name = $name;
                            $dto->address = $address;
                            $dto->iscomplex = $is_complex;
                            $dto->isdiary = $is_diary;
                            $dto->isindex = $is_index;
                            $dto->isuser = $is_user;
                            $dto->phone = $phone;
                            $dto->codadministrator = $cod_administrator;

                            if (!empty($password)) {
                                $dto->password = sha1($password);
                            }
                            try {
                                $administrator->update($dto);
                                $message = "Se ha actualizado la ihformación del usuario.";
                                $this->endProcess($message, true);
                            } catch (Exception $exc) {
                                $message = "Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.";
                                $this->endProcess($message);
                            }
                        }
                    } else {
                        $message = "Debe seleccionar al menos un permiso para el usuario.";
                        $this->endProcess($message);
                    }
                } else {
                    $message = "Error en la validación de los datos, por favor vuelva a intentarlo.";
                    $this->endProcess($message);
                }
            } else {
                $message = "Todos los datos son obligatorios.";
                $this->endProcess($message);
            }
        }
    }

    public function cuenta() {
        $this->_view->setItems('only', array('account.js'));
        $this->_view->renderizar(__FUNCTION__);
    }

    public function changepassword() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $password1 = $this->post('password1');
            $password2 = $this->post('password2');

            $dtoAdministrator = DAOFactory::getAdministratorDAO()->load($code);

            if (is_object($dtoAdministrator)) {
                if (!empty($password1) && !empty($password2)) {
                    if ($password1 == $password2) {
                        $dtoAdministrator->password = sha1($password1);
                        try {
                            DAOFactory::getAdministratorDAO()->update($dtoAdministrator);
                            $message = "Se ha cambiado la contraseña.";
                            $this->endProcess($message, true);
                        } catch (Exception $exc) {
                            $message = "Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.";
                        }
                    } else {
                        $message = "Las contraseñas no coinciden.";
                        $this->endProcess($message);
                    }
                } else {
                    $message = "Los campos no pueden estar vacios.";
                    $this->endProcess($message);
                }
            }
        }
    }

    public function changeresults() {
        if ($this->_request->isAjax()) {
            $strstart = strtotime($this->post('start'));
            $strend = strtotime($this->post('end'));
            $date_start = date('Y-m-d', $strstart);
            $date_end = date('Y-m-d', $strend);

            if ($strend > $strstart) {
                if (!empty($date_end) && !empty($date_start)) {
                    if ($this->user->isindex) {
                        $reserve = DAOFactory::getReserveDAO();
                        $canal1 = $reserve->porcentajeByCanal(1, $this->user->codcomplex, $date_start, $date_end);
                        $canal2 = $reserve->porcentajeByCanal(2, $this->user->codcomplex, $date_start, $date_end);

                        if (is_null($canal1->porcentaje)) {
                            $canal1->porcentaje = 0;
                        }
                        if (is_null($canal2->porcentaje)) {
                            $canal2->porcentaje = 0;
                        }

                        $result = array('canal1' => $canal1, 'canal2' => $canal2, 'status' => true);
                        $this->_view->_print($result);
                    }
                }
            } else {
                $message = "La fecha final debe ser mayor a la fecha inicial.";
                $this->endProcess($message);
            }
        }
    }

    public function reserva_dia() {
        $ano = $this->post('ano');
        $mes = $this->post('mes') + 1;
        $dia = $this->post('dia');
        $cancha = $this->post('cancha');
        $semana = date('w', strtotime($ano . "-" . $mes . "-" . $dia));
        $response = DAOFactory::getScheduleDAO()->getScheduleByDay(date("Y-m-d", strtotime("$ano-$mes-$dia")), $semana, $cancha);
        $array = array();
        if ($response) {
            foreach ($response as $key => $value) {
                $value->starthour = new DateTime($value->starthour);
                $value->endhour = new DateTime($value->endhour);
                $array[] = array(
                    "code" => $value->codschedule,
                    "reserve" => $value->codreserve,
                    "price" => number_format($value->price),
                    "week" => $this->_days[$value->day],
                    "start" => $value->starthour->format('H-i'),
                    "end" => $value->endhour->format('H-i'),
                    "status" => $value->status
                );
            }
        }
        $this->_view->_print($array, true);
    }

    public function hacer_reserva($cod_game = NULL) {
        $schedule = DAOFactory::getScheduleDAO()->load($this->post('code'));
        $sub = DAOFactory::getSubComplexDAO()->load($this->post('cancha'));
        $user = DAOFactory::getUsersDAO()->load($this->post('user'));
        if (is_numeric($schedule->codschedule) && is_numeric($sub->codsubcomplex) && is_numeric($user->coduser)) {
            $year = $this->post('ano');
            $month = $this->post('mes');
            $day = $this->post('dia');
            $abone = $this->post('abone');
            if (is_numeric($year) && is_numeric($month) && is_numeric($day)) {
                if (!is_numeric($abone) || ($abone < 0)) {
                    $abone = 0;
                }
                if ($abone <= $schedule->price) {
                    $dto = new Reserve();
                    $schedule->starthour = new DateTime($schedule->starthour);
                    $schedule->endhour = new DateTime($schedule->endhour);

                    $dto->codsubcomplex = $sub->codsubcomplex;
                    $dto->start = "{$year}-{$month}-{$day}  " . $schedule->starthour->format('H:i');
                    $dto->end = "{$year}-{$month}-{$day}  " . $schedule->endhour->format('H:i');
                    $dto->amount = $schedule->price;
                    $dto->deposit = $abone;
                    $dto->canal = 2;
                    $dto->coduser = $user->coduser;
                    $dto->codschedule = $schedule->codschedule;
                    if (isset($cod_game)) {
                        $dto->codgames = $cod_game;
                    }else{
                        $dto->codgames = NULL;
                    }
                    if (is_numeric(DAOFactory::getReserveDAO()->insertValidate($dto))) {
                        if (isset($cod_game)) {
                            $games = new Games();
                            $games->codgames = $cod_game;
                            $games->confirmcomplex = 1;
                            $pasa = DAOFactory::getGamesDAO()->update($games);
                        }
                        if ($pasa) {
                            $this->endProcess("¡Se ha realizado la reserva exitosamente!", true);
                        } else {
                            $this->endProcess("¡Se ha realizado la reserva!", true);
                        }
                    } else {
                        $this->endProcess("Ha ocurriod un error en el proceso, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("El monto para abonar no puede ser mayor al precio establecido.");
                }
            } else {
                $this->endProcess("Error en la validación de los datos.");
            }
        } else {
            $this->endProcess("Error en la validación de los datos.");
        }
    }

    public function searchuser() {
        if ($this->_request->isAjax()) {
            $username = $this->post('username');

            $result = array('status' => false, 'message' => "No se ha encontrado el usuario, para realizar la reserva el usuario debe estar registrado en Tóquela.");

            if (!empty($username)) {

                $userModel = DAOFactory::getUsersDAO();
                $dto = $userModel->queryByUsername($username);

                if (!empty($dto)) {

                    $result['status'] = true;
                    unset($result['message']);
                    $result['user'] = $dto[0];
                }
            }
            $this->_view->_print($result);
        }
    }

    public function viewreserve() {
        if ($this->_request->isAjax()) {
            $code_reserve = $this->post('code');
            $reserve = DAOFactory::getReserveDAO()->load($code_reserve);
            if (!is_null($reserve->codreserve)) {
                $this->_view->assign('reserve', $reserve);
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $this->_view->assign('template', 'info-reserva');
                $this->_view->assign('person', DAOFactory::getUsersDAO()->load($reserve->coduser));
                $this->_view->assign('reserve', $reserve);
                $html = $this->_view->renderizar();
                $this->_view->_print(array('html' => $html, 'status' => true));
            } else {
                $this->_view->_print(array('status' => false));
            }
        }
    }

    //--------------------- complejos
//    public function createcomplex() {
//        if ($this->_request->isAjax()) {
//            $complex = DAOFactory::getComplexDAO();
//            $name_complex = $this->post('name_complex');
//            $name_admin = $this->post('name_admin');
//            $address = $this->post('address');
//            $phone = $this->post('phone');
//            $email = $this->post('email');
//            $description = $this->post('description');
//            $password = $this->post('password');
//
//
//            if (!empty($password) && !empty($name_admin) && !empty($name_complex) && !empty($address) && !empty($phone) && !empty($email) && !empty($description) && $this->user->istoquela) {
//                if (Util::isEmail($email)) {
//
//                    $dtoComplex = new Complex();
//                    $dtoComplex->address = $address;
//                    $dtoComplex->description = $description;
//                    $dtoComplex->email = $email;
//                    $dtoComplex->name = $name_complex;
//                    $dtoComplex->phone = $phone;
//                    $id = $complex->insert($dtoComplex);
//
//
//
//
//                    if (is_numeric($id)) {
//
//
//                        $dtoAdmin = new Administrator();
//
//                        $dtoAdmin->address = $address;
//                        $dtoAdmin->codcomplex = $id;
//                        $dtoAdmin->email = $email;
//                        $dtoAdmin->iscomplex = 1;
//                        $dtoAdmin->isdiary = 1;
//                        $dtoAdmin->isindex = 1;
//                        $dtoAdmin->isuser = 1;
//                        $dtoAdmin->name = $name_admin;
//                        $dtoAdmin->password = sha1($password);
//
//                        $id_admin = DAOFactory::getAdministratorDAO()->insert($dtoAdmin);
//                        if (is_numeric($id_admin)) {
//                            $message = "Se ha creado la cancha correctamente.";
//                            $this->endProcess($message, true);
//                        } else {
//                            $message = "Ha ocurrido un error creado el complejo, por favor vuelva a intentarlo.";
//                            $this->endProcess($message);
//                        }
//                    } else {
//                        $message = "Ha ocurrido un error creado el complejo, por favor vuelva a intentarlo.";
//                        $this->endProcess($message);
//                    }
//                } else {
//                    $message = "Debe ingresar una dirección de correo electrónico valido";
//                    $this->endProcess($message);
//                }
//            } else {
//                $message = "Ha ocurrido un error en la validación, por favor vuelva a intentarlo.";
//                $this->endProcess($message);
//            }
//        }
//    }



    private function delete($path) {
        if (!empty($path)) {
            if (@unlink(APP_ROOT . 'public' . $path)) {
                return true;
            }
        }
        return false;
    }

    //------------------------------ file

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

}
