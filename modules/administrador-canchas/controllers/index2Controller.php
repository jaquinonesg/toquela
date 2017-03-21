<?php

class indexController extends Controller {

    private $user;

    public function __construct() {
        parent::__construct();
        $this->_view->setLayout('canchas');

        $this->user = $this->_sesion->__get('admintoquela');

        if (!is_object($this->user)) {
            $this->redireccionar('/administrador-canchas/login');
        }

        $days = array(1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo', 8 => 'Festivo');
        $this->_view->assign('days', $days);

        /* echo "<pre>";
          @print_r($this->user);
          echo "</pre>";
          exit; */
    }

    public function index() {

        if ($this->user->isindex) {

            $this->_view->setItems('only', array('index.js'));
            $reserve = DAOFactory::getReserveDAO();

            $date = date('Y-m-d');

            $canal1 = $reserve->porcentajeByCanal(1, $this->user->codcomplex, $date, date("Y-m-d", strtotime("$date +1 week")));
            $canal2 = $reserve->porcentajeByCanal(2, $this->user->codcomplex, $date, date("Y-m-d", strtotime("$date +1 week")));


            $dtoComplex = DAOFactory::getComplexDAO()->load($this->user->codcomplex);
            $this->_view->assign('dtoComplex', $dtoComplex);

            $this->_view->assign('canal1', $canal1);
            $this->_view->assign('canal2', $canal2);

            $this->_view->renderizar('inicio');
        } else {
            die('Acceso no permitido para el usuario.');
        }
    }

    public function agenda() {
        if ($this->user->isdiary) {
            $this->_view->renderizar(__FUNCTION__);
        } else {
            die('Acceso no permitido para el usuario.');
        }
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
        if ($this->user->iscomplex && $this->user->codcomplex == $cod_complex) {

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
            if (is_object($dtoComplex) && $this->user->iscomplex) {
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

                if (is_object($dtoSub) && $this->user->iscomplex) {
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


            if (in_array($day, array_keys($days)) && !empty($start) && !empty($end) && is_numeric($price) && is_object($dtoSubComplex) && $this->user->iscomplex) {
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
                                        $id = $schedule->insert($dtoSchedule);
                                        if (is_numeric($id)) {
                                            $message = "Se ha asigando correctamente el horario.";
                                            $this->endProcess($message, true);
                                        }
                                    } catch (Exception $exc) {
                                        
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

            if (is_object($dtoSchedule) && $this->user->iscomplex) {
                try {
                    $schedule->delete($code);
                    $message = "Se ha eliminado el horario.";
                    $this->endProcess($message, true);
                } catch (Exception $exc) {
                    
                }
            } else {
                $message = "Ha ocurrido un error eliminando el horario, por favor vuelva a intentarlo.";
                $this->endProcess($message);
            }
        }
    }

    private function endProcess($message, $status = false) {
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

            if ($this->user->iscomplex && $this->user->codcomplex == $code) {
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
                if ($this->user->iscomplex && $this->user->codcomplex == $dtoSub->codcomplex) {
                    $dtoSub->name = $name;
                    try {
                        DAOFactory::getSubComplexDAO()->update($dtoSub);
                        $message = "Se ha actualizado la información de la cancha.";
                        $this->endProcess($message, true);
                    } catch (Exception $exc) {
                        $message = "Ha ocurrido un error actualizando la cancha, por favor vuelva a intentarlo.";
                        $this->endProcess($message);
                    }
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
                if ($this->user->iscomplex && $this->user->codcomplex == $dtoSub->codcomplex) {
                    try {
                        DAOFactory::getSubComplexDAO()->delete($cod_sub);
                        $message = "Se ha eliminado la cancha.";
                        $this->endProcess($message, true);
                    } catch (Exception $exc) {
                        $message = "Ha ocurrido un error eliminando la cancha, por favor vuelva a intentarlo.";
                        $this->endProcess($message);
                    }
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

}
