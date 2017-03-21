<?php

class PartidoController extends Controller {

    /**
     *
     * @var Users 
     */
    private $_user;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
        $this->_user = $this->_sesion->user;
    }

    public function index($cod_match = null) {
        if (!is_null($cod_match) && is_numeric($cod_match)) {
            $match = DAOFactory::getMatchDAO()->load_and_location($cod_match);
            if (isset($match)) {
                $tournament = DAOFactory::getTournamentDAO()->load($match->codtournament);
                $match->local = DAOFactory::getTeamDAO()->load($match->teamlocal);
                $match->local->players = DAOFactory::getUserHasTeamDAO()->getPlayersByTeam($match->teamlocal);
                $match->visitant = DAOFactory::getTeamDAO()->load($match->teamvisitant);
                $match->visitant->players = DAOFactory::getUserHasTeamDAO()->getPlayersByTeam($match->teamvisitant);
                $match->tournament = $tournament;
                $types_statistics = DAOFactory::getTypeStatisticDAO()->queryAll();
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
                $this->_view->assign('init', 0);
                $this->_view->assign('solo_format', false);
                $this->_view->assign('num_statistic_local', $num_statistic_local);
                $this->_view->assign('num_statistic_visitant', $num_statistic_visitant);
                $this->_view->assign('statistics_local', $statistics_local);
                $this->_view->assign('statistics_visitant', $statistics_visitant);
                $this->_view->assign('match_info', $match);
                $this->_view->assign('types_statistics', $types_statistics);
                $this->_view->setTitle("Partido en Curso");
                $this->_view->setItems("only", array('partido.css'));
                $this->_view->assign('menu_item', 1);
                $this->_view->assign('isPartidoCalendar', true);
                $this->_view->renderizar();
            }
        }
    }

    public function datapartido() {
        if (!is_null($_POST['match']) && is_numeric($_POST['match'])) {
            $match = DAOFactory::getMatchDAO()->getScores($_POST['match']);
            if (isset($match)) {
//                $tournament = DAOFactory::getTournamentDAO()->load($match->codtournament);
//                $match->local = DAOFactory::getTeamDAO()->load($match->teamlocal);
//                $match->local->players = DAOFactory::getUserHasTeamDAO()->getPlayersByTeam($match->teamlocal);
//                $match->visitant = DAOFactory::getTeamDAO()->load($match->teamvisitant);
//                $match->visitant->players = DAOFactory::getUserHasTeamDAO()->getPlayersByTeam($match->teamvisitant);
//                $match->tournament = $tournament;
//                $match->location = "complejo";
                $this->_view->_print(array('match' => $match), true);
            }
        }
    }

    public function add_statistics() {
        $data['message'] = "No se pudo realizar la acción. Por favor inténtelo de nuevo.";
        $data['status'] = false;
        $data['resumen'] = "AGREGA EL NUEVO RESUMEN";
        if (isset($_POST['init']) && isset($_POST['add']) && isset($_POST['add']['match_obj']['scorelocal']) && isset($_POST['add']['statistics_obj']['codmatch'])) {
            $obj_match = (object) $_POST['add']['match_obj'];
            $obj_statistic = (object) $_POST['add']['statistics_obj'];
            if ($obj_statistic->data != "NULL") {
                $obj_statistic->data = "NULL";
            }
            
            /*Solo cuando es la estadística por W*/
            if($obj_statistic->codtypestatistic == '19'){//es la estadística por W
                $match = new Match();
                $match->codmatch = $obj_statistic->codmatch;
                $match_info_actual = DAOFactory::getMatchDAO()->load($obj_statistic->codmatch);
                $match->round = $match_info_actual->round;
                $match->estate = $match_info_actual->state;
                if($obj_statistic->islocal){//Si es para equipo local
                    $match->statescorelocal = 1;//estado que demuestra que el equipo pierde por W
                    $match->golescontralocal = 3;
                    $inserta_estado = DAOFactory::getMatchDAO()->updateSinGroup($match);
                }else{//entonces es para equipo visitante
                    $match->statescorevisitant = 1;//estado que demuestra que el equipo pierde por W
                    $match->golescontravisitant = 3;
                    $inserta_estado = DAOFactory::getMatchDAO()->updateSinGroup($match);
                }
                $data['pierde_por_w'] = $inserta_estado;
            }
            /*----------------------------------------*/ 

            $cod_new_statistic = DAOFactory::getStatisticsDAO()->insertAddModify($obj_statistic);
            if ($obj_statistic->islocal == 1) {
                $data['resumen'] = $this->get_format_resumen_local($cod_new_statistic, $_POST['init']);
            } elseif ($obj_statistic->islocal == 0) {
                $data['resumen'] = $this->get_format_resumen_visitant($cod_new_statistic, $_POST['init']);
            }
            if ($cod_new_statistic > 0) {
                $num_affets = DAOFactory::getMatchDAO()->save_partido($obj_match->scorelocal, $obj_match->scorevisitant, $obj_match->estate, $obj_match->codmatch);
                $data['message'] = "Operación realizada con éxito.";
                $data['status'] = true;
            }
        }
        $this->_view->_print($data, true);
    }

    public function save_partido() {
        $data['message'] = "No se pudo realizar la acción. Por favor inténtelo de nuevo.";
        $data['status'] = false;
        if (isset($_POST['partido'])) {
            $obj_match = (object) $_POST['partido'];
            if (is_numeric($obj_match->codmatch) && is_numeric($obj_match->scorelocal) && is_numeric($obj_match->scorevisitant) && is_numeric($obj_match->estate)) {
                DAOFactory::getMatchDAO()->save_partido($obj_match->scorelocal, $obj_match->scorevisitant, $obj_match->estate, $obj_match->codmatch);
                $data['message'] = "Partido guardado correctamente.";
                $data['status'] = true;
            }
        }
        $this->_view->_print($data, true);
    }

    public function delete_statistics() {
        $data['message'] = "No se pudo realizar la acción. Por favor inténtelo de nuevo.";
        $data['status'] = false;
        if (is_numeric($_POST['statistic']) && is_numeric($_POST['match']) && isset($_POST['islocal'])) {
            $match = DAOFactory::getMatchDAO()->load($_POST['match']);
            $statistic = DAOFactory::getStatisticsDAO()->load($_POST['statistic']);
            if (is_object($statistic) && is_object($match)) {
                
                /*Solo cuando es la estadística por W*/
                if($statistic->codtypestatistic == '19'){//es la estadística por W
                    if($statistic->islocal){//Si es para equipo local
                        $match->statescorelocal = 0;//estado que demuestra que el equipo pierde por W
                        $match->golescontralocal = 0;
                        $match->golesfavorlocal = 0;
                        $inserta_estado = DAOFactory::getMatchDAO()->updateSinGroup($match);
                    }else{//entonces es para equipo visitante
                        $match->statescorevisitant = 0;//estado que demuestra que el equipo pierde por W
                        $match->golescontravisitant = 0;
                        $match->golesfavorvisitant = 0;
                        $inserta_estado = DAOFactory::getMatchDAO()->updateSinGroup($match);
                    }
                    $data['eliminada_estadistica_por_w'] = $inserta_estado;
                }
                /*--------------------------------------*/

                $new_marcador = $this->restaMarcador($statistic->codtypestatistic, $match->scorelocal, $match->scorevisitant, $statistic->islocal);
                DAOFactory::getMatchDAO()->actualizarMarcador($new_marcador->scorelocal, $new_marcador->scorevisitant, $match->codmatch);
                $numm_affets = DAOFactory::getStatisticsDAO()->delete($statistic->codstatistics);
                if ($numm_affets > 0) {
                    $data['message'] = "La estadística se elimino correctamente.";
                    $data['status'] = true;
                }
            }
        }
        $this->_view->_print($data, true);
    }

    private function restaMarcador($typestatistic, $scorelocal, $scorevisitant, $islocal) {
        if ($typestatistic == 1) {
            if ($islocal) {
                if ($scorelocal > 0) {
                    $scorelocal--;
                }
            } else {
                if ($scorevisitant > 0) {
                    $scorevisitant--;
                }
            }
        }
        if ($typestatistic == 2) {
            if ($islocal) {
                if ($scorevisitant > 0) {
                    $scorevisitant--;
                }
            } else {
                if ($scorelocal > 0) {
                    $scorelocal--;
                }
            }
        }
        if ($typestatistic == 3) {
            if ($islocal) {
                if ($scorelocal > 0) {
                    $scorelocal--;
                }
            } else {
                if ($scorevisitant > 0) {
                    $scorevisitant--;
                }
            }
        }
        if ($typestatistic == 15) {
            if ($islocal) {
                if ($scorelocal > 0) {
                    $scorelocal--;
                }
            } else {
                if ($scorevisitant > 0) {
                    $scorevisitant--;
                }
            }
        }
        if ($typestatistic == 19) {
            if ($islocal) {
                $scorelocal = 0;
            } else {
                $scorevisitant = 0;
            }
        }
        $data["scorelocal"] = $scorelocal;
        $data["scorevisitant"] = $scorevisitant;
        return (object) $data;
    }

    /**
     * Actualiza los eventos ocurridos en un partido
     *
     * @since 16/08/2015
     * @author Juan Carlos Gama, Grimorum
     * @return JSON 
     */
    public function update_statistics() {
        $data['message'] = "No se pudo realizar la acción. Por favor inténtelo de nuevo.";
        $data['status'] = false;
        $data['resumen'] = "AGREGA EL NUEVO RESUMEN";
        if (isset($_POST['init']) && isset($_POST['solo_format']) && isset($_POST['add']) && isset($_POST['add']['match_obj']['scorelocal']) && isset($_POST['add']['statistics_obj']['codmatch'])) {
            $obj_match = (object) $_POST['add']['match_obj'];
            //cambiar el metodo  que actualiza
            $num_affets = DAOFactory::getMatchDAO()->updateSinGroup($obj_match);

            $obj_statistic = (object) $_POST['add']['statistics_obj'];
            $cod_statistic = $obj_statistic->codstatistics;
            if ($obj_statistic->data != "NULL") {
                $obj_statistic->data = "NULL";
            }
            $num_affets_statistic = DAOFactory::getStatisticsDAO()->updateModify($obj_statistic);
            if ($obj_statistic->islocal == 1) {
                $data['resumen'] = $this->get_format_resumen_local($cod_statistic, $_POST['init'], $_POST['solo_format']);
            } elseif ($obj_statistic->islocal == 0) {
                $data['resumen'] = $this->get_format_resumen_visitant($cod_statistic, $_POST['init'], $_POST['solo_format']);
            }
            if (($num_affets_statistic > 0) || ($num_affets > 0)) {
                $data['message'] = "Operación realizada con éxito.";
                $data['status'] = true;
            }
        }
        $this->_view->_print($data, true);
    }

    private function get_format_resumen_local($cod_statistics, $init = 0, $solo_format = false) {
        $statistics_local = DAOFactory::getStatisticsDAO()->getByCodStatisticLocal($cod_statistics);
        if (count($statistics_local) > 0) {
            foreach ($statistics_local as $stati) {
                $stati->type = DAOFactory::getTypeStatisticDAO()->load($stati->codtypestatistic);
                $stati->player = DAOFactory::getUsersDAO()->getInfoBasic($stati->coduser);
            }
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $this->_view->assign('template', 'template_resumen_local');
            $this->_view->assign('statistics_local', $statistics_local);
            $this->_view->assign('init', $init);
            $this->_view->assign('solo_format', $solo_format);
            return $this->_view->renderizar();
        } else {
            return "";
        }
    }

    private function get_format_resumen_visitant($cod_statistics, $init = 0, $solo_format = false) {
        $statistics_visitant = DAOFactory::getStatisticsDAO()->getByCodStatisticVisitant($cod_statistics);
        if (count($statistics_visitant) > 0) {
            foreach ($statistics_visitant as $stati) {
                $stati->type = DAOFactory::getTypeStatisticDAO()->load($stati->codtypestatistic);
                $stati->player = DAOFactory::getUsersDAO()->getInfoBasic($stati->coduser);
            }
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $this->_view->assign('template', 'template_resumen_visitant');
            $this->_view->assign('statistics_visitant', $statistics_visitant);
            $this->_view->assign('init', $init);
            $this->_view->assign('solo_format', $solo_format);
            return $this->_view->renderizar();
        } else {
            return "";
        }
    }

    /**
    *  Se suman goles a favor al equipo, guardandose en la base de datos 
    *  no en el marcador como 'score_local' o 'score_visitant' 
    *  si no en el campo 'goles_favor_local' o si es visitante 'goles_favor_visitant'.
    *  Y si se guardan goles_favor de alguno de los dos tipos, ya se local o visitante, 
    *  se agrega goles en contra al del otro tipo.
    *  Ejemplo: 
    *  goles_favor_local llega como 3 entonces a goles_contra_visitant le agrego esos 3
    *  y de la misma manera al contrario =D.
    *
    * @param string $codmatch codigo del partido
    * @param string $que_soy si es local o visitante
    * @param string $cantidad el total de goles que va a sumar
    */
    public function golesFavor(){

        $data['message'] = "No se pudo realizar la acción.";
        $data['status'] = false; 

        $codmatch = $this->post('codmatch');
        $que_soy = $this->post('que_soy');
        $cantidad = $this->post('cantidad');

        $score_favor_actual = 0;
        $score_contra_actual = 0;

        $match = new Match();
        $match->codmatch = $codmatch;

        if($que_soy == 'local'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            $score_favor_actual = $match_actual->golesfavorlocal;
            $score_contra_actual = $match_actual->golescontravisitant;

            $match->round = $match_actual->round;
            $match->estate = $match_actual->state;

            $match->golesfavorlocal = $score_favor_actual + $cantidad;
            $match->golescontravisitant = $score_contra_actual + $cantidad;

            $match->statescorelocal = 1;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($que_soy == 'visitante'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            $score_favor_actual = $match_actual->golesfavorvisitant;
            $score_contra_actual = $match_actual->golescontralocal;
            $match->round = $match_actual->round;
            $match->estate = $match_actual->state;

            $match->golesfavorvisitant = $score_favor_actual + $cantidad;
            $match->golescontralocal = $score_contra_actual + $cantidad;

            $match->statescorevisitant = 1;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($pasa){
            $data['message'] = "Operación realizada con éxito.";
            $data['status'] = true;
        }
        $this->_view->_print($data, true);
    }

    /**
    *  Se suman goles en contra al equipo, guardandose en la base de datos 
    *  no en el marcador como 'score_local' o 'score_visitant' 
    *  si no en el campo 'goles_contra_local' o si es visitante 'goles_contra_visitant'.
    *  
    * @param string $codmatch codigo del partido
    * @param string $que_soy si es local o visitante
    * @param string $cantidad el total de goles que va a sumar
    */
    public function golesContra(){
        $data['message'] = "No se pudo realizar la acción.";
        $data['status'] = false; 

        $codmatch = $this->post('codmatch');
        $que_soy = $this->post('que_soy');
        $cantidad = $this->post('cantidad');

        $score_contra_actual = 0;
        $score_favor_actual= 0;

        $match = new Match();
        $match->codmatch = $codmatch;

        if($que_soy == 'local'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            
            $score_contra_actual = $match_actual->golescontralocal;
            
            $match->round = $match_actual->round;
            $match->estate = $match_actual->state;

            $match->golescontralocal = $score_contra_actual + $cantidad;

            $match->statescorelocal = 1;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($que_soy == 'visitante'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);

            $score_contra_actual = $match_actual->golescontravisitant;

            $match->round = $match_actual->round;
            $match->estate = $match_actual->state;

            $match->golescontravisitant = $score_contra_actual + $cantidad;

            $match->statescorevisitant = 1;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($pasa){
            $data['message'] = "Operación realizada con éxito.";
            $data['status'] = true;
        }
        $this->_view->_print($data, true);
    }

    /**
    * Restaura el valor que halla a cero, ya sea en el campo 
    * (golesfavorlocal) o (golesfavorvisitant).
    *
    * @param string $codmatch codigo del partido
    * @param string $que_soy si es local o visitante
    */
    public function restauraFavor(){
        $data['message'] = "No se pudo realizar la acción.";
        $data['status'] = false; 

        $codmatch = $this->post('codmatch');
        $que_soy = $this->post('que_soy');

        $match = new Match();
        $match->codmatch = $codmatch;
        if($que_soy == 'local'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            $match->round = $match_actual->round;
            $match->estate = $match_actual->state;
            $match->golesfavorlocal = 0;
            $match->golescontravisitant = 0;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($que_soy == 'visitante'){
            
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            $match->round = $match_actual->round;
            $match->estate = $match_actual->state;
            $match->golesfavorvisitant = 0;
            $match->golescontralocal = 0;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($pasa){
            $data['message'] = "Operación realizada con éxito.";
            $data['status'] = true;
        }
        $this->_view->_print($data, true);
    }

    /**
    * Restaura el valor que halla a cero, ya sea en el campo 
    * (golescontralocal) o (golescontravisitant).
    *
    * @param string $codmatch codigo del partido
    * @param string $que_soy si es local o visitante
    */
    public function restauraContra(){
        $data['message'] = "No se pudo realizar la acción.";
        $data['status'] = false; 

        $codmatch = $this->post('codmatch');
        $que_soy = $this->post('que_soy');

        $match = new Match();
        $match->codmatch = $codmatch;
        if($que_soy == 'local'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            $match->round = $match_actual->round;
            $match->estate = 1;
            $match->golescontralocal = 0;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($que_soy == 'visitante'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            $match->round = $match_actual->round;
            $match->estate = 1;
            $match->golescontravisitant = 0;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($pasa){
            $data['message'] = "Operación realizada con éxito.";
            $data['status'] = true;
        }
        $this->_view->_print($data, true);
    }

    /**
    * Restaura el valor que halla a cero, ya sea en el campo 
    * (scorelocal) o (scorevisitant), restaura el marcador del
    * visitante o del local.
    *
    * @param string $codmatch codigo del partido
    * @param string $que_soy si es local o visitante
    */
    public function restauramarcador(){
        $data['message'] = "No se pudo realizar la acción.";
        $data['status'] = false; 

        $codmatch = $this->post('codmatch');
        $que_soy = $this->post('que_soy');
        
        $match = new Match();
        $match->codmatch = $codmatch;

        if($que_soy == 'local'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            $match->round = $match_actual->round;
            $match->estate = $match_actual->state;
            $match->scorelocal = 0;
            $match->statescorelocal = 0;
            $match->golescontralocal = 0;
            $match->golesfavorvisitant = 0;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }
        if($que_soy == 'visitante'){
            $match_actual = DAOFactory::getMatchDAO()->load($codmatch);
            $match->round = $match_actual->round;
            $match->estate = $match_actual->state;
            $match->scorevisitant = 0;
            $match->statescorevisitant = 0;
            $match->golescontravisitant = 0;
            $match->golesfavorlocal = 0;
            $pasa = DAOFactory::getMatchDAO()->updateSinGroup($match);
        }

        if($pasa){
            $data['message'] = "Operación realizada con éxito.";
            $data['status'] = true;
        }
        $this->_view->_print($data, true);
    }

    /**
    * Actualiza el campo de (estado) a la estadística, siendo 
    * (0) no pagado y (1) pagado.
    * Si es 'nopagado' se debe actualizar a 'pagado' y si no
    * es 'pagado' se actualiza a 'nopagado'.
    *
    * @param string $codstatistic codigo de la estadística
    * @param string $tipoEstado si es 'pagado' o 'nopagado'
    */
    public function actualizaEstado() {
        $data['message'] = "No se pudo realizar la acción";
        $data['status'] = false;
        $codstatistic = $this->post('codstatistic');
        $tipoEstado = $this->post('tipoEstado');
        $statistics = new Statistics();
        $statistics->codstatistics = $codstatistic;
        if(isset($tipoEstado)){
            if($tipoEstado == 'nopagado'){
                $statistics->estado = 1;
            }
            if($tipoEstado == 'pagado'){
                $statistics->estado = 0;
            }
        }
        $pasa = DAOFactory::getStatisticsDAO()->update($statistics);
        if($pasa){
            $data['message'] = "Se ha cambiado el estado de la estadistica.";
            $data['status'] = true;
        }
        $this->_view->_print($data, true);
    }

}