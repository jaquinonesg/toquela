<?php

/**
 * Description of participantesController
 *
 * @author Jhon
 */
class ParticipantesController extends Controller {

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

    public function index($cod_tournament = null) {
        if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament)) {
                $this->_view->assign('tournament', $tournament);
                $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                $this->_view->assign('teams', $teams);
                $num_players = DAOFactory::getUsersDAO()->getNumPlayersInTeams();
                $num_teams = DAOFactory::getTeamDAO()->getNumOfTeams();
                $this->_view->setTitle("Participantes Torneo");
                $this->_view->setItems("only", array('participantes.css'));
                $this->_view->assign('menu_item', 2);
                $this->_view->assign('num_players', $num_players);
                $this->_view->assign('num_teams', $num_teams);
                $this->_view->renderizar();
            }
        }
    }

    public function saveteams() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $teams = $this->post('teams');
            $espacios_disponibles = $this->post('espacios_disponibles');

            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $numbers = array();
                if (!empty($teams)) {
                    if (DAOFactory::getTournamentHasTeamDAO()->insertArray($teams, $tournament->codtournament, $tournament->numberparticipants)) {
                        $teams_torneo = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($code);
                        if(isset($teams_torneo[0])){
                            $num_of_teams = count($teams_torneo);
                        }
                        if($espacios_disponibles == $num_of_teams){
                            $data['redireccionese'] = true; 
                        }
                        $data['message'] =  'Se han asignado el total de los equipos, ahora puede configurar el torneo.';
                        $data['status'] =  true;
                        $this->_view->_print($data);
                    } else {
                        $this->endProcess("Ya se asignaron los equipos o ha ocurrido un error en el proceso por favor vuelva a intentarlo.");
                    }
                }
            }
        }
        $this->endProcess("No se pudo realizar la acción, por favor inténtelo de nuevo.");
    }

    public function getallteams() {
        $urlencode = new EncodeURL();
        // paginador =D
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $equipos_user = DAOFactory::getTournamentHasTeamDAO()->getAllTeams($this->_user->coduser);
        $total_equipos = count($equipos_user);
        $pj = new PaginatorJorge("pagina_equipos_check", $total_equipos, 18, 1);
        $htmlpaginator = $pj->getHtmlPaginator(true);
        $allequipos = DAOFactory::getTournamentHasTeamDAO()->getAllTeams($this->_user->coduser, $pj->inicio_limit, $pj->fin_limit);
        // END paginador 
        $message = "No se pudo realizar la acción.";
        $html = "";
        $status = false;
        $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();
        $complex = DAOFactory::getComplexDAO()->queryAllComplex();
        
        // arreglo limpiesito sin equipos ya agregados
        $teams_in_torneo = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($this->post('codigo_torneo'));
        $allequipos = $this->elimina_equipos_ya_escogidos($allequipos, $teams_in_torneo);

        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('complex', $complex);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('types_futbol', $types_futbol);
        $this->_view->assign('equipos', $allequipos);
        $this->_view->setLayout('empty');
        $this->_view->setOutput(false);
        $html = $this->_view->renderizar('detalle_popup_asig_equipo_mejor');
        if ($html != "") {
            $status = true;
            $message = "Operación realizada con exito.";
        }
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }
    private function elimina_equipos_ya_escogidos($array, $array2){
    // array = arra del arreglo final que trae la consulta
    // array2 = arreglo que llega por post de los equipos que hay en ese torneo
    // para borrar los equipos que ya se escogieron
        $arreglo_repetidos = array();
        for ($i=0; $i < count($array) ; $i++) { 
            for ($e=0; $e < count($array2) ; $e++) { 
                if($array[$i]->codteam == $array2[$e]->codteam){
                    array_push($arreglo_repetidos, $i);
                }
            }
        }
        for ($b=0; $b < count($arreglo_repetidos) ; $b++) { 
            $indice_eliminar = $arreglo_repetidos[$b];
            unset($array[$indice_eliminar]);
        }
    // end equipos que ya están escogidos
    return $array;//retorna el arreglo con los equipos que se pueden agregar
}
public function paginaEquipos() {
    $data["html"] = "";
    $data["message"] = "No se pudo realizar la acción.";
    $data["status"] = false;
    $pagina = $this->post("pag");
    if (is_numeric($pagina)) {
        $this->_view->setLayout("empty");
        $this->_view->assign("template", "listar_equipos_check");
        $this->_view->setOutput(false);
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $equipos_user = DAOFactory::getTournamentHasTeamDAO()->getAllTeams($this->_user->coduser);
        $total_equipos = count($equipos_user);
        $pj = new PaginatorJorge("pagina_equipos_check", $total_equipos, 18, $pagina);
        $htmlpaginator = $pj->getHtmlPaginator(true);
        $allequipos = DAOFactory::getTournamentHasTeamDAO()->getAllTeams($this->_user->coduser, $pj->inicio_limit, $pj->fin_limit);

        // arreglo limpiesito sin equipos ya agregados
        $teams_in_torneo = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($this->post('codigo_torneo'));
        $allequipos = $this->elimina_equipos_ya_escogidos($allequipos, $teams_in_torneo);

        $urlencode = new EncodeURL();
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('equipos', $allequipos);
        $data["html"] = $this->_view->renderizar();
        if (isset($data["html"])) {
            $data["message"] = "Operación realizada con éxito.";
            $data["status"] = true;
        }
    }
    $this->_view->_print($data);
}

