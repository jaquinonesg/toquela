<?php

/**
 * Description of clasificacionController
 *
 * @author Jhon
 */
class ClasificacionController extends Controller {

    public function __construct() {
        parent::__construct();
        // $this->validacionSession();
        $this->_user = $this->_sesion->user;
    }

    public function index() {
        $cod_tournament = $this->get('torn');

        $filter = new stdClass();
        $filter->torn = $cod_tournament;
        $filter->fase = "";
        $filter->grupo = "";
        $filter->jornada = "";
        $filter->fechaA = "";
        $filter->fechaB = "";
        $filter->strfilter = "";
        $filter->typefilter = "";
        $filter->pestana = "";

        $obj_get = (object) $this->get();

        $filter = Util::mergeObject($filter, $obj_get);

        if (!empty($filter->torn) && is_numeric($filter->torn)) {
            $tournament = DAOFactory::getTournamentDAO()->load($filter->torn);
            $tipos_filtros = $this->getTiposFiltrosTorneos();
            $this->_view->assign('tipos_filtros', $tipos_filtros);
            $this->_view->assign('filter', $filter);
            $this->_view->assign('public', false);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $this->_view->assign('tournament', $tournament);
                $num_teams = DAOFactory::getTournamentHasTeamDAO()->countTeamsByTournament($filter->torn);
                $error_number = 0;
                if ($tournament->numberparticipants > $num_teams) {
                    $error_number = 1;
                } else {
                    $dao_match = DAOFactory::getMatchDAO();
                    switch ($tournament->type) {
                        case self::TYPE_1:
                        $this->_view->assign('type', 1);
                        require_once dirname(__FILE__) . '/GenerateTablero.php';
                        $gt = new GenerateTablero();
                        $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                        $matches = $dao_match->queryByCodTournament($cod_tournament);
                        if (is_array($teams)) {
                            if (is_array($matches) && count($matches) > 0) {
                                $this->_view->assign('tablero_torneo', $gt->generate_tablero($teams, $cod_tournament, false, $matches));
                            } else {
                                $this->_view->assign('tablero_torneo', $gt->generate_tablero($teams, $cod_tournament, true));
                            }
                        } else {
                            $this->_view->assign('error_number', 1);
                        }
                        $this->_view->setTitle("Resultados Torneo");
                        $this->_view->setItems("only", array('clasificacion.css'));
                        $this->_view->assign('menu_item', 1);
                        break;
                        case self::TYPE_2:
                        $this->_view->assign('type', 2);
                        $rows = DAOFactory::getTournamentDAO()->getClasificationByTournament($cod_tournament);
                        $this->_view->assign('teams', $rows);

                        $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                        $matches = $dao_match->getFormatCalendarByTournament($cod_tournament, 2);
                        require_once dirname(__FILE__) . '/GenerateTablero.php';
                        $gt = new GenerateTablero();
                        $previa_eliminacion = $gt->generate_params((count($matches) + 1), $teams, $cod_tournament, 0, true, $matches, false);
                        $this->_view->assign('previa_eliminacion', $previa_eliminacion);

                        $this->_view->setTitle("Resultados Torneo");
                        $this->_view->setItems("only", array('clasificacion.css'));
                        $this->_view->assign('menu_item', 1);
                        break;
                        case self::TYPE_3:
                        $this->_view->assign('type', 3);
                        $rows = DAOFactory::getTournamentDAO()->getClasificationByTournament($cod_tournament);
                        $this->_view->assign('teams', $rows);
                        $this->_view->setTitle("Resultados Torneo");
                        $this->_view->setItems("only", array('clasificacion.css'));
                        $this->_view->assign('menu_item', 1);
                        break;
                        case self::TYPE_4:
                        $this->_view->assign('type', 4);
                        $num_fases = $dao_match->getNumFases($filter->torn);
                        $arrfases = $dao_match->getFasesByTournament($filter->torn, $filter->fase);

                        $filter_grupos = $dao_match->getGruposByTournament($filter->torn);
                        $filter_jornadas = $dao_match->getJornadasByTournament($filter->torn);
                        $this->_view->assign('filter_fases', $arrfases);
                        $this->_view->assign('filter_grupos', $filter_grupos);
                        $this->_view->assign('filter_jornadas', $filter_jornadas);
                        $this->_view->assign('num_fases', $num_fases);
                        $fases = array();
                        if ($num_fases > 0) {
                            foreach ($arrfases as $fase) {
                                if ($fase->type == 1) {
                                    $aux_fase = new stdClass();
                                    $aux_fase->type = $fase->type;
                                    $aux_fase->name = "Fase $fase->num de grupos";
                                    $aux_fase->number = $fase->num;
                                    $aux_fase->matches = $dao_match->getFormatCalendarByTournamentFilter($filter->torn, $fase->num, $filter->grupo, $filter->jornada, $filter->fechaA, $filter->fechaB, $filter->strfilter, $filter->typefilter);
                                    $aux_fase->html = "";
                                    array_push($fases, $aux_fase);
                                } else if ($fase->type == 2) {
                                    $aux_fase = new stdClass();
                                    $aux_fase->type = $fase->type;
                                    $aux_fase->name = "Fase $fase->num de eliminación";
                                    $aux_fase->number = $fase->num;
                                    $aux_fase->matches = $dao_match->getFormatCalendarByTournamentFilter($filter->torn, $fase->num, $filter->grupo, $filter->jornada, $filter->fechaA, $filter->fechaB, $filter->strfilter, $filter->typefilter);
                                    $num_rounds = $dao_match->getNumRoundsByTournament($filter->torn, $fase->num);
                                    $aux_fase->arr_enun = $this->getArrEnunciadosEliminacionDirecta($num_rounds);
                                    $aux_fase->html = "";
                                        //$aux_fase->html = $gt->generate_params(8, $teams, $filter->torn);
                                    array_push($fases, $aux_fase);
                                }
                            }
                        }
                        $this->_view->assign('fases', array_reverse($fases, true));
                    }
                }
                $urlencode = new EncodeURL();
                // esto es para ver el detalle del partido cuando le de click enzima
                $this->_view->assign('verDetalle',true);
                // close detalle partido
                $this->_view->assign('urlencode', $urlencode);
                $this->_view->setTitle("Resultados Torneo");
                $this->_view->assign('error_number', $error_number);
                $user = $this->_sesion->user;
                $this->_view->assign('user', $user);
                $this->_view->renderizar();
            }
        }
    }

    private function getArrEnunciadosEliminacionDirecta($num_rounds) {
        if ($num_rounds > 4) {
            $cont_init = ($num_rounds - 4);
            $arr[++$cont_init] = "Octavos";
            $arr[++$cont_init] = "Cuartos";
            $arr[++$cont_init] = "Seminifinal";
            $arr[++$cont_init] = "Final";
            return $arr;
        }
        if ($num_rounds == 4) {
            $arr[1] = "Octavos";
            $arr[2] = "Cuartos";
            $arr[3] = "Seminifinal";
            $arr[4] = "Final";
            return $arr;
        }
        if ($num_rounds == 3) {
            $arr[1] = "Cuartos";
            $arr[2] = "Seminifinal";
            $arr[3] = "Final";
            return $arr;
        }
        if ($num_rounds == 2) {
            $arr[1] = "Seminifinal";
            $arr[2] = "Final";
            return $arr;
        }
        return null;
    }

    public function resultados_public() {
        $status = false;
        $message = "No se cargaron los datos correctamente.";
        $html = "";
        $cod_tournament = $this->get('torn');

        $filter = new stdClass();
        $filter->torn = $cod_tournament;
        $filter->fase = "";
        $filter->grupo = "";
        $filter->jornada = "";
        $filter->fechaA = "";
        $filter->fechaB = "";
        $filter->strfilter = "";
        $filter->typefilter = "";
        $filter->pestana = "";

        $obj_get = (object) $this->get();

        $filter = Util::mergeObject($filter, $obj_get);
        if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
            $group = $this->post('grupo');
            $tournament = DAOFactory::getTournamentDAO()->load($filter->torn);
            $tipos_filtros = $this->getTiposFiltrosTorneos();
            $this->_view->assign('tipos_filtros', $tipos_filtros);
            $this->_view->assign('filter', $filter);
            $this->_view->assign('tournament', $tournament);
            $this->_view->assign('public', true);
            $num_teams = DAOFactory::getTournamentHasTeamDAO()->countTeamsByTournament($filter->torn);
            $error_number = 0;
            $status = false;
            if ($tournament->numberparticipants > $num_teams) {
                $error_number = 1;
            } else {
                $dao_match = DAOFactory::getMatchDAO();
                switch ($tournament->type) {
                    case self::TYPE_1:
                    $this->_view->assign('type', 1);
                    require_once dirname(__FILE__) . '/GenerateTablero.php';
                    $gt = new GenerateTablero();
                    $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                    $matches = DAOFactory::getMatchDAO()->queryByCodTournament($cod_tournament);
                    if (is_array($teams)) {
                        if (is_array($matches) && count($matches) > 0) {
                            $this->_view->assign('tablero_torneo', $gt->generate_tablero($teams, $cod_tournament, false, $matches));
                        } else {
                            $this->_view->assign('tablero_torneo', $gt->generate_tablero($teams, $cod_tournament, true));
                        }
                    } else {
                        $this->_view->assign('error_number', 1);
                    }
                    $this->_view->setItems("only", array('clasificacion.css'));
                    $status = true;
                    $message = "Operación realizada con éxito.";
                    break;
                    case self::TYPE_2:
                    $onlygroup = $this->post('onlygroup');
                    $this->_view->assign('type', 2);
                    $clasifi = null;
                    if (isset($group) && is_numeric($group)) {
                        $clasifi = DAOFactory::getTournamentDAO()->getResultsByTournamentAndGroup($cod_tournament, $group);
                    } else {
                        $clasifi = DAOFactory::getTournamentDAO()->getClasificationByTournament($cod_tournament);
                    }
                    $this->_view->assign('teams', $clasifi);
                    if ($onlygroup == 1) {
                        $this->_view->assign('previa_eliminacion', "");
                    } else {
                        $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                        $matches = DAOFactory::getMatchDAO()->getFormatCalendarByTournament($cod_tournament, 2);
                        require_once dirname(__FILE__) . '/GenerateTablero.php';
                        $gt = new GenerateTablero();
                        $previa_eliminacion = $gt->generate_params((count($matches) + 1), $teams, $cod_tournament, 0, true, $matches, false);
                        $this->_view->assign('previa_eliminacion', $previa_eliminacion);
                    }
                    $this->_view->setItems("only", array('clasificacion.css'));
                    $status = true;
                    $message = "Operación realizada con éxito.";
                    break;
                    case self::TYPE_3:
                    $this->_view->assign('type', 3);
                    $teams = DAOFactory::getTournamentDAO()->getClasificationByTournament($cod_tournament);
                    $this->_view->assign('teams', $teams);
                    $this->_view->setItems("only", array('clasificacion.css'));
                    $status = true;
                    $message = "Operación realizada con éxito.";
                    break;
                    case self::TYPE_4:

                    $this->_view->assign('type', 4);
                    $num_fases = $dao_match->getNumFases($filter->torn);
                    $arrfases = $dao_match->getFasesByTournament($filter->torn, $filter->fase);
                    $filter_grupos = $dao_match->getGruposByTournament($filter->torn);
                    $filter_jornadas = $dao_match->getJornadasByTournament($filter->torn);
                    $this->_view->assign('filter_fases', $arrfases);
                    $this->_view->assign('filter_grupos', $filter_grupos);
                    $this->_view->assign('filter_jornadas', $filter_jornadas);
                    $this->_view->assign('num_fases', $num_fases);
                    $fases = array();
                    if ($num_fases > 0) {
                        foreach ($arrfases as $fase) {
                            if ($fase->type == 1) {
                                $aux_fase = new stdClass();
                                $aux_fase->type = $fase->type;
                                $aux_fase->name = "Fase $fase->num de grupos";
                                $aux_fase->number = $fase->num;
                                $aux_fase->matches = $dao_match->getFormatCalendarByTournamentFilter($filter->torn, $fase->num, $filter->grupo, $filter->jornada, $filter->fechaA, $filter->fechaB, $filter->strfilter, $filter->typefilter);
                                $aux_fase->html = "";
                                array_push($fases, $aux_fase);
                            } else if ($fase->type == 2) {
                                $aux_fase = new stdClass();
                                $aux_fase->type = $fase->type;
                                $aux_fase->name = "Fase $fase->num de eliminación";
                                $aux_fase->number = $fase->num;
                                $aux_fase->matches = $dao_match->getFormatCalendarByTournamentFilter($filter->torn, $fase->num, $filter->grupo, $filter->jornada, $filter->fechaA, $filter->fechaB, $filter->strfilter, $filter->typefilter);
                                $num_rounds = $dao_match->getNumRoundsByTournament($filter->torn, $fase->num);
                                $aux_fase->arr_enun = $this->getArrEnunciadosEliminacionDirecta($num_rounds);
                                $aux_fase->html = "";
                                    //$aux_fase->html = $gt->generate_params(8, $teams, $filter->torn);
                                array_push($fases, $aux_fase);
                            }
                        }
                        $this->_view->assign('fases', array_reverse($fases, true));
                        $status = true;
                        $message = "Operación realizada con éxito.";
                    }
                    break;
                }
                $urlencode = new EncodeURL();
                $this->_view->assign('urlencode', $urlencode);
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                // esto es para ver el detalle del partido cuando le de click enzima
                $this->_view->assign('verDetalle',true);
                // close detalle partido
                $this->_view->assign('error_number', $error_number);
                if ($status) {
                    $html = $this->_view->renderizar("resultados_public");
                }
            }
        }
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }

    public function resultados_public_round($cod_tournament = null, $round = null) {
        $status = false;
        $message = "No se cargaron los datos correctamente.";
        $html = "";
        if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
            $group = $this->post('grupo');
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            $this->_view->assign('tournament', $tournament);
            if (is_numeric($tournament->codtournament)) {
                switch ($tournament->type) {
                    case self::TYPE_1:
                    $this->_view->assign('type', 1);
                    require_once dirname(__FILE__) . '/GenerateTablero.php';
                    $gt = new GenerateTablero();
                    $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                    $matches = DAOFactory::getMatchDAO()->queryByCodTournament($cod_tournament);
                    if (is_array($teams)) {
                        if (is_array($matches) && count($matches) > 0) {
                            $this->_view->assign('tablero_torneo', $gt->generate_tablero($teams, $cod_tournament, false, $matches));
                        } else {
                            $this->_view->assign('tablero_torneo', $gt->generate_tablero($teams, $cod_tournament, true));
                        }
                    } else {
                        $this->_view->assign('error_number', 1);
                    }
                    $this->_view->setItems("only", array('clasificacion.css'));
                    $status = true;
                    $message = "Operación realizada con éxito.";
                    break;
                    case self::TYPE_2:
                    $this->_view->assign('type', 2);
                    if (($round != null) && is_numeric($round)) {
                        $teams = DAOFactory::getTournamentDAO()->getResultsByTournamentAndRound($cod_tournament, $round, true);
                        $this->_view->assign('teams', $teams);
                        $this->_view->setItems("only", array('clasificacion.css'));
                        $status = true;
                        $message = "Operación realizada con éxito.";
                    }
                    break;
                    case self::TYPE_3:
                    $this->_view->assign('type', 3);
                    if (($round != null) && is_numeric($round)) {
                        $teams = DAOFactory::getTournamentDAO()->getResultsByTournamentAndRound($cod_tournament, $round);
                        $this->_view->assign('teams', $teams);
                        $this->_view->setItems("only", array('clasificacion.css'));
                        $status = true;
                        $message = "Operación realizada con éxito.";
                    }
                    break;
                    case self::TYPE_4:
                    $this->_view->assign('type', 4);
                    $teams = null;
                    if (($group != null) && is_numeric($group) && ($round != null) && is_numeric($round)) {
                        $teams = DAOFactory::getTournamentDAO()->getResultsByTournamentAndRoundAndGroup($cod_tournament, $round, $group, true);
                    } elseif (($group != null) && is_numeric($group)) {
                        $teams = DAOFactory::getTournamentDAO()->getResultsByTournamentAndGroupForFase($cod_tournament, $group);
                    } else {
                        $teams = DAOFactory::getTournamentDAO()->getResultsByTournamentAndRound($cod_tournament, $round, true);
                    }
                    $this->_view->assign('teams', $teams);
                    $this->_view->setItems("only", array('clasificacion.css'));
                    $status = true;
                    $message = "Operación realizada con éxito.";
                    break;
                }
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                if ($status) {
                    $html = $this->_view->renderizar("resultados_public_round");
                }
            }
        }
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }

    /**
     * [orderMultiDimensionalArray Con esta sencilla función conseguiremos
     *  ordenar cualquier array multidimensional por el campo del array que queramos. 
     *  Podremos indicarle si queremos que nos lo ordene de manera ascendente o descendente.]
     * @param  [type]  $toOrderArray [Array A ordenar]
     * @param  [type]  $field        [Campo del array por el cual queremos ordenar]
     * @param  boolean $inverse      [true = descendente , false = Ordena de Manera Ascendente]
     * @return [type]                [description]
     */
    private function orderMultiDimensionalArray($toOrderArray, $field, $inverse = false) {
        $position = array();
        $newRow = array();
        foreach ($toOrderArray as $key => $row) {
            $position[$key] = $row[$field];
            $newRow[$key] = $row;
        }
        if ($inverse) {
            arsort($position);
        } else {
            asort($position);
        }
        $returnArray = array();
        foreach ($position as $key => $pos) {
            $returnArray[] = $newRow[$key];
        }
        return $returnArray;
    }
    
    /**
     * recibe una peticion por AJAX y devuelve en formato JSON el contenido web 
     * con estadisticas, goleadores, penalizaciones y vala menos vencida.
     * 
     * @param  int $cod_tournament  codigo del torneo asociado
     * @param  [type] $round          [description]
     * @return JSON                 html:       contenido html con el resultado.
     *                              status:     estado de respuesta true, false.
     *                              message:    mensaje de error o success.
     */
    
    public function more_results_round($cod_tournament = null, $round = null) {
        $status = false;
        $message = "No se cargaron los datos correctamente.";
        $html = "";
        $goleadores = DAOFactory::getTournamentDAO()->getgoleadores($cod_tournament);

        $tarjetas = DAOFactory::getTournamentDAO()->gettarjetas($cod_tournament);
        $tarjetas_partidos_roja_amarilla = DAOFactory::getTournamentDAO()->getTarjetasPartidosRojaAmarilla($cod_tournament);
        $tarjetas_sancion = DAOFactory::getTournamentDAO()->gettarjetassancion($cod_tournament);
        $tarjetas_partidos_sancion = DAOFactory::getTournamentDAO()->getTarjetasPartidosSancion($cod_tournament);
        
        $golesvisitante = DAOFactory::getTournamentDAO()->getgolesvisitante($cod_tournament);
        $goleslocal = DAOFactory::getTournamentDAO()->getgoleslocal($cod_tournament); //goles que un equipo recibe cuando este de visitante
        $array_tmp = array();

        // Agrega los partidos a cada tarjeta
        $partidos_esta_tarjeta = array();
        for ($i=0; $i < count($tarjetas) ; $i++) { 
            for ($e=0; $e < count($tarjetas_partidos_roja_amarilla) ; $e++) { 
                if($tarjetas[$i]->Coduser == $tarjetas_partidos_roja_amarilla[$e]->Coduser){
                    array_push($partidos_esta_tarjeta, $tarjetas_partidos_roja_amarilla[$e]);
                }
            }
            $tarjetas[$i]->partidos = $partidos_esta_tarjeta;
            $partidos_esta_tarjeta = array();
        }
       
        //---------- Termina de agregar los partidos a cada tarjeta
        
        // Agrega los partidos a cada sanción
        $partidos_esta_sancion = array();
        for ($i=0; $i < count($tarjetas_sancion) ; $i++) { 
            for ($e=0; $e < count($tarjetas_partidos_sancion) ; $e++) { 
                if($tarjetas_sancion[$i]->Coduser == $tarjetas_partidos_sancion[$e]->Coduser){
                    array_push($partidos_esta_sancion, $tarjetas_partidos_sancion[$e]);
                }
            }
            $tarjetas_sancion[$i]->partidos = $partidos_esta_sancion;
            $partidos_esta_sancion = array();
        }
        //---------- Termina de agregar los partidos a cada sanción
        
        if ($golesvisitante && $goleslocal) {
            $goles = array_merge($golesvisitante, $goleslocal);

            foreach ($golesvisitante as $key => $value) {//recorro array para ver si hay indices repetidos y sumar los goles.
                $codteamvisit = $value['cod_team'];
                foreach ($goleslocal as $k => $v) {
                    $codteamlocal = $v['cod_team'];
                    if ($codteamvisit == $codteamlocal) {
                        array_push($array_tmp, array(
                            "name" => $value['name'],
                            "cod_team" => $value['cod_team'],
                            "goles" => $v['goles'] + $value['goles']
                            ));
                    }
                }
            }

            if ($array_tmp) { // Elimino los valores repetidos. 
                foreach ($goles as $key => $value) {
                    $cod = $value['cod_team'];
                    foreach ($array_tmp as $k => $v) {
                        $code = $v['cod_team'];
                        if ($cod == $code) {
                            unset($goles[$key]);
                        }
                    }
                }
                $golestotal = array_merge($array_tmp, $goles);
                $gol = "goles"; //valor por el cual voy a ordenar mi array
                $golestotal = $this->orderMultiDimensionalArray($golestotal, $gol); //ordeno de manera asendente
            } else {
                $gol = "goles"; //valor por el cual voy a ordenar mi array
                $golestotal = $this->orderMultiDimensionalArray($goles, $gol); //ordeno de manera asendente
            }
        }

        $this->_view->assign('vallamenosvencida', $golestotal);
        $this->_view->assign('goleadores', $goleadores);
        $this->_view->assign('tarjetas', $tarjetas);
        $this->_view->assign('sanciones', $tarjetas_sancion);
        $this->_view->setItems("only", array('clasificacion.css'));
        $status = true;
        $message = "Operación realizada con éxito.";

        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);
        if ($status) {
            $html = $this->_view->renderizar("more_results_round");
        }
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }

    public function tablaPosicionesTotal($cod_tournament = null, $fase = null) {
        $filter_grupos = DAOFactory::getMatchDAO()->getGruposByTournament($cod_tournament);
        $grupos = array();
        for ($i = 1; $i <= count($filter_grupos); $i++) {
            $grupo = DAOFactory::getTournamentDAO()->getResultsByTournamentAndRoundAndGroup($cod_tournament, $i, $fase, true);
            if ($grupo != "") {
                $grupos[$i] = $grupo;
            }
        }
        $this->_view->assign('grupos', $grupos);
        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);
        $html = $this->_view->renderizar("posiciones_por_grupos");

        $status = true;
        $message = "Operación realizada con éxito.";
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }
    //Tabla de reclasificacion por fase de todos los equipos del torneo.
    public function tablaPosicionesTotal2($cod_tournament = null, $fase = null) {
        $resultados = DAOFactory::getTournamentDAO()->getResultsByTournamentAndRoundAndGroup($cod_tournament, 1, $fase);
        $this->_view->assign('resultados', $resultados);
        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);
        $html = $this->_view->renderizar("posiciones_por_fase");
        $status = true;
        $message = "Operación realizada con éxito.";
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    } 

    public function detallePartido() {
        $cod_match = $this->post('codmatch');
        $programeichon = $this->post('programado');
        $publico = $this->post('publico');

        $noprogramado = false;
        if($programeichon != ""){
            $noprogramado = true;
        }
        $match = DAOFactory::getMatchDAO()->load_and_location($cod_match);
        $tournament = DAOFactory::getTournamentDAO()->load($match->codtournament);
        $match->tournament = $tournament;

        $team_local = new Team();
        $team_local = DAOFactory::getTeamDAO()->load($match->teamlocal);
        $team_local_info = DAOFactory::getTeamDAO()->getTeamInfo($match->teamlocal);
        $team_local->image = $team_local_info->path;
        $team_local->futboltype = $team_local_info->futboltype;
        $team_local->type = $team_local_info->type;

        $team_visitant = new Team();
        $team_visitant = DAOFactory::getTeamDAO()->load($match->teamvisitant);
        $team_visitant_info = DAOFactory::getTeamDAO()->getTeamInfo($match->teamvisitant);
        $team_visitant->image = $team_visitant_info->path;
        $team_visitant->futboltype = $team_visitant_info->futboltype;
        $team_visitant->type = $team_visitant_info->type;
        
        // quita segundos de la hora -_-
        $quit_seconds  = explode(':', $match->hour);
        unset($quit_seconds[count($quit_seconds)-1]);
        $hora_sin_segundos = implode(':',$quit_seconds);
        $match->hour = $hora_sin_segundos;
        
        // estadisticas
        $statistics_local = DAOFactory::getStatisticsDAO()->getByCodMatchLocal($cod_match);
        $num_statistic_local = count($statistics_local);
        if ($num_statistic_local > 0) {
            foreach ($statistics_local as $stati) {
                $stati->type = DAOFactory::getTypeStatisticDAO()->load($stati->codtypestatistic);
                $stati->player = DAOFactory::getUsersDAO()->getInfoBasic($stati->coduser);
            }
        } else {
            $statistics_local = null;
        }
        $statistics_visitant = DAOFactory::getStatisticsDAO()->getByCodMatchVisitant($cod_match);
        $num_statistic_visitant = count($statistics_visitant);
        if ($num_statistic_visitant > 0) {
            foreach ($statistics_visitant as $stati) {
                $stati->type = DAOFactory::getTypeStatisticDAO()->load($stati->codtypestatistic);
                $stati->player = DAOFactory::getUsersDAO()->getInfoBasic($stati->coduser);
            }
        } else {
            $statistics_visitant = null;
        }
        // close estadisticas
        $urlencode = new EncodeURL();
        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('match', $match);
        $this->_view->assign('statistics_local', $statistics_local);
        $this->_view->assign('statistics_visitant', $statistics_visitant);
        $this->_view->assign('team_local', $team_local);
        $this->_view->assign('team_visitant', $team_visitant);
        $this->_view->assign('noprogramado', $noprogramado);
        if($publico){
            $this->_view->assign('publico', $publico);
        }
        $html = $this->_view->renderizar("detalle_partido");
        $status = true;
        $this->_view->_print(array('html' => $html, 'status' => $status,'noprogramado' => $noprogramado), true);
    }

}
