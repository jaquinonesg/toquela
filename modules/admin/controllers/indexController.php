<?php

class indexController extends Controller {

    /**
     *
     * @var Administrator 
     */
    private $user;
    private $_complejo;
    private $_cancha;

    public function __construct() {
        parent::__construct();
        $this->_view->setLayout('canchas');



        $this->user = $this->_sesion->user;

        if (!is_object($this->user)) {
            $this->redireccionar('/administrador-canchas/login');
        }

        $days = array(1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo', 8 => 'Festivo');
        $this->_view->assign('days', $days);

//        $this->_complejo = $this->user->codcomplex;
        /* echo "<pre>";
          @print_r($this->user);
          echo "</pre>";
          exit; */
      }

      public function index() {
                //------ permisos admin
        if ($this->_sesion->user->codrole == 3) {
            $idRoleUser = $this->_sesion->user->codrole;
            $idUsuario = $this->_sesion->user->coduser;
            $privilegio = $this->validatePermissionsAdmin($idRoleUser, $idUsuario, 4);
        }
        //aquí coge alguno de los repetidos, y lo pone en el parametro que se necesita para validar
        if ($privilegio == 4) {
            $cod_role = $this->_sesion->user->codrole;
            $pasa = $this->validarRolesPrivilegios($cod_role, $privilegio, "Para acceder a esta seccion necesita tener permisos para administrar.", null);
        }

        if ($pasa == true || $this->_sesion->user->codrole == 2) {
            $this->_view->renderizar();
        }else{
            $this->validarRolesPrivilegios(null, null, null, null);
        }
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

    public function agenda($complejo = null) {
        $subComplex = DAOFactory::getSubComplexDAO();
        $subs = $subComplex->queryByCodComplex($complejo);
        if (!is_null($subs)) {
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
            $this->_view->setItems('only', array('1fullcalendar.js', '2canchas.js', 'canchas.css', 'fullcalendar.css', 'fullcalendar.print.css'));
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
        //$cancha = 1;
        if ($cancha) {
            $limit = $this->getLimit($cancha);
            /* echo "<pre style='border:1px solid red;'>";
              @print_r($limit);
              echo "</pre>"; */
              $response = DAOFactory::getReserveDAO()->getMonth($desde, $hasta, $cancha);
              if ($response) {
                $dias = array();
                /* echo "<pre style='border:1px solid red;'>";
                  @print_r($response);
                  echo "</pre>"; */
                  $acumulativo = 0;
                  foreach ($response as $key => $value) {
                    $end = (float) $value->end->format('H') + $value->end->format('i') / 60;
                    $start = (float) $value->start->format('H') + $value->start->format('i') / 60;
                    $acumulativo += $end - $start;
                    $dias[(int) $value->start->format('d')]['hours'] += $end - $start;
                    $dias[(int) $value->start->format('d')]['codsubcomplex'] = $value->codsubcomplex;
                    $dias[(int) $value->start->format('d')]['week'] = $value->start->format('w');
                    $dias[(int) $value->start->format('d')]['limit'] = $limit[$value->start->format('w')];
                }
                /* echo "<pre style='border:1px solid red;'>";
                  @print_r($dias);
                  echo "</pre>"; */
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
                //return $dias;
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

    public function cancha($cod_complex = null) {
        if (is_null($cod_complex)) {
            die('Parametros invalidos.');
        }
        if (is_numeric($cod_complex)) {
            $this->_view->setItems('only', array('jquery.price_format.1.8.min.js_.js', 'z-canchas.js'));
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
        } else {
            die('Acceso denegado.');
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

    public function updatecomplex() {
        if ($this->_request->isAjax()) {
            $result = array('status' => false, 'message' => "Ha ocurrido un error en el proceso. Por favor vuelva a intentarlo.");
            $complex = DAOFactory::getComplexDAO();
            $name = $this->post('name');
            $address = $this->post('address');
            $phone = $this->post('phone');
            $email = $this->post('email');
            $description = $this->post('description');
            $lat = $this->post('lat');
            $lng = $this->post('lng');
            $code = $this->post('code');
            $dtoComplex = $complex->load($code);
            if (is_object($dtoComplex)) {
                if (!empty($name) && !empty($address) && !empty($phone) && !empty($email) && !empty($description) && is_numeric($lat) && is_numeric($lng)) {
                    if (Util::isEmail($email)) {
                        $dtoComplex->address = $address;
                        $dtoComplex->codcomplex = $code;
                        $dtoComplex->description = $description;
                        $dtoComplex->email = $email;
                        $dtoComplex->lat = $lat;
                        $dtoComplex->lng = $lng;
                        $dtoComplex->name = $name;
                        $dtoComplex->phone = $phone;
                        $complex->update($dtoComplex);
                        $result['status'] = true;
                        $result['message'] = "Se ha actualizado la información de la cancha correctamente.";
                    } else {
                        $result['message'] = "Debe ingresar una dirección de correo electrónico valido";
                    }
                }
            }
            $this->_view->_print($result);
        }
    }

    public function subcomplex() {
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

    public function addschedule() {
        if ($this->_request->isAjax()) {
            $day = strtolower($this->post('day'));
            $days = array('lunes' => 1, 'martes' => 2, 'miercoles' => 3, 'jueves' => 4, 'viernes' => 5, 'sabado' => 6, 'domingo' => 7, 'festivos' => 8);
            $start = $this->post('start');
            $end = $this->post('end');
            $price = $this->post('price');
            $cod_sub = $this->post('sub');
//            echo "cod : $cod_sub <br />";
            $subComplex = DAOFactory::getSubComplexDAO();
            $dtoSubComplex = $subComplex->load($cod_sub);
            /*
              echo "<pre>";
              @print_r($dtoSubComplex);
              echo "</pre>";

              exit;
             */
              if (in_array($day, array_keys($days)) && !empty($start) && !empty($end) && is_numeric($price) && is_object($dtoSubComplex) && is_numeric($cod_sub)) {
                if ($start != $end) {
                    $hour1 = strtotime($start);
                    $hour2 = strtotime($end);
                    if ($hour1 < $hour2) {
                        $schedule = DAOFactory::getScheduleDAO();
                        if (!$schedule->isScheduleBetweenHours($days[$day], $start, $end, $cod_sub)) {
                            if (!$schedule->schedule_exist($day, $start, $end, $cod_sub)) {
                                if ($price > 0) {
                                    $dtoSchedule = new Schedule();
                                    $dtoSchedule->day = $days[$day];
                                    $dtoSchedule->starthour = $start;
                                    $dtoSchedule->endhour = $end;
                                    $dtoSchedule->price = $price;
                                    $dtoSchedule->codsubcomplex = $cod_sub;
                                    try {
                                        for ($i = (int) $start; $i < (int) $end; $i++) {
                                            $dtoSchedule = new Schedule();
                                            $dtoSchedule->day = $days[$day];
                                            $dtoSchedule->starthour = "$i:00";
                                            $dtoSchedule->endhour = ($i + 1) . ":00";
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
                            $message = "Las horas seleccionadas para el día se cruzan con horarios ya establecidos.";
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

    public function createcomplex() {
        if ($this->_request->isAjax()) {
            $result = array('status' => false, 'message' => "Ha ocurrido un error en el proceso. Por favor vuelva a intentarlo.");
            $complex = DAOFactory::getComplexDAO();
            $name = $this->post('name');
            $address = $this->post('address');
            $phone = $this->post('phone');
            $email = $this->post('email');
            $description = $this->post('description');
            $lat = $this->post('lat');
            $lng = $this->post('lng');

            if (!empty($name) && !empty($address) && !empty($phone) && !empty($email) && !empty($description) && is_numeric($lat) && is_numeric($lng) && $this->user->complex) {
                if (Util::isEmail($email)) {
                    $dtoComplex = new Complex();
                    $dtoComplex->address = $address;
                    $dtoComplex->description = $description;
                    $dtoComplex->email = $email;
                    $dtoComplex->lat = $lat;
                    $dtoComplex->lng = $lng;
                    $dtoComplex->name = $name;
                    $dtoComplex->phone = $phone;
                    $id = $complex->insert($dtoComplex);
                    if (is_numeric($id)) {
                        $result['status'] = true;
                        $result['message'] = "Se ha creado la cancha correctamente.";
                        $result['url'] = BASE_URL . "/administrador-canchas/index/editar-cancha/$id";
                    }
                } else {
                    $result['message'] = "Debe ingresar una dirección de correo electrónico valido";
                }
            }

            $this->_view->_print($result);
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

    public function reservaDia() {

        $ano = $this->post('ano');
        $mes = $this->post('mes') + 1;
        $dia = $this->post('dia');
        // $complejo = $this->post('complejo');

        $cancha = $this->post('cancha');
        $semana = date('w', strtotime($ano . "-" . $mes . "-" . $dia));

        /* $response1 = DAOFactory::getScheduleDAO()->getSchedulesByTime(1, $cancha, $semana);
        $response2 = DAOFactory::getScheduleDAO()->getSchedulesByTime(2, $cancha, $semana); */

        $response = DAOFactory::getScheduleDAO()->getScheduleByDay(date("Y-m-d", strtotime("$ano-$mes-$dia")), $semana, $cancha);

        // $response = array_merge((array) $response1, (array) $response2);

        $week = array(
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miércoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'SÃ¡bado',
            7 => 'Domingo',
            8 => 'Festivo'
            );

        $array = array();
        //$hours = $this->horas();


        if ($response) {
            /* foreach ($hours as $key => $value) {
              foreach ($response as $key2 => $value2) {
              if ($key >= $value2->start->format('H-i-s') && $key <= $value2->end->format('H-i-s')) {
              $hours->$key = array(
              "code" => $value2->codreserve,
              "price" => $value2->amount,
              "start" => $value2->start->format('H-i-s'),
              "end" => $value2->end->format('H-i-s')
              );
              }
              }
          } */
          foreach ($response as $key => $value) {

            $array[] = array(
                "code" => $value->codschedule,
                "reserve" => $value->codreserve,
                "price" => number_format($value->price),
                "week" => $week[$value->day],
                "start" => $value->starthour->format('H-i'),
                "end" => $value->endhour->format('H-i'),
                "status" => $value->status
                );
                /* $response->$key = array(
                  "code" => $value->codreserve,
                  "price" => $value->amount,
                  "start" => $value->start->format('H-i-s'),
                  "end" => $value->end->format('H-i-s')
                  ); */
}
}

echo json_encode($array, true);
}

public function hacerReserva() {

    $dto = new Reserve();
    $schedule = DAOFactory::getScheduleDAO()->load($this->post('code'));
    $sub = DAOFactory::getSubComplexDAO()->load($this->post('cancha'));
    $user = DAOFactory::getUsersDAO()->load($this->post('user'));

    if (!is_null($schedule->codschedule) && !is_null($sub->codcomplex) && !is_null($user->coduser)) {
        if ($this->user->codcomplex == $sub->codcomplex) {

            $year = $this->post('ano');
            $month = $this->post('mes');
            $day = $this->post('dia');

            if (!empty($year) && !empty($month) && !empty($day)) {


                $abone = $this->post('abone') | 0.0;
                $price = $schedule->price;


                if ($abone <= $price) {
                    $dto->codsubcomplex = $this->post('cancha');
                    $dto->start = "{$year}-{$month}-{$day}  " . $schedule->starthour->format('H:i');
                    $dto->end = "{$year}-{$month}-{$day}  " . $schedule->endhour->format('H:i');
                    $dto->amount = $schedule->price;
                    $dto->deposit = $price;
                    $dto->canal = 2;
                    $dto->coduser = $this->post('user');
                    $dto->codschedule = $schedule->codschedule;

                    if (is_numeric(DAOFactory::getReserveDAO()->insert($dto))) {
                        $this->endProcess("Reserva Realizada!", true);
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

                /* echo "<pre>";
                  @print_r($reserve);
                  echo "</pre>"; */

                  $html = $this->_view->renderizar();
                  $this->_view->_print(array('html' => $html, 'status' => true));
              } else {
                $this->_view->_print(array('status' => false));
            }
        }
    }

}
