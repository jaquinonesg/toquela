<?php

/**
 * Description of calendarioController
 *
 * @author Jhon
 */
class CalendarioController extends Controller {

    /**
     *
     * @var Users 
     */
    private $_user;

    public function __construct() {
        parent::__construct();
        // $this->validacionSession();
        $this->_user = $this->_sesion->user;
    }

    public function index() {
        //?torn=61&fase=1&grupo=2&jornada=&fechaA=&fechaB=&strfilter=alqueria+otra+cosa&typefilter=3
        $filter = new stdClass();
        $filter->torn = "";
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
                            $matches = $dao_match->getFormatCalendarByTournament($filter->torn);
                            $num_rounds = $dao_match->getNumRoundsByTournament($filter->torn);
                            $num_matches = count($matches);
                            $arr_enun = $this->getArrEnunciadosEliminacionDirecta($num_rounds);
                            $this->_view->assign('arr_enun', $arr_enun);
                            $this->_view->assign('num_rounds', $num_rounds);
                            $this->_view->assign('num_matches', $num_matches);
                            $this->_view->assign('matches_ronda', $matches);
                            break;
                        case self::TYPE_2:
                            $this->_view->assign('type', 2);
                            $matches_jornadas = $dao_match->getFormatCalendarByTournament($filter->torn, 1);
                            $matches_ronda = $dao_match->getFormatCalendarByTournament($filter->torn, 2);
                            $num_rounds = $dao_match->getNumRoundsByTournament($filter->torn);
                            $num_matches = (count($matches_ronda) + count($matches_jornadas));
                            $arr_enun = $this->getArrEnunciadosEliminacionDirecta($num_rounds);
                            $this->_view->assign('arr_enun', $arr_enun);
                            $this->_view->assign('num_rounds', $num_rounds);
                            $this->_view->assign('num_matches', $num_matches);
                            $this->_view->assign('matches_ronda', $matches_ronda);
                            $this->_view->assign('matches_jornadas', $matches_jornadas);
                            break;
                        case self::TYPE_3:
                            $this->_view->assign('type', 3);
                            $matches = $dao_match->getFormatCalendarByTournamentFilter($filter->torn, $fase->num, $filter->grupo, $filter->jornada, $filter->fechaA, $filter->fechaB, $filter->strfilter, $filter->typefilter);
                            $num_rounds = $dao_match->getNumRoundsByTournament($filter->torn);
                            $num_matches = count($matches);
                            $filter_grupos = $dao_match->getGruposByTournament($filter->torn);
                            $filter_jornadas = $dao_match->getJornadasByTournament($filter->torn);
                            $this->_view->assign('filter_grupos', $filter_grupos);
                            $this->_view->assign('filter_jornadas', $filter_jornadas);
                            $this->_view->assign('num_rounds', $num_rounds);
                            $this->_view->assign('num_matches', $num_matches);
                            $this->_view->assign('matches_jornadas', $matches);
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
                $this->_view->assign('urlencode', $urlencode);
                $this->_view->setTitle("Calendario Torneo");
                $this->_view->assign('calendario',true);
                $this->_view->setItems("only", array('calendario.css'));
                $this->_view->assign('menu_item', 5);
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

    public function generate_elimin() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $num_grupos = $this->post('numgr');
            $num_parti_por_grupo = $this->post('numpargr');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($code);
                if ($tournament->numberparticipants == count($teams)) {
                    $this->_view->setLayout('empty');
                    $this->_view->setOutput(false);
                    //$this->_view->assign('teams', $teams);
                    require_once dirname(__FILE__) . '/GenerateTablero.php';
                    $gt = new GenerateTablero();
                    $html = $gt->generate_params($num_parti_por_grupo, $teams, $code, $num_grupos);
                    $this->_view->_print(array('html' => $html));
                }
            }
        }
    }

    public function configurar($cod_tournament = null, $reconfig_eliminatoria = null) {
        if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $this->_view->assign('tournament', $tournament);
                $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                $validate = DAOFactory::getMatchDAO()->getByTournament($cod_tournament);
                if (is_array($validate) && count($validate) > 0) {
                    $this->_view->assign('has_matches', true);
                }
                $error_number = 0;
                if ($tournament->numberparticipants > count($teams)) {
                    $error_number = 1;
                } else {
                    $this->_view->assign('teams', $teams);
                    $reconfig = false;
                    switch ($tournament->type) {
                        case self::TYPE_1:
                            $this->_view->assign('type_tournament', 1);
                            require_once dirname(__FILE__) . '/GenerateTablero.php';
                            $gt = new GenerateTablero();
                            if (is_array($validate) && count($validate) > 0 && is_null($reconfig_eliminatoria)) {
                                $this->_view->assign('tablero_torneo', $gt->generate_tablero($teams, $cod_tournament, false, $validate));
                                foreach ($validate as $match) {
                                    if (isset($match->scorelocal) && isset($match->scorelocal)) {
                                        $reconfig = false;
                                        break;
                                    } else {
                                        $reconfig = true;
                                    }
                                }
                                $this->_view->assign('ismatches', true);
                                $this->_view->assign('reconfig', $reconfig);
                            } elseif (is_null($reconfig_eliminatoria) || ($reconfig_eliminatoria == "1")) {
                                $this->_view->assign('tablero_torneo', $gt->generate_tablero($teams, $cod_tournament));
                                $this->_view->assign('ismatches', false);
                                $this->_view->assign('reconfig', $reconfig);
                            }
                            break;
                        case self::TYPE_2:
                            $this->_view->assign('type_tournament', 2);
                            $config_ge = $this->validateGruposEliminatoria(count($teams));
                            if (is_null($config_ge)) {
                                $error_number = 2;
                                break;
                            } else {
                                $num_grupos = $config_ge->grupos;
                                $num_parti_por_grupo = $config_ge->participantes;
                                $grupos = $this->organizarGruposEliminatoria($num_grupos, $num_parti_por_grupo, $teams, true);
                                require_once dirname(__FILE__) . '/GenerateTodosContraTodos.php';
                                $gene = new GenerateTodosContraTodos();
                                $html_fase_grupos = $gene->generateGruposEliminatorias($grupos, $teams);

                                require_once dirname(__FILE__) . '/GenerateTablero.php';
                                $gt = new GenerateTablero();
                                $html_fase_eliminatoria = $gt->generate_params(($num_grupos * 2), $teams, $cod_tournament);

                                $this->_view->assign('html_fase_grupos', $html_fase_grupos);
                                $this->_view->assign('html_fase_eliminatoria', $html_fase_eliminatoria);
                                $this->_view->assign('config_ge', $config_ge);
                            }
                            break;
                        case self::TYPE_3:
                            $this->_view->assign('type_tournament', 3);
                            break;
                        case self::TYPE_4:
                            $this->_view->assign('type_tournament', 4);
                            $num_fases = DAOFactory::getMatchDAO()->getNumFases($cod_tournament);
                            $arrfases = DAOFactory::getMatchDAO()->getFasesByTournament($cod_tournament);
                            $this->_view->assign('num_fases', $num_fases);
                            $fases = array();
                            if ($num_fases > 0) {
                                foreach ($arrfases as $fase) {
                                    if ($fase->type == 1) {
                                        $aux_fase = new stdClass();
                                        $aux_fase->type = $fase->type;
                                        $aux_fase->name = "Fase $fase->num de grupos";
                                        $aux_fase->number = $fase->num;
                                        array_push($fases, $aux_fase);
                                    } else if ($fase->type == 2) {
                                        $aux_fase = new stdClass();
                                        $aux_fase->type = $fase->type;
                                        $aux_fase->name = "Fase $fase->num de eliminación";
                                        $aux_fase->number = $fase->num;
                                        array_push($fases, $aux_fase);
                                    }
                                }
                            }
                            $this->_view->assign('fases', array_reverse($fases, true));
//                            $this->_view->assign('type_tournament', 4);
//                            $num_fases = DAOFactory::getMatchDAO()->getNumFases($cod_tournament);
//                            $arrfases = DAOFactory::getMatchDAO()->getFasesByTournament($cod_tournament);
//                            $this->_view->assign('num_fases', $num_fases);
//                            $fases = array();
//                            if ($num_fases > 0) {
//                                foreach ($arrfases as $fase) {
//                                    if ($fase->type == 1) {
//                                        $aux_fase = new stdClass();
//                                        $aux_fase->type = $fase->type;
//                                        $aux_fase->name = "Fase $fase->num de grupos";
//                                        $aux_fase->number = $fase->num;
//                                        $matches = DAOFactory::getMatchDAO()->getFormatCalendarByTournament($cod_tournament, $fase->num);
//                                        require_once dirname(__FILE__) . '/GenerateTodosContraTodos.php';
//                                        $gene = new GenerateTodosContraTodos();
//                                        $aux_fase->html = $gene->generateFaseGrupos($matches, $teams);
//                                        array_push($fases, $aux_fase);
//                                    } else if ($fase->type == 2) {
//                                        $aux_fase = new stdClass();
//                                        $aux_fase->type = $fase->type;
//                                        $aux_fase->name = "Fase $fase->num de eliminación";
//                                        $aux_fase->number = $fase->num;
//                                        $matches = DAOFactory::getMatchDAO()->getFormatCalendarByTournament($cod_tournament, $fase->num);
//                                        require_once dirname(__FILE__) . '/GenerateTablero.php';
//                                        $gt = new GenerateTablero();
//                                        $aux_fase->html = $gt->generate_params((count($matches) + 1), $teams, $cod_tournament, 0, false, $matches, false);
//                                        //$aux_fase->html = $gt->generate_params(8, $teams, $cod_tournament);
//                                        array_push($fases, $aux_fase);
//                                    }
//                                }
//                            }
//                            $this->_view->assign('fases', $fases);
                            break;
                    }
                }
                $this->_view->setTitle("Calendario Torneo");
                $this->_view->setItems("only", array('configurar.css'));
                $this->_view->assign('menu_item', 5);
                $this->_view->assign('error_number', $error_number);
                $this->_view->renderizar(__FUNCTION__);
            }
        }
    }

    public function generate() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($code);
                if ($tournament->numberparticipants == count($teams)) {
                    $this->_view->setLayout('empty');
                    $this->_view->setOutput(false);
                    $this->_view->assign('teams', $teams);
                    switch ($tournament->type) {
                        case self::TYPE_1:

                            break;
                        case self::TYPE_2:
                            $num_grupos = $this->post('numgr');
                            $num_parti_por_grupo = $this->post('numpargr');
                            $html = "";
                            if (is_numeric($num_grupos) && is_numeric($num_parti_por_grupo)) {
                                $grupos = $this->organizarGruposEliminatoria($num_grupos, $num_parti_por_grupo, $teams, true);
                                require_once dirname(__FILE__) . '/GenerateTodosContraTodos.php';
                                $gene = new GenerateTodosContraTodos();
                                $html = $gene->generateGruposEliminatorias($grupos, $teams);
                            }
                            $this->_view->_print(array('html' => $html));
                            break;
                        case self::TYPE_3:
                            $double = $this->post('double');
                            $rounds = $this->tournamentRobin($teams, $double);
                            require_once dirname(__FILE__) . '/GenerateTodosContraTodos.php';
                            $gene = new GenerateTodosContraTodos();
                            $html = $gene->generate($rounds, $teams);
                            /* $this->_view->assign('template', 'roundrobin');
                              $this->_view->assign('rounds', $rounds);
                              $html = $this->_view->renderizar(); */
                            $this->_view->_print(array('html' => $html));
                            break;
                        case self::TYPE_4:
                            $type = $this->post('type');
                            $arr_config = $this->post('config');
                            $fase = $this->post('fase');
                            $idavuelta = $this->post('idavuelta');
                            if ($type == 1) {
                                if ($idavuelta == 0) {
                                    if (DAOFactory::getMatchDAO()->insertArrayFase($arr_config, $teams, $fase, $type, $tournament->codtournament)) {
                                        $this->endProcess("La fase de grupos se creo correctamente.", true);
                                    }
                                } else if ($idavuelta == 1) {
                                    if (DAOFactory::getMatchDAO()->insertArrayFase($arr_config, $teams, $fase, $type, $tournament->codtournament, true)) {
                                        $this->endProcess("La fase de grupos se creo correctamente.", true);
                                    }
                                }
                            } else if ($type == 2) {
                                if (DAOFactory::getMatchDAO()->insertArrayFaseEliminacion($arr_config["size"], $teams, $fase, $type, $tournament->codtournament)) {
                                    $this->endProcess("La fase de grupos se creo correctamente.", true);
                                }
                            }
                            $this->endProcess("No se pudo crear la fase, por favor intentelo de nuevo.");
                            break;
                    }
                }
            }
        }
    }

    public function eliminar_fase() {
        if ($this->_request->isAjax()) {
            $cod_tournament = $this->post('torneo');
            $group = $this->post('fase');
            $affets = DAOFactory::getMatchDAO()->deleteByCodTournamentAndGroup($cod_tournament, $group);
            $this->actualizar_grupos_de_partidos($cod_tournament);
            if ($affets > 0) {
                $this->endProcess("La fase $group se eliminó correctamente.", true);
            }
        }
        $this->endProcess("No se pudo realizar la acción, por favor intentelo de nuevo.");
    }

    private function actualizar_grupos_de_partidos($cod_tournament) {
        $fases = DAOFactory::getMatchDAO()->getFasesByTournament($cod_tournament);
        if (count($fases) > 0) {
            $sql = "";
            $cont = 1;
            foreach ($fases as $fase) {
                if ($fase->num != $cont) {
                    $sql .= DAOFactory::getMatchDAO()->getSqlActualizarOrdenDeGrupos($cod_tournament, $fase->num, $cont);
                }
                $cont++;
            }
            if ($sql != "") {
                DAOFactory::getMatchDAO()->executeUpdate($sql);
            }
            return true;
        }
        return false;
    }

    private function tournamentRobin($teams, $double = false) {
        if (is_array($teams)) {
            if ((count($teams) % 2 ) != 0) {
                $std = new stdClass();
                $std->codteam = 0;
                $std->name = "Descanso";
                $teams[] = $std;
            }
            $round1 = $this->roundRobin($teams);
            $round2 = array();
            if ($double) {
                $round2 = $this->roundRobin(array_reverse($teams), count($teams) - 1);
            }
            $rounds = array_merge($round1, $round2);
            return $rounds;
        }
    }

    private function roundRobin($teams, $n = 0) {
        $rounds = array();
        for ($k = 0, $l = $n; $k < count($teams); $k++, $l++) {
            $round = new stdClass();
            $round->number = $l + 1;
            $matches = array();
            for ($i = 0, $j = count($teams) - 1; $i < $j; $i++, $j--) {
                $match = new stdClass();
                if ($teams[$i]->codteam == 0) {
                    $match->local = $teams[$j];
                    $match->visitant = $teams[$i];
                } else {
                    $match->local = $teams[$i];
                    $match->visitant = $teams[$j];
                }
                $match->round = $l + 1;
                $matches[] = $match;
            }
            $round->matches = $matches;
            $rounds[] = $round;
            //combinar
            $buffer = $teams[count($teams) - 1];
            for ($i = count($teams) - 1; $i > 1; $i--) {
                $teams[$i] = $teams[$i - 1];
            }
            $teams[1] = $buffer;
        }
        return $rounds;
    }

    private function organizarGruposEliminatoria($num_grupos, $num_parti_por_grupo, $teams, $aleatorio = false) {
        $grupos = array();
        if (($num_grupos % 2) != 0) {
            return null;
        }
        if ($aleatorio) {
            shuffle($teams);
        }
        $aux_teams = array_chunk($teams, $num_parti_por_grupo);
        for ($k = 0; $k < count($aux_teams); $k++) {
            $gr = new stdClass();
            $gr->number = ($k + 1);
            $part_teams = $aux_teams[$k];
            $gr->matches = $this->roundRobinUnit($part_teams, ($k + 1));
            array_push($grupos, $gr);
        }
        return $grupos;
    }

    private function roundRobinUnit($teams, $n) {
        $matches = array();
        $size = count($teams);
        $aux = 0;
        $troque = true;
        for ($k = 0; $k < $size; $k++) {
            for ($i = $aux; $i < $size; $i++) {
                if ($teams[$k]->codteam == $teams[$i]->codteam) {
                    continue;
                }
                if ($troque) {
                    $aux = $i;
                    $troque = false;
                }
                $match = new stdClass();
                $match->local = $teams[$k];
                $match->visitant = $teams[$i];
                $match->round = $n;
                $matches[] = $match;
            }
            $troque = true;
        }
        return $matches;
    }

    public function savecalendar() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $validate = DAOFactory::getMatchDAO()->getNumMatchesByTournament($code);
                if ($validate > 0) {
                    DAOFactory::getMatchDAO()->deleteByCodTournament($tournament->codtournament);
                }
                $matches = $this->post('matches');
                $total = ((int) ($tournament->numberparticipants / 2) * $tournament->numberparticipants);
                if ($total == count($matches)) {
                    $temp = array();
                    foreach ($matches as $match) {
                        $temp[$match['round']] += 1;
                    }
                    $reference = (int) ($tournament->numberparticipants / 2);
                    $error = false;
                    foreach ($temp as $value) {
                        if ($value != $reference) {
                            $error = true;
                            break;
                        }
                    }
                    if (!$error) {
                        if (DAOFactory::getMatchDAO()->insertArray($matches, $tournament->codtournament)) {
                            $this->endProcess("¡Se ha creado el calendario! <a href='" . SITE . "/torneos/calendario/index/?torn=$tournament->codtournament'><strong>Ir al calendario</strong></a>", true);
                        } else {
                            $this->endProcess("Ha ocurrido un error en el proceso :(, porfavor vuelva a intentarlo.");
                        }
                    } else {
                        $this->endProcess("Se ha encontrado un error al validar las jornadas, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("El número de partidos no corresponde con la cantidad de equipos participantes.");
                }
            }
        }
    }

    public function savegruposeliminatoria() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $validate = DAOFactory::getMatchDAO()->getNumMatchesByTournament($code);
                if ($validate > 0) {
                    DAOFactory::getMatchDAO()->deleteByCodTournament($tournament->codtournament);
                }
                $matches = $this->post('matches');

                if (DAOFactory::getMatchDAO()->insertArray($matches, $tournament->codtournament, true)) {
                    $this->endProcess("¡Se ha creado el calendario! <a href='" . SITE . "/torneos/calendario/index/?torn=$tournament->codtournament'><strong>Ir al calendario</strong></a>", true);
                } else {
                    $this->endProcess("Ha ocurrido un error en el proceso :(, porfavor vuelva a intentarlo.");
                }
            }
        }
    }

    public function informacion($cod_tournament = null, $round = null, $group = null) {
        if (!is_null($cod_tournament) && is_numeric($cod_tournament) && !is_null($round) && is_numeric($round)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $temp = null;
                if (!is_null($group)) {
                    $temp = DAOFactory::getMatchDAO()->getMatchesByTournamentAndRoundAndGroup($cod_tournament, $round, $group);
                } else {
                    $temp = DAOFactory::getMatchDAO()->getMatchesByTournamentAndRound($cod_tournament, $round);
                }
                $matches = array();
                foreach ($temp as $match) {
                    $match->local = DAOFactory::getTeamDAO()->load($match->teamlocal);
                    $match->visitant = DAOFactory::getTeamDAO()->load($match->teamvisitant);
                    $matches[] = $match;
                }
                // $complex = DAOFactory::getComplexDAO()->queryAllOrderBy('name');
                $complex = DAOFactory::getComplexDAO()->queryAll();
                $this->_view->assign('complex', $complex);
                $this->_view->assign('matches', $matches);
                $this->_view->assign('round', $round);
                $this->_view->assign('tournament', $tournament);
                $this->_view->setTitle("Información");
                $this->_view->setItems("only", array('calendar.css'));
                $this->_view->assign('menu_item', 3);
                $user = $this->_sesion->user;
                $this->_view->assign('user', $user);
                $this->_view->renderizar(__FUNCTION__);
            }
        }
    }

    public function updateround() {
        if ($this->_request->isAjax()) {
            $matches = $this->post('matches');
            $cod_tournament = $this->post('rel');
            if (is_array($matches) && !empty($matches) && is_numeric($cod_tournament)) {
                $sql = "";
                $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
                if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                    foreach ($matches as $match) {
                        // if (is_numeric($match['code']) && isset($match['date'])) {
                        if (is_numeric($match['code'])) {
                            if(isset($match['date'])){
                                $temp = @explode(" ", $match['date']);
                                $hour = $temp[1];
                                if (strlen($hour) <= 5) {
                                    $hour = $hour . ":00";
                                }
                            }else{
                                $temp[0] = '';
                                $hour = '';
                            }
                            // if (Util::validateTime($hour) && is_numeric($match['code']) && $match['complex']) {
                            if (is_numeric($match['code']) && $match['complex']) {
                                $sql .= DAOFactory::getMatchDAO()->getSqlUpdateRound($match['code'], $temp[0], $hour, $match['descriptionplace'], $match['numjornada'], $match['complex'], $match['arbitros']);
                            }
                            // if (Util::validateTime($hour) && is_numeric($match['code'])) {
                            if (is_numeric($match['code'])) {
                                $sql .= DAOFactory::getMatchDAO()->getSqlUpdateRound($match['code'], $temp[0], $hour, $match['descriptionplace'], $match['numjornada'], "", $match['arbitros']);
                            }
                        }
                    }
                }
                // echo "<pre>";
                // @print_r($matches);
                // echo "</pre>";
                // echo "<hr />";
                // echo "<pre>";
                // @print_r($sql);
                // echo "</pre>";
                // echo "<hr />";
                // exit();
                try {
                    if ($sql != "") {
                        $affets = DAOFactory::getMatchDAO()->executeUpdate($sql);
                        // echo "<pre>";
                        // @print_r($affets);
                        // echo "</pre>";
                        // echo "<hr />";
                        // exit();
//                        if ($affets > 0) {
//                            $notificacion = new Notificacion();
//                            foreach ($matches as $match) {
//                                if (is_numeric($match['code'])) {
//                                    $emails = DAOFactory::getMatchDAO()->getEmailsNotificacionPorPartido($match['code']);
//                                    $datapartido = DAOFactory::getMatchDAO()->load_and_location($match['code']);
//                                    
//                                    //$cod_tournament
//                                    ///torneos/tablero/publico_temp/
//                                }
//                            }
//                        }

                        $this->endProcess("¡Se ha actualizado la información de la Jornada!", true);
                    }
                } catch (Exception $exc) {
                    $this->endProcess("Ha ocurrido un error, por favor vuelva a intentarlo.");
                    return false;
                }
            }
        }
        $this->endProcess("Ha ocurrido un error, por favor vuelva a intentarlo.");
        return false;
    }

    public function combinations($n) {
        $combinations = array();
        $limit = $n / 2;
        for ($i = 3; $i < $limit; $i++) {
            for ($j = 0, $t = 2; ($j <= $limit && ($i * $j <= $n)); $j++, $t++) {
                if (($i * $t) == $n && (($i * 2) % 4 == 0)) {
                    $std = new stdClass();
                    $std->groups = $i;
                    $std->teams = $t;
                    $combinations[] = $std;
                }
            }
        }
        return $combinations;
    }

    public function generategroups() {
        if ($this->_request->isAjax()) {
            $opt = $this->post('opt');
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $combinations = $this->combinations($tournament->numberparticipants);
                $optGT = $combinations[0];
                if (!is_null($opt)) {
                    list($opt_groups, $opt_teams) = explode('-', $opt);
                    if (is_numeric($opt_groups) && is_numeric($opt_teams)) {
                        foreach ($combinations as $combination) {
                            if (($combination->groups == $opt_groups) && ($combination->teams == $opt_teams)) {
                                $optGT = $combination;
                                break;
                            }
                        }
                    }
                }
                $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($code);
                $groups = array();
                for ($i = 1, $cont = 0; $i <= $optGT->groups; $i++) {
                    $group = array();
                    for ($j = 0; $j < $optGT->teams; $j++, $cont++) {
                        $group[] = $teams[$cont];
                    }
                    $std = new stdClass();
                    $std->number = $i;
                    $std->teams = $group;
                    $groups[$i] = $std;
                }
                $this->_view->assign('groups', $groups);
                $this->_view->assign('tournament', $tournament);
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $this->_view->assign('template', 'groups');
                $html = $this->_view->renderizar();
                $this->_view->_print(array('html' => $html, 'groups' => $optGT->groups, 'teams' => $optGT->teams));
            }
        }
    }

    public function savegroups() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $groups = $this->post('groups');
                if (is_array($groups) && !empty($groups)) {
                    $opt = $this->post('opt');
                    $combinations = $this->combinations($tournament->numberparticipants);
                    $optGT = $combinations[0];
                    if (!is_null($opt)) {
                        list($opt_groups, $opt_teams) = explode('-', $opt);
                        if (is_numeric($opt_groups) && is_numeric($opt_teams)) {
                            foreach ($combinations as $combination) {
                                if (($combination->groups == $opt_groups) && ($combination->teams == $opt_teams)) {
                                    $optGT = $combination;
                                    break;
                                }
                            }
                        }
                    }
                    if (count($groups) == $optGT->groups) {
                        $flag = true;
                        foreach ($groups as $group) {
                            $teams = $group['teams'];
                            if (count($teams) != $optGT->teams) {
                                $flag = false;
                            }
                        }
                        if ($flag) {
                            try {
                                foreach ($groups as $group) {
                                    $number = $group['number'];
                                    foreach ($group['teams'] as $cod_team) {
                                        $dto = new TournamentHasTeam();
                                        $dto->codtournament = $code;
                                        $dto->codteam = $cod_team;
                                        $dto->group = $number;
                                        DAOFactory::getTournamentHasTeamDAO()->update($dto);
                                    }
                                }
                                $this->endProcess("¡Se han creado los grupos correctamente!", true);
                            } catch (Exception $exc) {
                                $this->endProcess("Ha ocurrido un error en la validación de los equipos, por favor vuelva a intentarlo.");
                            }
                        } else {
                            $this->endProcess("Ha ocurrido un error en la validación de los equipos, por favor vuelva a intentarlo.");
                        }
                    }
                }
            }
        }
    }

    public function grupo($cod_group = null, $cod_tournament = null) {
        if (is_numeric($cod_group) && is_numeric($cod_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $groups = DAOFactory::getTournamentHasTeamDAO()->getGroupsByTournament($cod_tournament, $tournament->numberparticipants);
                if ($cod_group <= count($groups)) {
                    $this->_view->setItems("only", array('calendar.css'));
                    $this->_view->assign('group', $groups[$cod_group]);
                    $this->_view->assign('tournament', $tournament);
                    $this->_view->assign('number_group', $cod_group);
                    $this->_view->renderizar(__FUNCTION__);
                }
            }
        }
    }

    public function delete_eliminatoria() {
        if ($this->_request->isAjax()) {
            $code_tournamen = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournamen);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $validate = DAOFactory::getMatchDAO()->getByTournament($tournament->codtournament);
                if (is_array($validate) && count($validate) > 0) {
                    DAOFactory::getMatchDAO()->deleteByCodTournament($tournament->codtournament);
                }
            }
        }
    }

    public function siguinte_ronda_eliminatoria() {
        if ($this->_request->isAjax()) {
            $code_tournament = $this->post('torneo');
            $current_round = $this->post('round');
            $current_group = $this->post('group');
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                try {
                    if (!is_null($current_group) && is_numeric($current_group)) {
                        $matches_current_round = DAOFactory::getMatchDAO()->getMatchesByTournamentAndRoundModify1($code_tournament, $current_round, $current_group);
                        $matches_next_round = DAOFactory::getMatchDAO()->getMatchesByTournamentAndRoundModify1($code_tournament, ($current_round + 1), $current_group);
                    } else {
                        $matches_current_round = DAOFactory::getMatchDAO()->getMatchesByTournamentAndRoundModify1($code_tournament, $current_round);
                        $matches_next_round = DAOFactory::getMatchDAO()->getMatchesByTournamentAndRoundModify1($code_tournament, ($current_round + 1));
                    }
                    $sql = DAOFactory::getMatchDAO()->cruzar_ganadores_siguiente_ronda($matches_current_round, $matches_next_round);
                    $sql_array = explode(";", $sql);
                    $aux = 0;
                    if (isset($sql_array)) {
                        // Ejecuta consulta por consulta
                        foreach ($sql_array as &$consulta) {
                            $aux++;
                            $consulta_exitosa = DAOFactory::getMatchDAO()->executeUpdate($consulta);
                            if(count($sql_array)-1 == $aux){
                                $this->endProcess("Siguiente ronda realizada con éxito...", true);
                            }
                        }
                    } else {
                        $this->endProcess("No se puede generar la siguiente ronda...");
                    }
                } catch (Exception $exc) {
                    $this->endProcess("Ha ocurrido un error en el proceso, porfavor vuelva a intentarlo.");
                }
            }
        }
    }

    public function save_eliminatoria() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $validate = DAOFactory::getMatchDAO()->countByTournament($tournament->codtournament);
                if ($validate > 0) {
                    DAOFactory::getMatchDAO()->deleteByCodTournament($tournament->codtournament);
                }
                $matches = $this->post('matches');
                if (DAOFactory::getMatchDAO()->insertArray($matches, $tournament->codtournament)) {
                    $this->endProcess("Eliminatoria realizada con éxito...", true);
                } else {
                    $this->endProcess("Ha ocurrido un error en el proceso, porfavor vuelva a intentarlo.");
                }
            }
        }
    }

    private function validateGruposEliminatoria($num_participantes) {
        $obj = new stdClass();
        $obj->grupos = 0;
        $obj->participantes = 0;
        switch ($num_participantes) {
            case 8:
                $obj->grupos = 2;
                $obj->participantes = 4;
                break;
            case 12:
                $obj->grupos = 4;
                $obj->participantes = 3;
                break;
            case 16:
                $obj->grupos = 4;
                $obj->participantes = 4;
                break;
            case 20:
                $obj->grupos = 4;
                $obj->participantes = 5;
                break;
            case 24:
                $obj->grupos = 4;
                $obj->participantes = 6;
                break;
            case 32:
                $obj->grupos = 8;
                $obj->participantes = 4;
                break;
            case 40:
                $obj->grupos = 8;
                $obj->participantes = 5;
                break;
            case 48:
                $obj->grupos = 8;
                $obj->participantes = 6;
                break;
            case 64:
                $obj->grupos = 16;
                $obj->participantes = 4;
                break;
            default:
                return null;
                break;
        }
        return $obj;
    }

    public function calendario_public() {
        $status = false;
        $message = "No se cargaron los datos correctamente.";
        $html = "";
        $cod_tournament = $this->get('torn');

        $filter = new stdClass();
        $filter->torn = "";
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
                            $matches = $dao_match->getFormatCalendarByTournament($filter->torn);
                            $num_rounds = $dao_match->getNumRoundsByTournament($filter->torn);
                            $num_matches = count($matches);
                            $arr_enun = $this->getArrEnunciadosEliminacionDirecta($num_rounds);
                            $this->_view->assign('arr_enun', $arr_enun);
                            $this->_view->assign('num_rounds', $num_rounds);
                            $this->_view->assign('num_matches', $num_matches);
                            $this->_view->assign('matches_ronda', $matches);
                            $message = "Operación realizada con éxito.";
                            $status = true;
                        break;
                    case self::TYPE_2:
                        $this->_view->assign('type', 2);
                            $matches_jornadas = $dao_match->getFormatCalendarByTournament($filter->torn, 1);
                            $matches_ronda = $dao_match->getFormatCalendarByTournament($filter->torn, 2);
                            $num_rounds = $dao_match->getNumRoundsByTournament($filter->torn);
                            $num_matches = (count($matches_ronda) + count($matches_jornadas));
                            $arr_enun = $this->getArrEnunciadosEliminacionDirecta($num_rounds);
                            $this->_view->assign('arr_enun', $arr_enun);
                            $this->_view->assign('num_rounds', $num_rounds);
                            $this->_view->assign('num_matches', $num_matches);
                            $this->_view->assign('matches_ronda', $matches_ronda);
                            $this->_view->assign('matches_jornadas', $matches_jornadas);
                            $message = "Operación realizada con éxito.";
                            $status = true;
                        break;
                    case self::TYPE_3:
                        $this->_view->assign('type', 3);
                            $matches = $dao_match->getFormatCalendarByTournamentFilter($filter->torn, $fase->num, $filter->grupo, $filter->jornada, $filter->fechaA, $filter->fechaB, $filter->strfilter, $filter->typefilter);
                            $num_rounds = $dao_match->getNumRoundsByTournament($filter->torn);
                            $num_matches = count($matches);
                            $filter_grupos = $dao_match->getGruposByTournament($filter->torn);
                            $filter_jornadas = $dao_match->getJornadasByTournament($filter->torn);
                            $this->_view->assign('filter_grupos', $filter_grupos);
                            $this->_view->assign('filter_jornadas', $filter_jornadas);
                            $this->_view->assign('num_rounds', $num_rounds);
                            $this->_view->assign('num_matches', $num_matches);
                            $this->_view->assign('matches_jornadas', $matches);
                            $message = "Operación realizada con éxito.";
                            $status = true;
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
            }
            $urlencode = new EncodeURL();
            $this->_view->assign('urlencode', $urlencode);
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $this->_view->setItems("only", array('calendario.css'));
            $this->_view->assign('error_number', $error_number);
            if ($status) {
                $html = $this->_view->renderizar("calendario_public");
            }
        }

        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }

    public function get_detalle_calendario_public() {
        $status = false;
        $message = "No se cargaron los datos correctamente.";
        $html = "";
        if ($this->_request->isAjax()) {
            $cod_match = $this->post('partido');
            $match = DAOFactory::getMatchDAO()->load_and_location($cod_match);
            $this->_view->assign('match', $match);
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $this->_view->setItems("only", array('calendario.css'));
            $status = true;
            $message = "Operación realizada con éxito.";
            if ($status) {
                $html = $this->_view->renderizar("detalle_partido_public");
            }
            $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
        }
    }

    public function siguinte_fase() {
        if ($this->_request->isAjax()) {
            $code_tournament = $this->post('torneo');
            $group = $this->post('grupo');
            if (is_numeric($code_tournament) && is_numeric($group)) {
                $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
                if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                    $num_partidos = DAOFactory::getMatchDAO()->getNumMatchesByGroup($tournament->codtournament, $group);
                    $num_partidos_jugados = DAOFactory::getMatchDAO()->getNumMatchesByGroupPlayed($tournament->codtournament, $group);
                    if ($num_partidos == $num_partidos_jugados) {
                        if (DAOFactory::getMatchDAO()->update_siguiente_fase($tournament->codtournament, $group, 2)) {
                            $this->endProcess("Eliminatoria actualizada con éxito...", true);
                        } else {
                            $this->endProcess("Surgió un error no se puede completar la siguiente fase, por favor inténtelo de nuevo.");
                        }
                    } else {
                        $this->endProcess("No se ha completado la fase de grupos, por lo tanto, no se puede iniciar la fase de eliminación directa.");
                    }
                }
            }
        }
        $this->endProcess("No se puede realizar la acción.");
    }

    public function update_arr_matches() {
        if ($this->_request->isAjax()) {
            $arr_matches = $this->post('arr');
            if (is_array($arr_matches) && (count($arr_matches) > 0)) {
                if (DAOFactory::getMatchDAO()->updateArray($arr_matches)) {
                    $this->endProcess("La fase se actualizó con éxito...", true);
                } else {
                    $this->endProcess("No se pudo actualizar la fase...");
                }
            }
        }
        $this->endProcess("No se puede realizar la acción.");
    }

    public function get_config_fase() {
        $status = false;
        $message = "No se cargaron los datos correctamente.";
        $html = "";
        if ($this->_request->isAjax()) {
            $cod_tournament = $this->post('torneo');
            $group = $this->post('fase');
            //@print_r('$cod_tournament: ' . $cod_tournament . ' $group: ' . $group);
            if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
                $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
                $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                $this->_view->assign('tournament', $tournament);
                $num_fases = DAOFactory::getMatchDAO()->getNumFases($cod_tournament);

                $infofase = DAOFactory::getMatchDAO()->getFaseUnitByTournament($cod_tournament, $group);
                $this->_view->assign('num_fases', $num_fases);
                if ($num_fases > 0) {
                    if ($infofase->type == 1) {
                        $aux_fase = new stdClass();
                        $aux_fase->type = $infofase->type;
                        $aux_fase->name = "Fase $infofase->num de grupos";
                        $aux_fase->number = $infofase->num;
                        $matches = DAOFactory::getMatchDAO()->getFormatCalendarByTournament($cod_tournament, $infofase->num);
                        require_once dirname(__FILE__) . '/GenerateTodosContraTodos.php';
                        $gene = new GenerateTodosContraTodos();
                        $info_gene = $gene->generateFaseGrupos($matches, $teams);
                        $aux_fase->html = $info_gene->html;
                        $aux_fase->nummatches = $info_gene->nummatches;
                        $aux_fase->numrounds = $info_gene->numrounds;
                    } else if ($infofase->type == 2) {
                        $aux_fase = new stdClass();
                        $aux_fase->type = $infofase->type;
                        $aux_fase->name = "Fase $infofase->num de eliminación";
                        $aux_fase->number = $infofase->num;
                        $matches = DAOFactory::getMatchDAO()->getFormatCalendarByTournament($cod_tournament, $infofase->num);
                        require_once dirname(__FILE__) . '/GenerateTablero.php';
                        $gt = new GenerateTablero();
                        $aux_fase->html = $gt->generate_params((count($matches) + 1), $teams, $cod_tournament, 0, false, $matches, false);
                        $aux_fase->nummatches = count($matches);
                        //$aux_fase->html = $gt->generate_params(8, $teams, $cod_tournament);
                    }
                    $status = true;
                }
                $this->_view->assign('fase', $aux_fase);
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $this->_view->setItems("only", array('calendario.css'));
                if ($status) {
                    $html = $this->_view->renderizar("get_config_fases");
                }
            }
        }
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }

    public function get_results_fase() {
        $status = false;
        $message = "No se cargaron los datos correctamente.";
        $html = "";
        if ($this->_request->isAjax()) {
            $cod_tournament = $this->post('torneo');
            $group = $this->post('fase');
            //@print_r('$cod_tournament: ' . $cod_tournament . ' $group: ' . $group);
            if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
                $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
                $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                $this->_view->assign('tournament', $tournament);
                $num_fases = DAOFactory::getMatchDAO()->getNumFases($cod_tournament);
                $infofase = DAOFactory::getMatchDAO()->getFaseUnitByTournament($cod_tournament, $group);
                $this->_view->assign('num_fases', $num_fases);
                if ($num_fases > 0) {
                    if ($infofase->type == 1) {
                        $aux_fase = new stdClass();
                        $aux_fase->type = $infofase->type;
                        $aux_fase->name = "Fase $infofase->num de grupos";
                        $aux_fase->number = $infofase->num;
                        $matches = DAOFactory::getMatchDAO()->getFormatCalendarByTournament($cod_tournament, $infofase->num);
                        $aux_fase->matches = $matches;
                    } else if ($infofase->type == 2) {
                        $aux_fase = new stdClass();
                        $aux_fase->type = $infofase->type;
                        $aux_fase->name = "Fase $infofase->num de eliminación";
                        $aux_fase->number = $infofase->num;
                        $matches = DAOFactory::getMatchDAO()->getFormatCalendarByTournament($cod_tournament, $infofase->num);
                        require_once dirname(__FILE__) . '/GenerateTablero.php';
                        $gt = new GenerateTablero();
                        $aux_fase->html = $gt->generate_params((count($matches) + 1), $teams, $cod_tournament, 0, true, $matches, false);
                        //$aux_fase->html = $gt->generate_params(8, $teams, $cod_tournament);
                    }
                    $status = true;
                }
                $this->_view->assign('fase', $aux_fase);
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $this->_view->setItems("only", array('calendario.css'));
                if ($status) {
                    $html = $this->_view->renderizar("get_results_fases");
                }
            }
        }
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }

    public function proximaFecha() {
        // include APP_ROOT . '/libraries/fecha-a-letras/lib_fecha_letras.php';
        $cod_tournament = $this->post('torneo');
        $round = $this->post('round');
        $group = $this->post('group');
        $fecha_actual=strftime( "%Y-%m-%d", time());
        if (!is_null($cod_tournament) && is_numeric($cod_tournament) && !is_null($round) && is_numeric($round)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament)) {
                $matches = DAOFactory::getMatchDAO()->getMatchesByTournamentAndRoundAndGroup($cod_tournament, $round, $group, true);
                $matches_by_date = array();
                for ($i=0; $i < count($matches) ; $i++) { 
                    $date = $matches[$i]->date;
                    if($date >= $fecha_actual){
                        $temp_by_fecha = DAOFactory::getMatchDAO()->getMatchesByDate($cod_tournament, $round, $group, $date);
                        for ($e=0; $e < count($temp_by_fecha) ; $e++) { 
                            $temp_by_fecha[$e]->local = DAOFactory::getTeamDAO()->load($temp_by_fecha[$e]->teamlocal);
                            $temp_by_fecha[$e]->visitant = DAOFactory::getTeamDAO()->load($temp_by_fecha[$e]->teamvisitant);
                            $temp_by_fecha[$e]->complex = DAOFactory::getComplexDAO()->load($temp_by_fecha[$e]->codcomplex);
                            // quita segundos de la hora -_-
                            $quit_seconds  = explode(':', $temp_by_fecha[$e]->hour);
                            unset($quit_seconds[count($quit_seconds)-1]);
                            $hora_sin_segundos = implode(':',$quit_seconds);
                            $temp_by_fecha[$e]->hour = $hora_sin_segundos;
                            // -_-
                        }
                        array_push($matches_by_date, $temp_by_fecha);
                    }
                }
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $this->_view->assign('matches_by_date', $matches_by_date);
                $html = $this->_view->renderizar("resultados_proxima_fecha");
                $status = true;
                $this->_view->_print(array('html' => $html, 'status' => $status), true);
            }
        }
    }

    public function detallePartido() {
        $cod_match = $this->post('codmatch');
        $programeichon = $this->post('programado');
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
        $path = str_replace('public/', '',$team_local_info->path);
        $team_local->image = $team_local_info->path;
        $team_local->futboltype = $team_local_info->futboltype;
        $team_local->type = $team_local_info->type;
        $team_local->players = DAOFactory::getTeamDAO()->getPlayersByTeam($match->teamlocal);
        
        $team_visitant = new Team();
        $team_visitant = DAOFactory::getTeamDAO()->load($match->teamvisitant);
        $team_visitant_info = DAOFactory::getTeamDAO()->getTeamInfo($match->teamvisitant);
        $team_visitant->image = $team_visitant_info->path;
        $team_visitant->futboltype = $team_visitant_info->futboltype;
        $team_visitant->type = $team_visitant_info->type;
        $team_visitant->players = DAOFactory::getTeamDAO()->getPlayersByTeam($match->teamvisitant);
        
        // quita segundos de la hora -_-
        $quit_seconds  = explode(':', $match->hour);
        unset($quit_seconds[count($quit_seconds)-1]);
        $hora_sin_segundos = implode(':',$quit_seconds);
        $match->hour = $hora_sin_segundos;

        $urlencode = new EncodeURL();
        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('match', $match);
        $this->_view->assign('team_local', $team_local);
        $this->_view->assign('team_visitant', $team_visitant);
        $this->_view->assign('noprogramado', $noprogramado);
        
        $html = $this->_view->renderizar("detalle_partido_calendario");
        $status = true;
        $this->_view->_print(array('html' => $html, 'status' => $status,'noprogramado' => $noprogramado), true);
    }

}