public function removeteam() {
    if ($this->_request->isAjax()) {
        $code = $this->post('code');
        $code_tournament = $this->post('tournament');
        $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
        if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
            try {
                DAOFactory::getTournamentHasTeamDAO()->delete($code_tournament, $code);
                $this->endProcess("¡Se ha quitado el equipo del torneo!", true);
            } catch (Exception $exc) {
                $this->endProcess("Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.");
            }
        }
    }
}

public function search_equipos_check_agregar_a_torneo() {
    $data["html"] = "";
    $data["message"] = "No se pudo realizar la acción.";
    $data["status"] = false;
    $genero = $this->post("genero");
    $tipo = $this->post("tipo");
    $strequipo = $this->post("strequipo");
    $pagina = $this->post("pag");
    $gen = Team::validateGeneroNumber($genero);
    $this->_view->setLayout("empty");
    $this->_view->assign("template", "listar_equipos_check");
    $this->_view->setOutput(false);

    require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
    $equipos_user = DAOFactory::getUserHasTeamDAO()->getTeamsBuscador($this->_user->coduser, $strequipo, $gen, $tipo, null, null);
    $total_equipos = count($equipos_user);
    $pj = new PaginatorJorge("pagina_equipos_check", $total_equipos, 18, $pagina);
    $htmlpaginator = $pj->getHtmlPaginator(true);
    $allequipos = DAOFactory::getUserHasTeamDAO()->getTeamsBuscador($this->_user->coduser, $strequipo, $gen, $tipo, $pj->inicio_limit, $pj->fin_limit);
    $urlencode = new EncodeURL();

        // arreglo limpiesito sin equipos ya agregados
    $teams_in_torneo = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($this->post('codigo_torneo'));
    $allequipos = $this->elimina_equipos_ya_escogidos($allequipos, $teams_in_torneo);

    $this->_view->assign('htmlpaginator', $htmlpaginator);
    $this->_view->assign('urlencode', $urlencode);
    $this->_view->assign('equipos', $allequipos);
    $data["html"] = $this->_view->renderizar();
    if (isset($data["html"])) {
        $data["message"] = "Operación realizada con éxito.";
        $data["status"] = true;
    }
    $this->_view->_print($data);
}

//para los equipos del usuario en partidos públicos
public function getMyteams() {
    $urlencode = new EncodeURL();
    $allequipos = DAOFactory::getTournamentHasTeamDAO()->getMyTeams($this->_sesion->user->coduser);
    $message = "No se pudo realizar la acción.";
    $html = "";
    $status = false;
    $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();
    $this->_view->assign('urlencode', $urlencode);
    $this->_view->assign('types_futbol', $types_futbol);
    $this->_view->assign('equipos', $allequipos);
    $this->_view->setLayout('empty');
    $this->_view->setOutput(false);
    $html = $this->_view->renderizar('detalle_popup_asig_equipo');
    if ($html != "") {
        $status = true;
        $message = "Operación realizada con exito.";
    }
    $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
}

public function search_mis_equipos_check() {
    $data["html"] = "";
    $data["message"] = "No se pudo realizar la acción.";
    $data["status"] = false;

    $gen = $this->post("genero");
    $tipo_futbol = $this->post("tipo");
    $strequipo = $this->post("strequipo");
    $genero = Team::validateGeneroNumber($gen);
    $this->_view->setLayout("empty");
    $this->_view->assign("template", "listar_equipos_check");
    $this->_view->setOutput(false);
    $this->_user = $this->_sesion->user;
    $teams = DAOFactory::getTournamentHasTeamDAO()->getMyTeamsBuscador($strequipo, $genero, $tipo_futbol, 0, 18, $this->_user->coduser);

    $urlencode = new EncodeURL();
    $this->_view->assign('urlencode', $urlencode);
    $this->_view->assign('equipos', $teams);
    $data["html"] = $this->_view->renderizar();
    if (isset($data["html"])) {
        $data["message"] = "Operación realizada con éxito.";
        $data["status"] = true;
    }
    $this->_view->_print($data);
}
}
