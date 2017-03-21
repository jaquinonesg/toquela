<?php

class EquiposController extends Controller {

    /**
     *
     * @var Users 
     */
    private $user;

    public function __construct() {
        parent::__construct();
        // $this->validacionSession();
        $this->user = $this->_sesion->user;
    }

    private function loginSession() {
        $this->validacionSession();
        $this->user = $this->_sesion->user;
    }

    public function index() {
        $this->_view->setItems('only', array('equipos.css', 'equipos.js'));
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $total_equipos = DAOFactory::getTeamDAO()->getNumOfTeams();
        $pj = new PaginatorJorge("pagina_equipos", $total_equipos, 6);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/equipos/");
        if (isset($this->user->coduser)) {
            $teams = DAOFactory::getUserHasTeamDAO()->getAllTeamsHomeSession($this->user->coduser, $pj->inicio_limit, $pj->fin_limit);
        } else {
            $teams = DAOFactory::getUserHasTeamDAO()->getAllTeamsHome($pj->inicio_limit, $pj->fin_limit);
        }
        $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();
        $urlencode = new EncodeURL();
        $this->_view->assign('types_futbol', $types_futbol);
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('teams', $teams);

        $user = $this->_sesion->user;
        $this->_view->assign('user', $user);
        $this->_view->renderizar();
    }

    public function paginaequipos() {
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $pagina = $this->post("pag");
        if (is_numeric($pagina)) {
            $this->_view->setLayout("empty");
            $this->_view->assign("template", "listar_equipos");
            $this->_view->assign("verpaginator", true);
            $this->_view->assign("sololista", true);
            $this->_view->setOutput(false);
            require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
            $total_equipos = DAOFactory::getTeamDAO()->getNumOfTeams();
            $pj = new PaginatorJorge("pagina_equipos", $total_equipos, 6, $pagina);
            $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/equipos/");
            if (isset($this->user->coduser)) {
                $teams = DAOFactory::getUserHasTeamDAO()->getAllTeamsHomeSession($this->user->coduser, $pj->inicio_limit, $pj->fin_limit);
            } else {
                $teams = DAOFactory::getUserHasTeamDAO()->getAllTeamsHome($pj->inicio_limit, $pj->fin_limit);
            }
            $urlencode = new EncodeURL();
            $this->_view->assign('urlencode', $urlencode);
            $this->_view->assign('htmlpaginator', $htmlpaginator);
            $this->_view->assign('teams', $teams);
            $data["html"] = $this->_view->renderizar();
            if (isset($data["html"])) {
                $data["message"] = "Operación realizada con éxito.";
                $data["status"] = true;
            }
        }
        $this->_view->_print($data);
    }

    public function search_equipos() {
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $genero = $this->post("genero");
        $tipo = $this->post("tipo");
        $strequipo = $this->post("strequipo");
        $pagina = $this->post("pag");
        $gen = Team::validateGeneroNumber($genero);
        $this->_view->setLayout("empty");
        $this->_view->assign("template", "listar_equipos");
        $this->_view->assign("verpaginator", true);
        $this->_view->assign("sololista", true);
        $this->_view->setOutput(false);
        $total = DAOFactory::getUserHasTeamDAO()->getTeamsBuscador($this->user->coduser, $strequipo, $gen, $tipo, null, null, true);
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $pj = new PaginatorJorge("pagina_equipos", $total, 6, $pagina);
        $teams = DAOFactory::getUserHasTeamDAO()->getTeamsBuscador($this->user->coduser, $strequipo, $gen, $tipo, $pj->inicio_limit, $pj->fin_limit);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/equipos/");
        $urlencode = new EncodeURL();
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('teams', $teams);
        $data["html"] = $this->_view->renderizar();
        if (isset($data["html"])) {
            $data["message"] = "Operación realizada con éxito.";
            $data["status"] = true;
        }
        $this->_view->_print($data);
    }

    public function crearequipo() {
        $this->loginSession();
        $this->_view->setItems('only', array('crear_equipo.js', 'crear_equipo.css', 'jugadores.css'));
        $cities = DAOFactory::getCityDAO()->queryAll();
        $this->_view->assign('cities', $cities);
        $teams = DAOFactory::getUserHasTeamDAO()->getTeamsCreated($this->user->coduser);
        if (!is_null($teams)) {
            foreach ($teams as $i => $team) {
                $team->url = $team->codteam . "-" . Util::encodeStringToUrl($team->name);
                $teams[$i] = $team;
            }
        }
        $this->_view->assign('teams', $teams);

        $types = DAOFactory::getVirtuesDAO()->getTypesGame();
        $this->_view->assign('types', $types);

        $this->_view->renderizar(__FUNCTION__);
    }

