<?php

class PartidosController extends Controller {

    /**
     *
     * @var Users 
     */
    private $user;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
        $this->user = $this->_sesion->user;
    }

    public function index() {
        $this->_view->setItems('only', array('partidos.css', 'partidos.js'));
        require_once APP_ROOT . '/controllers/class/PaginatorBootstrap.php';
        $total_partidos = DAOFactory::getGamesDAO()->getCountGamesByType(2);
        $pagina = new PaginatorBootstrap("paginator_games", $total_partidos, 6, 1);

        $htmlpaginator = $pagina->getHtmlPaginator(true);
        $games_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina->inicio_limit, $pagina->fin_limit, 2);
        $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();
        $games = $this->cargarDatos($games_info);
        $urlencode = new EncodeURL();
        $this->_view->assign('types_futbol', $types_futbol);
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('games', $games);
        $this->_view->renderizar();
    }

    private function cargarDatos($games_info) {
        for ($i = 0; $i < count($games_info); $i++) {
            $team = DAOFactory::getTeamDAO()->getInfoTeam($games_info[$i]->codteammanager);
            $path_attachment = DAOFactory::getTeamHasAttachmentDAO()->getPathAttachment($games_info[$i]->codteammanager);
            if (!isset($path_attachment)) {
                $teamLoad = DAOFactory::getTeamDAO()->load($games_info[$i]->codteammanager);
                $games_info[$i]->nameTeam = $teamLoad->name;
                $games_info[$i]->typeGenre = $teamLoad->type;
            } else {
                $games_info[$i]->nameTeam = $team->name;
                $games_info[$i]->pathTeam = $path_attachment[0]->path;
            }
        }
        return $games_info;
    }

    public function deatalleDelPartido($codGame = null) {
        $gameInfo = DAOFactory::getGamesDAO()->getByCodGame($codGame);
        $team = DAOFactory::getTeamDAO()->getInfoTeam($gameInfo[0]->codteammanager);
        $teamLocal = $gameInfo[0];
        $footballType = DAOFactory::getTeamHasVirtuesDAO()->getFootballType($gameInfo[0]->codteammanager);
        $path_attachment = DAOFactory::getTeamHasAttachmentDAO()->getPathAttachment($gameInfo[0]->codteammanager);

        $teamLocal->nameTeam = $team->name;
        $teamLocal->pathTeam = $path_attachment[0]->path;
        $teamLocal->typeGenre = $team->type;
        $teamLocal->name = $team->name;
        $teamLocal->footballType = $footballType->name;
        if (!isset($path_attachment)) {
            $teamLoad = DAOFactory::getTeamDAO()->load($gameInfo[0]->codteammanager);
            $teamLocal->nameTeam = $teamLoad->name;
            $teamLocal->typeGenre = $teamLoad->type;
            $teamLocal->name = $teamLoad->name;
        }
        $postulados = DAOFactory::getPostulategameDAO()->getByPostulate($codGame, 0, 0, 5);

        $postulado_confirmado = DAOFactory::getPostulategameDAO()->getByPostulate($codGame, 2, 0, 1);
        if (isset($postulado_confirmado)) {
            $teamRival = new stdClass();
            $teamRivalLoad = DAOFactory::getTeamDAO()->load($postulado_confirmado[0]->codteam);
            $footballType = DAOFactory::getTeamHasVirtuesDAO()->getFootballType($postulado_confirmado[0]->codteam);
            $path_attachment = DAOFactory::getTeamHasAttachmentDAO()->getPathAttachment($postulado_confirmado[0]->codteam);
            $teamRival->codteam = $postulado_confirmado[0]->codteam;
            $teamRival->nameTeam = $teamRivalLoad->name;
            $teamRival->typeGenre = $teamRivalLoad->type;
            $teamRival->footballType = $footballType->name;
            $teamRival->pathTeam = $path_attachment;
        }
        if (isset($teamRival)) {
            $this->_view->assign('teamRival', $teamRival);
        }

        $MyTeam = DAOFactory::getTeamDAO()->getIfMyTeam($this->_sesion->user->coduser, $gameInfo[0]->codteammanager);
        if (isset($MyTeam)) {
            $misPostulados = DAOFactory::getPostulategameDAO()->getByPostulate($codGame, 0, 0, 5, $this->_sesion->user->coduser);
            for ($i = 0; $i < count($postulados); $i++) {
                for ($e = 0; $e < count($misPostulados); $e++) {
                    if ($postulados[$i]->codteam === $misPostulados[$e]->codteam)
                        $postulados[$i]->isMyTeam = true;
                }
            }
        }

        $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();
        $urlencode = new EncodeURL();
        $this->_view->assign('postulados', $postulados);
        $this->_view->assign('types_futbol', $types_futbol);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('teamLocal', $teamLocal);
        $this->_view->renderizar('detalleDelPartido');
    }

    public function get_games() {
        $response["status"] = false;
        $response["message"] = "No se pudo realizar la acción.";
        $response["html"] = "";
        $pag = $this->post("pag");

        if (is_numeric($pag)) {
            require_once APP_ROOT . '/controllers/class/PaginatorBootstrap.php';
            $total_partidos = DAOFactory::getGamesDAO()->getCountGamesByType(2);
            $this->_view->assign('template', "listar_partidos");
            $this->_view->assign("verpaginator", true);
            $this->_view->assign("sololista", true);
            $pagina = new PaginatorBootstrap("paginator_games", $total_partidos, 6, $pag);

            $htmlpaginator = $pagina->getHtmlPaginator(true);
            $games_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina->inicio_limit, $pagina->fin_limit, 2);

            $games = $this->cargarDatos($games_info);

            $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();

            $this->_view->assign('types_futbol', $types_futbol);
            $this->_view->assign('games', $games);
            $this->_view->assign('htmlpaginator', $htmlpaginator);
            $this->_view->setLayout("empty");
            $this->_view->setOutput(false);

            $response["html"] = $this->_view->renderizar();
            if ($response["html"] != "") {
                $response["status"] = true;
                $response["message"] = "Operación exitosa";
            }
        }

        $this->_view->_print($response, true);
    }

    public function search_partidos() {
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $genero = $this->post("genero");
        $tipo = $this->post("tipo");
        $strequipo = $this->post("strequipo");
        $pagina = $this->post("pag");
        $gen = Team::validateGeneroNumber($genero);
        $this->_view->setLayout("empty");
        $this->_view->assign('template', "listar_partidos");
        $this->_view->assign("verpaginator", true);
        $this->_view->assign("sololista", true);
        $this->_view->setOutput(false);
        $total = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, null, null, true, 2);
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $pj = new PaginatorJorge("paginator_games", $total, 6, $pagina);
        $games_info = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, $pj->inicio_limit, $pj->fin_limit, false, 2);
        $games = $this->cargarDatos($games_info);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/partidos/");
        $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();

        $urlencode = new EncodeURL();
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('types_futbol', $types_futbol);
        $this->_view->assign('games', $games);
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $data["html"] = $this->_view->renderizar();
        if (isset($data["html"])) {
            $data["message"] = "Operación realizada con éxito.";
            $data["status"] = true;
        }
        $this->_view->_print($data);
    }

    public function postularEquipo() {
        $data['message'] = "No se pudo postular por favor inténtelo de nuevo.";
        $data['status'] = false;
        $cod_team = $this->post('cod_team');
        $cod_games = $this->post('cod_game');
        $existe = DAOFactory::getPostulategameDAO()->getExistPostulate($cod_games, $cod_team);

        if (!isset($existe)) {
            if (is_numeric($cod_team)) {
                $postulategame = new Postulategame();
                $postulategame->codteam = $cod_team;
                $postulategame->codgames = $cod_games;
                $id_postulate = DAOFactory::getPostulategameDAO()->insert($postulategame);
                if (is_numeric($id_postulate)) {
                    $data['message'] = "Ha sido postulado al partido exitosamente.";
                    $data['status'] = true;
                }
            }
        } else {
            $data['message'] = "Ya se encuentra postulado a este partido.";
        }
        $this->_view->_print($data);
    }

    public function deletePostulate() {
        $data['message'] = "No se pudo eliminar la postulación.";
        $data['status'] = false;
        $codpostulategame = $this->post('cod_postulate');

        $eliminado = DAOFactory::getPostulategameDAO()->delete($codpostulategame);
        if (isset($eliminado)) {
            $data['message'] = "Se ha eliminado la postulación al partido.";
            $data['status'] = true;
        }
        $this->_view->_print($data);
    }

    public function mis_partidos($strteam = null) {
        $team = $this->loadInfoEquipo($strteam);
        $cod_user = $this->_sesion->user->coduser;
        require_once APP_ROOT . '/controllers/class/PaginatorBootstrap.php';

        if (!isset($strteam)) {
            $total_partidos = DAOFactory::getGamesDAO()->getCountGamesByType(1, null, $cod_user);
        } else {
            $total_partidos = DAOFactory::getGamesDAO()->getCountGamesByType(1, $strteam);
        }
        $pagina = new PaginatorBootstrap("paginator_games", $total_partidos, 6, 1);

        $htmlpaginator = $pagina->getHtmlPaginator(true);
        $games_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina->inicio_limit, $pagina->fin_limit, 1, $cod_user, $strteam);
        $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();

        $games = $this->cargarDatos($games_info);

        if (!isset($strteam)) {
            $total_partidos_public = DAOFactory::getGamesDAO()->getCountGamesByType(2, null, $cod_user);
        } else {
            $total_partidos_public = DAOFactory::getGamesDAO()->getCountGamesByType(2, $strteam);
        }


        $pagina_public = new PaginatorBootstrap("paginator_games_public", $total_partidos_public, 6, 1);

        $htmlpaginator_public = $pagina_public->getHtmlPaginator(true);
        $games_public_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina_public->inicio_limit, $pagina_public->fin_limit, 2, $cod_user, $strteam);

        $gamesPublic = $this->cargarDatos($games_public_info);

        $urlencode = new EncodeURL();
        $this->_view->assign('types_futbol', $types_futbol);
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('htmlpaginator_public', $htmlpaginator_public);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('games', $games);
        $this->_view->assign('gamesPublic', $gamesPublic);
        $this->_view->assign('team', $team);
        $this->_view->assign('menu', true);
        $this->_view->assign('iscreator', true);
        $this->_view->renderizar(__FUNCTION__);
    }

    public function traer_reserva() {
        $cod_game = $this->post('cod_game');
        $reserva = DAOFactory::getGamesDAO()->getReserva($cod_game);
        $info = new stdClass();
        $user = DAOFactory::getUsersDAO()->getBasicInfo($reserva[0]->coduser);
        $info->Nombre = $user[0]->name . ' ' . $user[0]->lastname;
        if (isset($user[0]->phone)) {
            $info->Telefono = $user[0]->phone;
        }
        if (isset($user[0]->cellular)) {
            $info->Celular = $user[0]->cellular;
        }
        $info->Fecha_entrada = $reserva[0]->start;
        $info->Fecha_salida = $reserva[0]->end;
        $info->Valor = '$ '.$reserva[0]->amount;
        $info->Abona = '$ '.$reserva[0]->deposit;
        
        $info_reserva = Array();
        $info_reserva[0] = $info;
        $this->_view->_print($info_reserva, true);
    }

    /**
    * Va a la vista del partido que se desee
    *
    * Muestra la vista del partido con resumen de estadisticas por partido
    * e información adicional
    * @param string $cod_match codigo del partido
    */
    public function infoPartido($cod_match = null) {
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
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('match', $match);
        $this->_view->assign('statistics_local', $statistics_local);
        $this->_view->assign('statistics_visitant', $statistics_visitant);
        $this->_view->assign('team_local', $team_local);
        $this->_view->assign('team_visitant', $team_visitant);
        $this->_view->renderizar(__FUNCTION__);
    }

}
