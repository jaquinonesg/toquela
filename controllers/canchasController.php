<?php

class CanchasController extends Controller {

    private $_complejo;
    private $_cancha;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
        $this->_complejo = $this->get('complejo');
        $this->_cancha = $this->get('cancha');
    }

    public function index() {
        $this->_view->setTitle("Mis Canchas");
        $this->_view->setItems('only', array('listar_canchas.js'));
        $total_complex = DAOFactory::getComplexDAO()->getComplexBuscador("", null, null, true);
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $pj = new PaginatorJorge("pagina_canchas", $total_complex, 6, 1);
        $complex = DAOFactory::getComplexDAO()->getComplexBuscador("", $pj->inicio_limit, $pj->fin_limit);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/canchas/");
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('complex', $complex);
        $this->_view->renderizar();
    }

    public function search_canchas() {
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $strcancha = $this->post("strcancha");
        $pagina = $this->post("pag");
        if ($pagina < 1) {
            $pagina = 1;
        }
        $this->_view->setLayout("empty");
        $this->_view->assign("template", "listar_canchas");
        $this->_view->assign("is_buscador_canchas", false);
        $this->_view->assign("is_paginator", true);
        $this->_view->assign("init_js_paginator", false);
        $this->_view->setOutput(false);

        $total_complex = DAOFactory::getComplexDAO()->getComplexBuscador($strcancha, null, null, true);

        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $pj = new PaginatorJorge("pagina_canchas", $total_complex, 6, $pagina);
        $complex = DAOFactory::getComplexDAO()->getComplexBuscador($strcancha, $pj->inicio_limit, $pj->fin_limit);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/torneo/");
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('complex', $complex);
        $data["html"] = $this->_view->renderizar();
        if (isset($data["html"])) {
            $data["message"] = "Operación realizada con éxito.";
            $data["status"] = true;
        }
        $this->_view->_print($data);
    }

    public function publico($complejo = null) {
        if (is_numeric($complejo)) {
            $dtoComplex = DAOFactory::getComplexDAO()->load($complejo);
            if (isset($dtoComplex)) {
                $this->_view->setItems('only', array('publico.js'));
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

    public function loadsubcomplex() {
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

    public function miscanchas() {
        $user = $this->_sesion->user;
        $cod_user = $user->coduser;
        $favorites = DAOFactory::getComplexDAO()->getFavoritesComplex($cod_user);
        $this->_view->assign('_favorites', $favorites);
        //$this->_view->renderizar("listar_canchas");
        $this->_view->renderizar(__FUNCTION__);
    }

    // Carga incial con Mes actual

    public function disponibilidad() {
        $subComplex = DAOFactory::getSubComplexDAO();
        $subs = $subComplex->queryByCodComplex($this->_complejo);
        $this->_view->assign('_subs', $subs);
        $cod_user = $this->_sesion->user->coduser;
        $califica = false;
        $muestra_califica = false;
        if ($this->_complejo) {
            $this->_cancha = $subs[0]->codsubcomplex;
            $complejo = DAOFactory::getComplexDAO()->load($this->_complejo);
            $attachment = DAOFactory::getComplexDAO()->getAttachments($this->_complejo);
            $desde = date("Y") . "-" . date("m") . "-" . 01;
            $hasta = date("Y") . "-" . date("m") . "-" . cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));
            $mes = $this->reservaMesDias($desde, $hasta);

            $com = DAOFactory::getComplexHasQualificationDAO()->comprobarCalificaUsuario($cod_user);
            if (is_null($com)) {
                $califica = true;
            }
            if ($complejo->ifqualification) {
                $muestra_califica = true;
            }
            $arr_qualifications = DAOFactory::getQualificationDAO()->getPromedioByComplex($this->_complejo);
            $this->_view->assign("_muestra_califica", $muestra_califica);
            $this->_view->assign("_califica", $califica);
            $this->_view->assign("_qualifications", $arr_qualifications);
            $this->_view->assign("_complejo", $complejo);
            $this->_view->assign("_imagenes", $attachment);
            $this->_view->assign("_mes", $mes);
            $this->_view->renderizar(__FUNCTION__);
        }
    }

    public function setCalificacion() {
        if (isset($_POST['num_expe']) && isset($_POST['num_inst'])) {
            $cod_user = $this->_sesion->user->coduser;
            for ($a = 0; $a < $_POST['num_expe']; $a++) {
                $pieces1 = explode(",", $_POST['expe_hid_' . $a]);
                $obj = new ComplexHasQualification();
                $obj->codcomplex = $_POST['complex'];
                $obj->codqualification = $pieces1[0];
                $obj->coduser = $cod_user;
                $obj->qualification = $pieces1[1];
                DAOFactory::getComplexHasQualificationDAO()->insert($obj);
            }
            for ($b = 0; $b < $_POST['num_inst']; $b++) {
                $pieces2 = explode(",", $_POST['inst_hid_' . $b]);
                $obj = new ComplexHasQualification();
                $obj->codcomplex = $_POST['complex'];
                $obj->codqualification = $pieces2[0];
                $obj->coduser = $cod_user;
                $obj->qualification = $pieces2[1];
                DAOFactory::getComplexHasQualificationDAO()->insert($obj);
            }

            //http://localhost/toquela/canchas/disponibilidad?complejo=1
//            header ("Location: http://www.cristalab.com");
            header("Location: " . SITE . "/canchas/disponibilidad?complejo=" . $_POST['complex']);
        }
    }

    public function agenda() {
        $this->_view->renderizar(__FUNCTION__);
    }

    public function info() {
        $this->_view->renderizar(__FUNCTION__);
    }

    // Reservar DIA por formulario

    public function hacerReserva() {

        $dto = new Reserve();
        $sub = DAOFactory::getScheduleDAO()->load($this->post('code'));
        $dto->codsubcomplex = $this->post('cancha');
        $dto->start = "{$this->post('ano')}-{$this->post('mes')}-{$this->post('dia')}  " . $sub->starthour->format('H:i');
        $dto->end = "{$this->post('ano')}-{$this->post('mes')}-{$this->post('dia')}  " . $sub->endhour->format('H:i');
        $dto->amount = $sub->price;
        $dto->deposit = 0;
        /* $dto->date = $date; */
        $dto->canal = 1;
        $dto->coduser = $this->_sesion->user->coduser;
        $dto->codschedule = $sub->codschedule;
        $status = new Schedule();
        $status->codschedule = $this->post('code');
        $status->status = 1;
        //DAOFactory::getScheduleDAO()->update($status);
        if (is_numeric(DAOFactory::getReserveDAO()->insert($dto))) {
            echo true;
        } else {
            echo false;
        }
    }

// traer DIA AJAX

    public function reservaDia() {

        $ano = $this->post('ano');
        $mes = $this->post('mes') + 1;
        $dia = $this->post('dia');
        $complejo = $this->post('complejo');
        $cancha = $this->post('cancha');

        $semana = date('w', strtotime($ano . "-" . $mes . "-" . $dia));
        $response = DAOFactory::getScheduleDAO()->getScheduleByDay(date("Y-m-d", strtotime("$ano-$mes-$dia")), $semana, $cancha);

        $week = array(
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miércoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sábado',
            7 => 'Domingo',
            8 => 'Festivo'
        );

        $array = array();
        if ($response) {

            foreach ($response as $key => $value) {

                $array[] = array(
                    "code" => $value->codschedule,
                    "price" => number_format($value->price),
                    "week" => $week[$value->day],
                    "start" => $value->starthour->format('H-i'),
                    "end" => $value->endhour->format('H-i'),
                    "status" => $value->status
                );
            }
        }

        echo json_encode($array, true);
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

//Traer Días con reservas

    public function reservaMesDias($desde, $hasta, $ajax = false) {


        if ($ajax) {
            $cancha = $this->post('cancha');
        } else {
            $cancha = $this->_cancha;
        }
        if ($cancha) {

            $limit = $this->getLimit($cancha);

            /* echo "<pre style='border:1px solid red;'>";
              @print_r($limit);
              echo "</pre>"; */
            $response = DAOFactory::getReserveDAO()->getMonth($desde, $hasta, $cancha);
            if ($response) {

                $dias = array();

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
                        $dias[$key]['status'] = 'green'; // Todo el día Ocupado
                    } elseif ($status > 0) {
                        $dias[$key]['status'] = 'orange'; // Hay Cupos Disponibles
                    } elseif ($status <= 0) {
                        $dias[$key]['status'] = 'gray'; // Todo el Día Ocupado
                    }
                    $dias[$key]['hours_free'] = $status < 0 ? 0 : $status;
                }
                //return $dias;
                return json_encode($dias, true);
            } else {
                return json_encode(array('limit' => $limit));
            }
        }
    }

    // Traer limites por semana

    public function getLimit($cod_sub) {
        $schedules = DAOFactory::getScheduleDAO()->getScheduleByComplexOrderByDay($cod_sub);
        $limit = array();
        if ($schedules) {
            foreach ($schedules as $value) {
                $start = (float) $value->starthour->format('H') + $value->starthour->format('i') / 60;
                $end = (float) $value->endhour->format('H') + $value->endhour->format('i') / 60;

                $limit[$value->day] += ($end - $start);
            }
        }
        return $limit;
    }

}

?>