    public function createteam() {
        if ($this->_request->isAjax()) {
            $name = $this->post('name');
            $gender = strtolower($this->post('gender'));
            $description = $this->post('description');
            $typefutbol = $this->post('type');
            $codlocality = '178';//esta es la localidad ninguna

            if (!empty($name) && !empty($gender) && is_numeric($typefutbol)) {
                $team = new Team();
                $team->name = $name;
                $team->description = $description;
                $team->codlocality = $codlocality;
                $genders = array('femenino' => 'FEMALE', 'masculino' => 'MALE', 'mixto' => 'MIXED');
                if (in_array($gender, array_keys($genders))) {
                    $team->type = $genders[$gender];
                    try {
                        $team->codteam = DAOFactory::getTeamDAO()->insert($team);
                        $dto = new TeamHasVirtues();
                        $dto->codteam = $team->codteam;
                        $dto->codvirtues = $typefutbol;
                        DAOFactory::getTeamHasVirtuesDAO()->insert($dto);

                        $dtoUser = new UserHasTeam();
                        $dtoUser->codteam = $team->codteam;
                        $dtoUser->coduser = $this->user->coduser;
                        $dtoUser->status = 'CAPTAIN';
                        DAOFactory::getUserHasTeamDAO()->insert($dtoUser);

                        $this->endProcess("Se ha creado el equipo correctamente.", true);
                    } catch (Exception $ex) {
                        $this->endProcess("Ha ocurrido un error al intentar crear el equipo, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("Surgió  un error, el género del equipo es inválido.");
                }
            } else {
                $this->endProcess("Surgió un error, los datos no se enviaron correctamente, por favor inténtelo de nuevo.");
            }
        }
    }

    public function endProcess($message, $status = false) {
        $this->_view->_print(array('message' => $message, 'status' => $status));
        exit();
    }

    public function editarequipo($strteam = null) {
        $this->loginSession();
        $team = $this->loadInfoEquipo($strteam);
        if (is_null($team)) {
            $this->redireccionar();
        }
        $photos = DAOFactory::getTeamHasAttachmentDAO()->getAttachments($team->codteam);
        $this->_view->assign('attachments', $photos);
        $ph_principal = new stdClass(); 
        for ($i=0; $i <count($photos) ; $i++) { 
            if($photos[$i]->status == 1){
               $ph_principal = $photos[$i];
           }
        }
        $this->_view->assign('ph_principal', $ph_principal);
        $this->isMyTeam($team->codteam);
        if (DAOFactory::getUserHasTeamDAO()->isCreator($team->codteam, $this->user->coduser)) {
            $cities = DAOFactory::getCityDAO()->queryAll();
            $this->_view->assign('cities', $cities);

            $city = DAOFactory::getLocalityDAO()->getCity($team->codlocality);
            $this->_view->assign('current_city', $city);

            $type_current = DAOFactory::getTeamDAO()->getUnitGame($team->codteam);
            $this->_view->assign('type_current', $type_current);

            $types = DAOFactory::getVirtuesDAO()->getTypesGame();
            $this->_view->assign('types', $types);

            $players = DAOFactory::getUserHasTeamDAO()->getPlayers($team->codteam);
            $this->_view->assign('players', $players);

            $captain = DAOFactory::getUserHasTeamDAO()->getCaptainByTeam($team->codteam);

            if (!is_null($captain)) {
                $this->_view->assign('captain', DAOFactory::getUsersDAO()->load($captain->coduser));
            }
            $this->_view->assign('menu', true);
            $this->_view->assign('team', $team);
            $this->_view->assign('iscreator', true);
            $user = $this->_sesion->user;
            $this->_view->assign('user', $user);
            $this->_view->renderizar(__FUNCTION__);
        } else {
            $this->_view->assign('menu', true);
            $this->_view->assign('iscreator', false);
            $user = $this->_sesion->user;
            $this->_view->assign('user', $user);
            $this->_view->renderizar(__FUNCTION__);
        }
    }

    public function escogerFotoPerfil() {
        $data['message'] = 'No se pudo realizar la acción';
        $data['status'] = false;
        $cod_attachment =  $this->post('codattachment');
        $cod_team = $this->post('codteam');
        
        $attachments = DAOFactory::getTeamHasAttachmentDAO()->getAttachments($cod_team);
        // primero pongo las fotos en estado 0
            $teamHasAttachmentActual  = new TeamHasAttachment();
        for ($i=0; $i < count($attachments); $i++) { 
            $teamHasAttachmentActual->codattachment = $attachments[$i]->codattachment;
            $teamHasAttachmentActual->codteam = $cod_team;
            $teamHasAttachmentActual->status = 0;
            DAOFactory::getTeamHasAttachmentDAO()->update($teamHasAttachmentActual);
        }
        // y luego pongo en estado 1 la que escogio
        $teamHasAttachment  = new TeamHasAttachment();
        $teamHasAttachment->codattachment = $cod_attachment;
        $teamHasAttachment->codteam = $cod_team;
        $teamHasAttachment->status = 1;
        $pasa = DAOFactory::getTeamHasAttachmentDAO()->update($teamHasAttachment);
        if($pasa){
            $data['message'] = 'Se ha escogido la foto principal del equipo.';
            $data['status'] = true;
        }
        $this->_view->_print($data, true);
    }

    public function updateteam() {
        if ($this->_request->isAjax()) {
            $name = $this->post('name');
            $gender = strtolower($this->post('gender'));
            $locality = $this->post('locality');
            $description = $this->post('description');
            $typefutbol = $this->post('type');
            $code = $this->post('code');
            $object = DAOFactory::getTeamDAO()->load($code);
            if (!empty($name) && !empty($gender) && !empty($locality) && !empty($description) && is_numeric($typefutbol) && is_object($object)) {
                if (DAOFactory::getUserHasTeamDAO()->isCreator($code, $this->user->coduser)) {
                    $team = new Team();
                    $team->description = $description;
                    $team->codlocality = $locality;
                    $team->name = $name;
                    $team->codteam = $code;
                    $genders = array('femenino' => 'FEMALE', 'masculino' => 'MALE', 'mixto' => 'MIXED');
                    if (in_array($gender, array_keys($genders))) {
                        $team->type = $genders[$gender];
                        try {
                            DAOFactory::getTeamDAO()->update($team);
                            DAOFactory::getTeamHasVirtuesDAO()->deleteByTeam($code);
                            $dto = new TeamHasVirtues();
                            $dto->codteam = $code;
                            $dto->codvirtues = $typefutbol;
                            DAOFactory::getTeamHasVirtuesDAO()->insert($dto);
                            $this->endProcess("Se ha actualizado el equipo correctamente.", true);
                        } catch (Exception $ex) {
                            $this->endProcess("Ha ocurrido un error al intentar actualizar el equipo, por favor vuelva a intentarlo.");
                        }
                    } else {
                        $this->endProcess("Error en la validación, el genero del equipo es invalido.");
                    }
                } else {
                    $this->endProcess("No tiene los privilegios necesarios para actualizar el equipo.");
                }
            } else {
                $this->endProcess("Error en la validación, por favor vuelva a intentarlo.");
            }
        }
    }

    /** Mustra todo los jugadores y personas postlada de un equipo 
     * solo el creador puede ver la seccion      * 
     * @param type $strteam
     */
    public function jugadores($strteam) {
        $this->loginSession();
        $this->_view->setItems('only', array('jugadores.js', 'jugadores.css'));

        $item_team = explode('-', $strteam);
        $codteam = (int) array_shift($item_team);
        if ($codteam == '')
            $codteam = 0;

        $team = DAOFactory::getTeamDAO()->load($codteam);
        if (!is_null($team)) {
            $team->url = $team->codteam . "-" . Util::encodeStringToUrl($team->name);
            $iscreator = DAOFactory::getUserHasTeamDAO()->isCreatorTeam($team->codteam, $this->_sesion->user->coduser);
            if ($iscreator === true) {
                $players = DAOFactory::getUserHasTeamDAO()->getPlayers($team->codteam);
                if (count($players) > 0) {
                    foreach ($players as $i => $player) {
                        $player->url = $player->coduser . "-" . Util::encodeStringToUrl($player->username);
                        $player->levelgame = DAOFactory::getUserHasVirtuesDAO()->getLevelGame($player->coduser);
                        $player->positiongame = DAOFactory::getUserHasVirtuesDAO()->getFavoritePostionGame($player->coduser);
                        $player->image = DAOFactory::getUserHasAttachmentDAO()->getPhotProfileUser($player->coduser);
                        $players[$i] = $player;
                    }
                }
                $postulants = DAOFactory::getUserHasTeamDAO()->getPostulants($team->codteam);
                if (count($postulants) > 0) {
                    foreach ($postulants as $i => $player) {
                        $player->url = $player->coduser . "-" . Util::encodeStringToUrl($player->username);
                        $player->levelgame = DAOFactory::getUserHasVirtuesDAO()->getLevelGame($player->coduser);
                        $player->positiongame = DAOFactory::getUserHasVirtuesDAO()->getFavoritePostionGame($player->coduser);
                        $player->image = DAOFactory::getUserHasAttachmentDAO()->getPhotProfileUser($player->coduser);
                        $postulants[$i] = $player;
                    }
                }
            } else {
                die('usted no puede ver esta sección ');
            }
        } else {
            die('el equipo no existe');
        }
        $this->_view->assign('players', $players);
        $this->_view->assign('team', $team);
        $this->_view->assign('postulants', $postulants);
        $this->_view->renderizar(__FUNCTION__);
    }

    /**
     * verificar que el euqipo que envie sea correspondiente con el nombre del euqipo
     * verificar que
      *el suario que este logueado sea el capital o el creador del equipo
      *que el jugador que se este aceptadaon o rechazando este en la tabla
      *y que en los prarmetros existan la rtelaciuon necesario entre su id y su string
     * @param type $strteam
     * @param type $strplayer
     */
    public function judgment($strteam, $strplayer) {
        $this->loginSession();
        $headers = (object) getallheaders();
        $item_team = explode('-', $strteam);
        $codteam = (int) array_shift($item_team);
        if ($codteam == '')
            $codteam = 0;

        $team = DAOFactory::getTeamDAO()->load($codteam);
        if (!is_null($team)) {
            if ($item_team[0] == Util::encodeStringToUrl($team->name)) {
                $iscreator = DAOFactory::getUserHasTeamDAO()->isCreatorTeam($team->codteam, $this->_sesion->user->coduser);
                if ($iscreator === true) {
                    $item_user = explode('-', $strplayer);
                    $coduser = (int) array_shift($item_user);
                    if ($coduser == '')
                        $coduser = 0;
                    $postulant = DAOFactory::getUsersDAO()->load($coduser);
                    if (!is_null($postulant)) {
                        if ((string) $item_user[0] == (string) Util::encodeStringToUrl($postulant->username)) {
                            $ispostulant = DAOFactory::getUserHasTeamDAO()->isPostulant($team->codteam, $postulant->coduser);
                            if ($ispostulant === true) {
                                $request = $this->post('request');
                                switch ($request) {
                                    case 'accept':
                                    $userhasteam = new UserHasTeam;
                                    $userhasteam->codteam = $team->codteam;
                                    $userhasteam->coduser = $postulant->coduser;
                                    $userhasteam->status = UserHasTeam::PLAYER;
                                    DAOFactory::getUserHasTeamDAO()->update($userhasteam);
                                    header('Location: ' . $headers->Referer);
                                    echo "aceptando.....";
                                    break;
                                    case 'refuse':
                                    DAOFactory::getUserHasTeamDAO()->delete($postulant->coduser, $team->codteam);
                                    header('Location: ' . $headers->Referer);
                                    echo "negando.....";
                                    break;
                                }
                            } else {
                                echo "el jugador no está postulado ";
                            }
                        } else {
                            echo "El jugador no existe ";
                        }
                    } else {
                        echo "El jugador no existe ";
                    }
                } else {
                    echo "Usted no pude hacer esta acción";
                }
            } else {
                echo('El equipo no existe ');
            }
        } else {
            echo('El equipo no existe ');
        }
    }

    public function misequipos() {
        $this->loginSession();
        $this->_view->setItems('only', array('jugadores.js', 'jugadores.css'));
        $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByUser($this->_sesion->user->coduser);
        $urlencode = new EncodeURL();
        $this->_view->assign('menu', true);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('teams', $teams);
        $this->_view->renderizar(__FUNCTION__);
    }

    public function searchuser() {
        if ($this->_request->isAjax()) {
            $term = $this->get('term');
            if (!empty($term)) {
                $players = DAOFactory::getUsersDAO()->getAutocompleteUsers($term);
            }
            $this->_view->_print($players);
        }
    }

    public function addplayer() {
        $this->loginSession();
        if ($this->_request->isAjax()) {
            $code_user = $this->post('code');
            $code_team = $this->post('team');
            $daoUsers = DAOFactory::getUsersDAO();
            $player = $daoUsers->load($code_user);
            $daoTeam = DAOFactory::getTeamDAO();
            $team = $daoTeam->load($code_team);
            if (is_object($player) && !empty($player) && is_object($team)) {

                if (DAOFactory::getUserHasTeamDAO()->isCreator($code_team, $this->user->coduser)) {
                    $dto = new UserHasTeam();
                    $dto->codteam = $code_team;
                    $dto->coduser = $code_user;
                    $dto->status = "PLAYER";

                    $res = DAOFactory::getUserHasTeamDAO()->load($code_user, $code_team);
                    if (!is_object($res)) {
                        try {
                            DAOFactory::getUserHasTeamDAO()->insert($dto);
                            $this->endProcess("Se ha agregado al usuario al equipo.");
                        } catch (Exception $ex) {
                            $this->endProcess("Ha ocurrido un error al intentar agregar un jugador al equipo, por favor vuelva a intentarlo.");
                        }
                    } else {
                        $this->endProcess("El usuario ya se encuentra inscrito al equipo.");
                    }
                } else {
                    $this->endProcess("Solo el creador o capitan del equipo pueden agregar mas jugadores.");
                }
            } else {
                $this->endProcess("Ha ocurrido un error en la validación de los datos, por favor vuelva a intentarlo.");
            }
        }
    }

    public function removeuserteam() {
        $this->loginSession();
        if ($this->_request->isAjax()) {
            $code_user = $this->post('user');
            $code_team = $this->post('team');
            $daoUsers = DAOFactory::getUsersDAO();
            $player = $daoUsers->load($code_user);
            $daoTeam = DAOFactory::getTeamDAO();
            $team = $daoTeam->load($code_team);

            if (is_object($player) && !empty($player) && is_object($team)) {
                if (DAOFactory::getUserHasTeamDAO()->isCreator($code_team, $this->user->coduser)) {
                    try {
                        DAOFactory::getUserHasTeamDAO()->delete($code_user, $code_team);
                        $this->endProcess("Se ha eliminado el usuario del equipo.", true);
                    } catch (Exception $ex) {
                        $this->endProcess("Ha ocurrido un error al intentar eliminar un jugador al equipo, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("Solo el creador o capitan del equipo pueden eliminar jugadores.");
                }
            } else {
                $this->endProcess("Ha ocurrido un error en la validación de los datos, por favor vuelva a intentarlo.");
            }
        }
    }

    public function aceptarjugador() {
        $this->loginSession();
        if ($this->_request->isAjax()) {
            $code_user = $this->post('user');
            $code_team = $this->post('team');
            $player = DAOFactory::getUsersDAO()->load($code_user);
            $team = DAOFactory::getTeamDAO()->load($code_team);
            if (is_object($player) && !empty($player) && is_object($team)) {
                if (DAOFactory::getUserHasTeamDAO()->isCreator($code_team, $this->user->coduser)) {
                    try {
                        $res = DAOFactory::getUserHasTeamDAO()->load($code_user, $code_team);
                        $res->status = UserHasTeam::STATUS_PLAYER;
                        $numaffects = DAOFactory::getUserHasTeamDAO()->update($res);
                        if ($numaffects > 0) {
                            $this->endProcess("El jugador ha sido agregado al equipo.", true);
                        } else {
                            $this->endProcess("Ha ocurrido un error al agregar el jugador al equipo, por favor vuelva a intentarlo.");
                        }
                    } catch (Exception $ex) {
                        $this->endProcess("Ha ocurrido un error al agregar el jugador al equipo, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("Solo el creador o capitan del equipo pueden eliminar jugadores.");
                }
            } else {
                $this->endProcess("Ha ocurrido un error en la validación de los datos, por favor vuelva a intentarlo.");
            }
        }
    }

    public function rechazarjugador() {
        $this->loginSession();
        if ($this->_request->isAjax()) {
            $code_user = $this->post('user');
            $code_team = $this->post('team');
            $player = DAOFactory::getUsersDAO()->load($code_user);
            $team = DAOFactory::getTeamDAO()->load($code_team);
            if (is_object($player) && !empty($player) && is_object($team)) {
                if (DAOFactory::getUserHasTeamDAO()->isCreator($code_team, $this->user->coduser)) {
                    try {
                        DAOFactory::getUserHasTeamDAO()->delete($code_user, $code_team);
                        $this->endProcess("El jugador ha sido rechazado correctamente.", true);
                    } catch (Exception $ex) {
                        $this->endProcess("Ha ocurrido un error al intentar rechazar el jugador, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("Solo el creador o capitan del equipo pueden eliminar jugadores.");
                }
            } else {
                $this->endProcess("Ha ocurrido un error en la validación de los datos, por favor vuelva a intentarlo.");
            }
        }
    }

    private function loadInfoEquipo($strteam = null) {
        if (is_null($strteam)) {
            $this->redireccionar();
        }
        $item_team = explode('-', $strteam);
        $codteam = (int) array_shift($item_team);
        if ($codteam == '') {
            $codteam = 0;
        }
        $team = DAOFactory::getTeamDAO()->load($codteam);
        if (is_null($codteam)) {
            $this->redireccionar();
        }
        $team->locality = DAOFactory::getLocalityDAO()->load($team->codlocality);
        $team->url = $team->codteam . "-" . Util::encodeStringToUrl($team->name);
        $type = DAOFactory::getTeamHasVirtuesDAO()->getFootballType($team->codteam);
        $postula = true;
        $photos = DAOFactory::getTeamHasAttachmentDAO()->getAttachments($team->codteam);
        $this->_view->assign('attachments', $photos);
        if (DAOFactory::getUserHasTeamDAO()->isTeam($team->codteam, $this->user->coduser)) {
            $postula = false;
            $msg_team = DAOFactory::getTeamDAO()->getMessagesTeam($team->codteam);
            $this->_view->assign('msg_team', $msg_team);
            $validate_user_team = DAOFactory::getTeamDAO()->validateUserHasTeam($team->codteam, $this->user->coduser);
            $this->_view->assign('validate_user_hasteam', $validate_user_team);
        }
        $this->_view->assign('team', $team);
        $this->_view->assign('postula', $postula);
        $this->_view->assign('type', $type);
        return $team;
    }

    public function perfilequipo($strteam = null) {
        require_once APP_ROOT . '/controllers/class/renderFecha.php';
        $renderfecha = new renderFecha();
        $this->_view->assign('renderfecha', $renderfecha);
        $this->_view->setItems('only', array('crear_equipo.js', 'perfilequipo.js', 'crear_equipo.css', 'jugadores.css'));
        $team = $this->loadInfoEquipo($strteam);
        $players = DAOFactory::getUserHasTeamDAO()->getPlayersPerfil($team->codteam);
        $type = DAOFactory::getTeamHasVirtuesDAO()->getFootballType($team->codteam);
        $this->isMyTeam($team->codteam);
        $this->_view->assign('players', $players);
        $this->_view->assign('type', $type);
        if (DAOFactory::getUserHasTeamDAO()->isCreator($team->codteam, $this->user->coduser)) {
            $this->_view->assign('iscreator', true);
        }
        /**
         * PARA CARGAR LA IMAGEN PRINCIPAL DEL EQUIPO
         */
        $photos = DAOFactory::getTeamHasAttachmentDAO()->getAttachments($team->codteam);
        $this->_view->assign('attachments', $photos);
        $ph_principal = new stdClass(); 
        for ($i=0; $i <count($photos) ; $i++) { 
            if($photos[$i]->status == 1){
               $ph_principal = $photos[$i];
           }
        }
        $this->_view->assign('ph_principal', $ph_principal);
        /**
         * fin
         */
        $user = $this->_sesion->user;
        $this->_view->assign('user', $user);
        $this->_view->renderizar(__FUNCTION__);
    }

    public function contrincantes($cod_tournament = null) {
        if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament)) {
                $this->_view->assign('tournament', $tournament);
                $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournament($cod_tournament);
                $this->_view->assign('teams', $teams);
                $num_players = DAOFactory::getUsersDAO()->getNumPlayersInTeams();
                $num_teams = DAOFactory::getTeamDAO()->getNumOfTeams();
                $this->_view->setTitle("Participantes Torneo");
                $this->_view->setItems("only", array('torneo.css', 'participantes.css'));
                $this->_view->assign('menu_item', 2);
                $this->_view->assign('num_players', $num_players);
                $this->_view->assign('num_teams', $num_teams);
                $this->_view->renderizar("participantes");
            }
        }
    }

    public function postularJugador() {
        $data['mensaje'] = "No se pudo realizar la postulación, por favor vuélvalo a intentar.";
        $data['retorno'] = false;
        if (is_numeric($_POST['team'])) {
            $obj_user_team = new UserHasTeam();
            $obj_user_team->codteam = $_POST['team'];
            $obj_user_team->coduser = $this->user->coduser;
            $obj_user_team->status = UserHasTeam::STATUS_POSTULANT;
            DAOFactory::getUserHasTeamDAO()->insert($obj_user_team);
            $data['mensaje'] = "Ha sido postulado al equipo exitosamente.";
            $data['retorno'] = true;
        }
        $this->_view->_print($data, true);
    }

    public function email() {
        if ($this->_request->isAjax()) {


            $your_name = $this->post('your_name');
            $your_email = $this->post('your_email');
            $emails = $this->post('emails');
            $subject = $this->post('subject');
            $message = $this->post('message');

            if (!empty($your_name) && !empty($your_email) && !empty($emails) && !empty($subject) && !empty($message)) {
                $this->getLibrary("mailing/correo.class");
                $mail = new Correo();
                $mail->agregarCorreos($emails, false);
                $mail->setAsunto($subject);
                $this->_view->assign('your_name', $your_name);
                $this->_view->assign('message', $message);
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $text = $this->_view->renderizar('mail');
                $mail->setMensaje($text);
                $mail->enviar();

                $this->_view->_print(array('message' => $mail->xmlt));
            }
        }
    }

    public function inscription() {
        $this->loginSession();
        if ($this->_request->isAjax()) {

            $code_team = $this->post('team');

            $team = DAOFactory::getTeamDAO()->load($code_team);

            if (is_object($team)) {
                $res = DAOFactory::getUserHasTeamDAO()->load($this->user->coduser, $code_team);

                if (!is_object($res)) {
                    $dto = new UserHasTeam();
                    $dto->codteam = $code_team;
                    $dto->coduser = $this->user->coduser;
                    $dto->status = "POSTULANT";

                    try {
                        DAOFactory::getUserHasTeamDAO()->insert($dto);
                        $this->endProcess("Se ha agregado al usuario al equipo.", true);
                    } catch (Exception $ex) {
                        $this->endProcess("Ha ocurrido un error al intentar agregar un jugador al equipo, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("Ya se ha hecho la solicitud para integrarse al equipo.");
                }
            }
        }
    }

    public function postulados($cod_team) {
        $this->loginSession();
        $validation = DAOFactory::getUserHasTeamDAO()->isCreator($cod_team, $this->user->coduser);

        if ($validation) {
            $postulants = DAOFactory::getUserHasTeamDAO()->getPostulants($cod_team);
            $this->_view->assign('postulants', $postulants);

            $this->_view->renderizar(__FUNCTION__);
        } else {
            die('Acceso no permitido.');
        }
    }

    public function selectcaptain() {
        if ($this->_request->isAjax()) {
            $code_team = $this->post('team');
            $code_user = $this->post('user');

            //comprobar que el usuario si pertenezca al equipo

            $obj = DAOFactory::getUserHasTeamDAO()->load($code_user, $code_team);

            if (is_object($obj)) {
                $res = DAOFactory::getUserHasTeamDAO()->getCaptainByTeam($code_team);
                if (!is_null($res) && (($res->status == UserHasTeam::STATUS_CAPTAIN) || ($res->status == UserHasTeam::STATUS_CREATOR))) { //ya existe capitan
                    $dtoUpd = new UserHasTeam();
                    $dtoUpd->codteam = $code_team;
                    $dtoUpd->coduser = $res->coduser;
                    $dtoUpd->status = 'PLAYER';
                    $this->updateStatusCaptain($dtoUpd);
                }
                $dto = new UserHasTeam();
                $dto->codteam = $code_team;
                $dto->coduser = $code_user;
                $dto->status = 'CAPTAIN';
                $this->updateStatusCaptain($dto);
                $this->endProcess("Se ha actualizado el capitan.", true);
            } else {
                $this->endProcess("El jugador no pertenece al equipo.");
            }
        }
    }

    private function updateStatusCaptain($dto) {
        try {
            DAOFactory::getUserHasTeamDAO()->update($dto);
        } catch (Exception $exc) {
            $this->endProcess("Ha ocurrido un error al establecer el capitan.");
        }
    }

    public function removecaptain() {
        if ($this->_request->isAjax()) {
            $code_team = $this->post('team');
            $code_user = $this->post('user');

            //comprobar que el usuario si pertenezca al equipo

            $obj = DAOFactory::getUserHasTeamDAO()->load($code_user, $code_team);

            if (is_object($obj)) {
                $res = DAOFactory::getUserHasTeamDAO()->getCaptainByTeam($code_team);

                if (!is_null($res) && $res->status != 'CREATOR') { //ya existe capitan
                    $dtoUpd = new UserHasTeam();
                    $dtoUpd->codteam = $code_team;
                    $dtoUpd->coduser = $res->coduser;
                    $dtoUpd->status = 'PLAYER';
                    $this->updateStatusCaptain($dtoUpd);
                }
                $this->endProcess("Se ha quitado al jugador de ser el capitan del equipo.", true);
            } else {
                $this->endProcess("El jugador no pertenece al equipo.");
            }
        }
    }

    public function estadistica($strteam = null) {
        $team = $this->loadInfoEquipo($strteam);
        if (isset($team)) {
            $statistics = DAOFactory::getTeamDAO()->getAllStatisticsByTeam($team->codteam);
            $partidos = DAOFactory::getTeamDAO()->getInfoMatchesTeam($team->codteam);
            $torneos = DAOFactory::getTeamDAO()->getTournamentsByTeamPlayed($team->codteam);
            $this->_view->assign('torneos', $torneos);
            $this->_view->assign('partidos', $partidos);
            $this->_view->assign('statistics', $statistics);
            $team->locality = DAOFactory::getLocalityDAO()->load($team->codlocality);
            $team->url = $team->codteam . "-" . Util::encodeStringToUrl($team->name);
            if (DAOFactory::getUserHasTeamDAO()->isCreator($team->codteam, $this->user->coduser)) {
                $this->_view->assign('iscreator', true);
            }
            /**
             * PARA CARGAR LA IMAGEN PRINCIPAL DEL EQUIPO
             */
            $photos = DAOFactory::getTeamHasAttachmentDAO()->getAttachments($team->codteam);
            $this->_view->assign('attachments', $photos);
            $ph_principal = new stdClass(); 
            for ($i=0; $i <count($photos) ; $i++) { 
                if($photos[$i]->status == 1){
                   $ph_principal = $photos[$i];
               }
            }
            $this->_view->assign('ph_principal', $ph_principal);
            /**
             * fin
             */
            $this->isMyTeam($team->codteam);
            $this->_view->renderizar("estadisticas_equipo");
        } else {
            $this->redireccionar();
        }
    }

    public function estadisticastorneo() {
        if ($this->_request->isAjax()) {
            $cod_team = $this->post('team');
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $torneos = DAOFactory::getTeamDAO()->getTorneosPartidosPorEquipo($cod_team);
            $this->_view->assign('torneos', $torneos);
            $this->_view->assign('template', 'listar_torneos_partidos');
            //$this->_view->assign('rounds', $rounds);
            $html = $this->_view->renderizar();
            $this->_view->_print(array('html' => $html));
        }
    }

    public function sendmessageteam() {
        $mensaje = Controller::post('msg');
        $asunto = Controller::post('asunto');
        $team = Controller::post('team_to');
        $cod_user = $this->_sesion->user->coduser;
        $obj = new Message();

        $obj->text = $mensaje;
        $obj->subject = $asunto;
        $this->date;
        $obj->viewed = 0;
        $obj->state = 0;
        $obj->from = $cod_user;
        $obj->to = 'NULL';
        if (is_numeric($team)) {
            $obj->codteam = $team;
        } else {
            $obj->codteam = 'NULL';
        }
        $sendmessageteam = DAOFactory::getTeamDAO()->inserttmsgteam($obj);
    }

    public function deletemsgteam() {
        $cod_message = $this->post('cod_elimi_message');
        $message = "No se pudo realizar la acción.";
        $status = false;
        $affets = DAOFactory::getMessageDAO()->delete($cod_message);
        if ($affets > 0) {
            $status = true;
            $message = "Operación realizada con exito.";
        }
        $this->_view->_print(array('status' => $status, 'message' => $message), true);
    }

    public function createMatch() {
        $response['message'] = 'no se pudo realizar la acción';
        $response['status'] = false;

        $team_local = rawurldecode($this->post('team_local'));
        $str_teams_rival = $this->post('str_teams_rival');
        $teams_rivals = explode(",", $str_teams_rival);
        $fechayhora = $this->post('fechayhora');
        $fecha = $this->post('fecha');
        $hora = $this->post('hora');
        $descripcion = $this->post('descripcion');
//        $complejo = $this->post('complejo');
        $type_of_match = $this->post('type_of_match');
        $cod_user = $this->_sesion->user->coduser;

        $match = new Match();
        $match->date = $fecha;
        $match->hour = $hora;
        $match->round = 1;
        $match->codcomplex = null;
        $match->teamlocal = $team_local;
        $match->teamvisitant = null;
        $match->description = $descripcion;
        $match->state = 1;

        $id_match = DAOFactory::getMatchDAO()->insertMatch($match);
        if (is_numeric($id_match)) {
            $games = new Games();
            $games->datetimegame = $fechayhora;
            $games->description = $descripcion;
            $games->type = $type_of_match;
            $games->codcomplex = null;
            $games->codteammanager = $team_local;
            $games->codusermanager = $cod_user;
            $games->codmatch = $id_match;
            $id_game = DAOFactory::getGamesDAO()->insertWithDatetime($games);
            if (is_numeric($id_game)) {
                $response['message'] = 'Se ha guardado la configuración del partido.';
                $response['codgame'] = $id_game;
                $response['status'] = true;
                if ($str_teams_rival != "") {
                    $postulategame = new Postulategame();
                    $postulategame->codgames = $id_game;
                    for ($i = 0; $i < count($teams_rivals); $i++) {
                        $postulategame->codteam = $teams_rivals[$i];
                        $id_postulate = DAOFactory::getPostulategameDAO()->insertWithCodGame($postulategame);
                        if (is_numeric($id_postulate)) {
                            $response['message'] = 'Se ha guardado la configuración del partido privado.';
                            $response['codgame'] = $id_game;
                            $response['status'] = true;
                        }
                    }
                }
                $this->_view->_print($response, true);
            }
        }
    }

    public function updateMatch() {
        $response['message'] = 'no se pudo realizar la acción';
        $response['status'] = false;

        $cod_match = DAOFactory::getGamesDAO()->getByCodMatch($this->post('cod_game_reserve'));
        $match = new Match();
        $match->codmatch = $cod_match[0]->codmatch;
        $match->date = $this->post('fecha');
        $match->hour = $this->post('hora');
        $match->description = $this->post('descripcion');

        $games = new Games();
        $games->codgames = $this->post('cod_game_reserve');
        $games->datetimegame = $this->post('fechayhora');
        $games->description = $this->post('descripcion');

        $pasa1 = DAOFactory::getGamesDAO()->update($games);
        if ($pasa1) {
            $pasa2 = DAOFactory::getMatchDAO()->updateWithDate($match);
            if ($pasa2) {
                $response['message'] = 'Se ha creado exitosamente el partido.';
                $response['status'] = true;
            }
        }
        $this->_view->_print($response, true);
    }

    public function cancelMatch() {
        $response['message'] = 'no se pudo cancelar el partido';
        $response['status'] = false;
        $cod_game = $this->post('codgame');
        $eliminado = DAOFactory::getGamesDAO()->delete($cod_game);

        if ($eliminado) {
            $response['message'] = 'Se ha cancelado la creación del partido';
            $response['status'] = true;
        }
        $this->_view->_print($response, true);
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

        $this->isMyTeam($team->codteam);
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

        $footballType = DAOFactory::getTeamHasVirtuesDAO()->getFootballType($gameInfo[0]->codteammanager);
        $path_attachment = DAOFactory::getTeamHasAttachmentDAO()->getPathAttachment($gameInfo[0]->codteammanager);

        $teamLocal = $gameInfo[0];
        $teamLocal->nameTeam = $team->name;
        $teamLocal->pathTeam = $path_attachment[0]->path;
        $teamLocal->typeGenre = $team->type;
        $teamLocal->name = $team->name;
        $teamLocal->footballType = $footballType->name;
        if (!isset($path_attachment)) {
            $teamLoad = DAOFactory::getTeamDAO()->load($teamLocal->codteammanager);
            $teamLocal->nameTeam = $teamLoad->name;
            $teamLocal->typeGenre = $teamLoad->type;
            $teamLocal->name = $teamLoad->name;
        }

        $postulados = DAOFactory::getPostulategameDAO()->getByPostulate($codGame, 0, 0, 5);
        for ($i = 0; $i < count($postulados); $i++) {
            $name = DAOFactory::getPostulategameDAO()->queryByNameTeam($postulados[$i]->codteam);
            $postulados[$i]->name = $name[0]->name;
        }

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

        $this->_view->assign('postulados', $postulados);
        $this->_view->assign('teamLocal', $teamLocal);
        $this->_view->renderizar('detalleDelPartidoPrivado');
    }

    public function agregar_postulados() {
        $data["status"] = false;
        $data["message"] = "No se pudo realizar la acción.";

        $teams = $this->post('teams');
        $cod_game = $this->post('cod_game');

        $postulategame = new Postulategame();
        $postulategame->codgames = $cod_game;

        for ($i = 0; $i < count($teams); $i++) {
            $postulategame->codteam = $teams[$i];
            $cod_postulategame = DAOFactory::getPostulategameDAO()->insert($postulategame);
        }
        if (is_numeric($cod_postulategame)) {
            $data["status"] = true;
            $data["message"] = "Se ha ingresado correctamente cada uno de los postulados.";
        }
        $this->_view->_print($data);
    }

    public function get_games_private() {
        $response["status"] = false;
        $response["message"] = "No se pudo realizar la acción.";
        $response["html"] = "";
        $pag = $this->post("pag");
        $cod_team = $this->post("codTeam");

        if (is_numeric($pag)) {
            require_once APP_ROOT . '/controllers/class/PaginatorBootstrap.php';
            $total_partidos = DAOFactory::getGamesDAO()->getCountGamesByType(1);
            $this->_view->assign('template', "listar_partidos_privados");
            $this->_view->assign("verpaginator", true);
            $this->_view->assign("sololista", true);
            $pagina = new PaginatorBootstrap("paginator_games", $total_partidos, 6, $pag);

            $htmlpaginator = $pagina->getHtmlPaginator(true);
            if (isset($cod_team)) {
                $games_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina->inicio_limit, $pagina->fin_limit, 1, null, $cod_team);
            } else {
                $games_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina->inicio_limit, $pagina->fin_limit, 1);
            }


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

    public function get_games_public() {
        $response["status"] = false;
        $response["message"] = "No se pudo realizar la acción.";
        $response["html"] = "";
        $cod_team = $this->post("codTeam");
        $pag = $this->post("pag");

        if (is_numeric($pag)) {
            require_once APP_ROOT . '/controllers/class/PaginatorBootstrap.php';
            $total_partidos = DAOFactory::getGamesDAO()->getCountGamesByType(2);
            $this->_view->assign('template', "listar_partidos_publicos");
            $this->_view->assign("verpaginator", true);
            $this->_view->assign("sololista", true);
            $pagina = new PaginatorBootstrap("paginator_games_public", $total_partidos, 6, $pag);

            $htmlpaginator_public = $pagina->getHtmlPaginator(true);
            if (isset($cod_team)) {
                $games_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina->inicio_limit, $pagina->fin_limit, 2, null, $cod_team);
            } else {
                $games_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina->inicio_limit, $pagina->fin_limit, 2);
            }


            $gamesPublic = $this->cargarDatos($games_info);

            $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();

            $this->_view->assign('types_futbol', $types_futbol);
            $this->_view->assign('gamesPublic', $gamesPublic);
            $this->_view->assign('htmlpaginator_public', $htmlpaginator_public);
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

    public function search_partidos_privados() {
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $genero = $this->post("genero");
        $tipo = $this->post("tipo");
        $strequipo = $this->post("strequipo");
        $pagina = $this->post("pag");
        $typeGame = $this->post("typeGame");
        $cod_user = $this->_sesion->user->coduser;
        $cod_team = $this->post('codTeam');

        $gen = Team::validateGeneroNumber($genero);
        $this->_view->setLayout("empty");

        $this->_view->assign("verpaginator", true);
        $this->_view->assign("sololista", true);
        $this->_view->setOutput(false);
        $this->_view->assign('template', "listar_partidos_privados");

        if (isset($cod_team)) {
            //para buscar los partidos de ese equipo
            $total = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, null, null, true, $typeGame, null, $cod_team);
            require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
            $pj = new PaginatorJorge("paginator_games", $total, 6, $pagina);
            $games_info = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, $pj->inicio_limit, $pj->fin_limit, false, $typeGame, null, $cod_team);
        } else {
            $total = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, null, null, true, $typeGame);
            require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
            $pj = new PaginatorJorge("paginator_games", $total, 6, $pagina);
            $games_info = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, $pj->inicio_limit, $pj->fin_limit, false, $typeGame);
        }

        $games = $this->cargarDatos($games_info);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/equipos/");
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

    public function search_partidos_publicos() {
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $genero = $this->post("genero");
        $tipo = $this->post("tipo");
        $strequipo = $this->post("strequipo");
        $pagina = $this->post("pag");
        $typeGame = $this->post("typeGame");
        $cod_user = $this->_sesion->user->coduser;
        $cod_team = $this->post('codTeam');

        $gen = Team::validateGeneroNumber($genero);
        $this->_view->setLayout("empty");

        $this->_view->assign("verpaginator", true);
        $this->_view->assign("sololista", true);
        $this->_view->setOutput(false);
        $this->_view->assign('template', "listar_partidos_publicos");

        if (isset($cod_team)) {
            //para buscar los partidos de ese equipo
            $total = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, null, null, true, $typeGame, null, $cod_team);
            require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
            $pj = new PaginatorJorge("paginator_games_public", $total, 6, $pagina);
            $games_info = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, $pj->inicio_limit, $pj->fin_limit, false, $typeGame, null, $cod_team);
        } else {
            $total = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, null, null, true, $typeGame);
            require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
            $pj = new PaginatorJorge("paginator_games_public", $total, 6, $pagina);
            $games_info = DAOFactory::getGamesDAO()->getGamesBuscador($strequipo, $gen, $tipo, $pj->inicio_limit, $pj->fin_limit, false, $typeGame);
        }

        $gamesPublic = $this->cargarDatos($games_info);
        $htmlpaginator_public = $pj->getHtmlPaginator(true, 2, SITE . "/equipos/");
        $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();

        $urlencode = new EncodeURL();
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('types_futbol', $types_futbol);
        $this->_view->assign('gamesPublic', $gamesPublic);
        $this->_view->assign('htmlpaginator_public', $htmlpaginator_public);
        $data["html"] = $this->_view->renderizar();
        if (isset($data["html"])) {
            $data["message"] = "Operación realizada con éxito.";
            $data["status"] = true;
        }
        $this->_view->_print($data);
    }

    public function acept_match() {
        $data["message"] = "No se pudo armar el partido con este equipo.";
        $data["status"] = false;
        $cod_team_manager = $this->post('cod_team_manager');
        $cod_team_rival = $this->post('cod_team_rival');
        $cod_game = $this->post('cod_game');
        $cod_postulate = $this->post('cod_postulate');

        $match_cod = DAOFactory::getGamesDAO()->getByCodMatch($cod_game);
        $games = new Games();
        $games->codgames = $cod_game;
        $games->codteamrival = $cod_team_rival;

        $match = new Match();
        $match->codmatch = $match_cod[0]->codmatch;
        $match->teamlocal = $cod_team_manager;
        $match->teamvisitant = $cod_team_rival;

        $match_create = DAOFactory::getMatchDAO()->updateWithTeam($match);
        $game_create = DAOFactory::getGamesDAO()->update($games);

        $postulategame = new Postulategame();
        $postulategame->codpostulategame = $cod_postulate;
        $postulategame->status = 2;

        $updatePostulate = DAOFactory::getPostulategameDAO()->update($postulategame);
        if ($game_create && $match_create && $updatePostulate) {
            $data["message"] = "Se ha confirmado el partido con éxito.";
            $data["status"] = true;
        }
        $this->_view->_print($data);
    }

    public function reject_postulate() {
        $data["message"] = "No se pudo rechazar al equipo.";
        $data["status"] = false;
        $cod_postulate = $this->post('cod_postulate');
        $postulategame = new Postulategame();
        $postulategame->codpostulategame = $cod_postulate;
        $postulategame->status = 1;
        $pasa = DAOFactory::getPostulategameDAO()->update($postulategame);
        if ($pasa) {
            $data["message"] = "Se ha Rechazado al equipo seleccionado.";
            $data["status"] = true;
        }
        $this->_view->_print($data);
    }

    private function isMyTeam($cod_team) {
        //esta funcion mira si este es mi equipo
        $MyTeam = DAOFactory::getTeamDAO()->getIfMyTeam($this->_sesion->user->coduser, $cod_team);
        if (isset($MyTeam)) {
            $this->_view->assign('MyTeam', $MyTeam);
        }
    }

    /**
     * Obtiene un archivo de excel que llega mediante AJAX donde cada fila es un usuaio 
     * y cada columna un dato adicional o de usuario, si es necesario agregar mas datos 
     * solo basta con agregarlo al objeto correspondiente a la tabla aditional o a la 
     * tabla users. si se agregan mas campos a la tabla de la base de datos tener en 
     * cuenta las funciones:
     *     <li>aditionalmysqlextdao::insertWithValsNulls($aditional).</li>
     *
     * @author Juan Carlos Gama
     * @return array-AJAX devuelve un array donde cada elemnto es un error que surge con 
     *                    el usuario correspondiente a la fila este elemento contiene
     *                    <li>mensaje de respuesta (respuesta)</li>
     *                    <li>fila del excel (fila)</li>
     */
    public function importarUsuarios(){
        require_once APP_ROOT . 'libraries/excel/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        $archivo     = $_FILES['archivo'];
        $objPHPExcel = PHPExcel_IOFactory::load($archivo['tmp_name']);

        $cod_team = $this->get('codteam');

        $respuestas = array();
        $usuario = new Users();
        $aditional = new Aditional();

        //itera sobre las hojas del excel
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            // obtener el tamaño de la hoja de calculo en filas y columnas
            $highestRow         = $worksheet->getHighestRow(); // ej. 10
            $highestColumn      = $worksheet->getHighestColumn(); // ej. 'F'
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            $nrColumns = ord($highestColumn) - 64; // combirte la variable char a numero atravez ascii ej. A=1

            //itera sobre las filas
            for ($row = 2; $row <= $highestRow ; ++ $row) {
                $campos=array();
                $temporal = array();
                //itera sobre las columnas y finaliza cuando todas estan vacias
                
                $finalizar = true;
                for ($col = 0; $col < $highestColumnIndex; ++ $col) {
                    $cell = $worksheet->getCellByColumnAndRow($col, $row);
                    $campos[] = $cell->getValue();
                    if(!empty($campos[$col]))
                        $finalizar = false;
                }
                if($finalizar) break;

                //crea el objeto user relacionado con la tabla user
                $usuario->name        = ucwords(strtolower($campos[0]));//capitaliza las Palabras
                $usuario->lastname    = ucwords(strtolower($campos[1]));
                $usuario->username    = $campos[2];
                $contraseña           = "123";
                $usuario->password    = sha1($contraseña);
                $usuario->email       = $campos[2];
                $usuario->id_rol      = 1;
                $usuario->codlocality = null;
                $usuario->codrole     = 1;
                $usuario->idfan       = 1;

                //Crea el objeto Aditional relacionado con la tabla aditional                
                $aditional->coduser = null; //lo asigno despues...
                $aditional->typedoc = null; //no asignado en el excel
                $aditional->numdoc = str_replace(array(".", ",", "'", ""), "", $campos[3]); //limpia de acaracteres en blanco comas puntos
                $aditional->datebirth = null;
                $aditional->category = null;
                $aditional->typeblood = null;
                $aditional->eps = null;
                $aditional->profession = null;
                $aditional->university = null;
                $aditional->nationality = null;
                $aditional->guardian = null;
                $aditional->teamcarnet = null;

                //Crea el objeto userHasteam relacionado con la tabla user_has_team
                $user_has_team          = new UserHasTeam();
                $user_has_team->codteam = $cod_team;
                $user_has_team->status  = 'PLAYER';
                /*
                --------------------------------------------------------------
                respuesta AJAX .
                NOTA: Además de los valores que hay acontinuación debe agregar 
                el estado en que termina y un mensaje en futuras validaciones.
                agregamos el temporal al array final:
                $respuestas[] = $temporal;
                --------------------------------------------------------------
                 */
                
                $temporal['fila']   = $row;
                $temporal['nombre'] = $usuario->name . " " . $usuario->lastname;

                if(!empty($usuario->email) ) 
                    $temporal['username'] = $usuario->email;
                else 
                    $temporal['username'] = "ID: ". $aditional->numdoc;

                /*
                ----------------------------------------------------------------------
                Acontinuación las comprobaciones y correcciones con respecto al excel.
                ----------------------------------------------------------------------
                 */
                
                //Que tenga nombre y apellido
                if( Empty($usuario->name) or Empty($usuario->lastname)){
                    $temporal['estado'] = "Error";
                    $temporal['respuesta'] = "Sin nombre y sin apellido en la fila $row.";
                    $respuestas[] = $temporal;
                    continue;
                }
                //que exista email o el documento.
                if( !empty($usuario->email) or !empty($aditional->numdoc) ){
                    //comprueba que tengan el formato correcto.
                    $isMail     = filter_var($usuario->email, FILTER_VALIDATE_EMAIL);
                    $isnumdoc   = is_numeric($aditional->numdoc);
                    if( !$isMail ){
                        $usuario->email = null;
                        $usuario->username = null;
                    }
                    if( !$isnumdoc)
                        $aditional->numdoc = null;
                    if(!$isnumdoc and !$isMail){
                        $temporal['estado'] = "Error";
                        $temporal['respuesta'] = "El número de documento o el mail de $usuario->name $usuario->lastname, tienen un formato errado.";
                        $respuestas[] = $temporal;
                        continue;
                    }
                }else{
                    $temporal['estado'] = "Error";
                    $temporal['respuesta'] = "$usuario->name $usuario->lastname, debe contar con documento de identidad o correo electrónico.";
                    $respuestas[] = $temporal;
                    continue;
                }
               
                /*
                -------------------------------------------------------------------
                Ahora las traigo la informacion del usuario de la base de datos ...
                -------------------------------------------------------------------
                */
                //por email primero
                if(!empty($usuario->email))
                    $coduser = DAOFactory::getUsersDAO()->queryByEmail( $usuario->email )[0]->coduser;
                //si no hay email por número de documento
                else
                    $coduser = DAOFactory::getAditionalDAO()->queryByNumdoc( $aditional->numdoc)[0]->coduser;

                /*
                -----------------------------------------------------------
                Ahora las verificaciones en la tabla SQL ej. duplicados ...
                -----------------------------------------------------------
                */

                //cuando el usuario existe
                if(!empty($coduser)){

                    //asignamos a al objeto ya creado aditional el coduser faltante.
                    $aditional->coduser = $coduser;
                    /*
                    Actualizamos o creamos los datos de aditional en la base de datos.
                     */
                    $actual_aditional = DAOFactory::getAditionalDAO()->queryByCoduser( $coduser );
                    try{
                        if(empty($actual_aditional)) //si el registro en aditional no existe
                                DAOFactory::getAditionalDAO()->insertWithValsNulls( $aditional );
                        else //si el registro en aditional existe
                                DAOFactory::getAditionalDAO()->update( $aditional );
                    }catch (Exception $e){ //captura la excepcion de la base de datos
                        if( preg_match('/numdoc_UNIQUE/', $e->getMessage()) ){
                            $temporal['estado'] = "Error";
                            $temporal['respuesta'] = "Ya existe un Jugador con el mismo numero de documento de $usuario->name $usuario->lastname.";
                            $respuestas[] = $temporal;
                        }else{
                            $temporal['estado'] = "Error";
                            $temporal['respuesta'] = $e->getMessage();
                            $respuestas[] = $temporal;
                        }
                        continue;
                    }
                }
                //cuando el usuario no existe
                else{
                    //asignamos a al objeto ya creado aditional el coduser faltante con el nuevo registro.
                    $aditional->coduser = DAOFactory::getUsersDAO()->insertWithValsNulls( $usuario );

                    try{
                        DAOFactory::getAditionalDAO()->insertWithValsNulls( $aditional );
                    }catch(Exception $e){
                        if( preg_match('/numdoc_UNIQUE/', $e->getMessage()) ){
                            $temporal['estado'] = "Error";
                            $temporal['respuesta'] = "Ya existe un Jugador con el mismo numero de documento de $usuario->name $usuario->lastname.";
                            $respuestas[] = $temporal;
                        }else{
                            $temporal['estado'] = "Error";
                            $temporal['respuesta'] = $e->getMessage();
                            $respuestas[] = $temporal;
                        }
                        //elimina el usuario recien creado
                        DAOFactory::getUsersDAO()->delete($aditional->coduser);
                        continue;
                    }
                    
                    //despues de haberlo inscrito e envia un correo con los datos
                    if($usuario->email) $this->envioCorreo($usuario, $contraseña);
                }

                //Busca si el Jugador ya esta en el equipos
                // solo php >5.5 $Pertenece = !empty(DAOFactory::getUserHasTeamDAO()->getByCodTeam($aditional->coduser, $cod_team))
                //ver mas http://php.net/manual/es/function.empty.php
                $Pertenece = count(DAOFactory::getUserHasTeamDAO()->getByCodTeam($aditional->coduser, $cod_team)) > 0;

                /*
                ----------------------------------------------------------------------
                Ahora despues de crear o actualizar el usuario lo agrega al equipo ...
                ----------------------------------------------------------------------
                */
               
                //rellena este campo de la variable con los datos del usuario actual
                $user_has_team->coduser = $aditional->coduser;

                if($Pertenece){
                    $temporal['estado'] = "Advertencia";
                    $temporal['respuesta'] = "$usuario->name $usuario->lastname ya esta inscrito a este equipo, se han actualizado los datos.";
                    $respuestas[] = $temporal;
                    continue;
                }else
                    DAOFactory::getUserHasTeamDAO()->insert($user_has_team);


                //solo entra aca si no hubo ninguna instruccion continue
                $temporal['estado'] = "Correcto";
                $temporal['respuesta'] = "$usuario->name $usuario->lastname inscrito.";
                $respuestas[] = $temporal;

            }
        }

        $this->_view->_print($respuestas);
    }

    private function envioCorreo($usuario, $contraseña){
        $this->getLibrary("mailing/correo.class");
        $mail = new Correo();
        $mail->agregarCorreos($usuario->email);
        $mail->setAsunto("Bienvenido a Toquela");
        $cuerpo_mensaje = "<p style='font-weight: bold;'>Ahora tiene una cuenta en Toquela, www.toquela.com</p><p>" . $usuario->name . " " . $usuario->lastname . "</p>
        <p>Usuario o correo: " . $usuario->email . "</p>
        <p>Contraseña: " . $contraseña . "</p>
        <p>Después de haber ingresado se recomienda cambiar esta contraseña.</p>";
        $cuerpo_mensaje ="<table>
                            <thead>
                                <tr>
                                    <h2>
                                       Bienvenido, ahora tiene una cuenta en Toquela
                                   </h2>
                               </tr>
                               <tr>
                                <td>
                                    ".$usuario->name." ".$usuario->lastname.":
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Usuario: " . $usuario->email . "
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Contraseña: ".$contraseña."
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Después de haber ingresado se recomienda cambiar la contraseña.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href='http://www.toquela.com/' data-target='blank'>Ir a www.toquela.com</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>";

        $mail->setMensaje($cuerpo_mensaje);
        $mail->enviar();
        return $mail->mensaje_enviado;
    }

}
