<?php

/**
 * Controlador Index
 *
 */
class IndexController extends Controller {

    /**
     *
     * @var Users 
     */
    private $_user;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
        //$this->_view->setLayout('torneos');
        $this->_user = $this->_sesion->user;
    }

    public function index() {
        //------ permisos admin
        if ($this->_sesion->user->codrole == 3) {
            $idRoleUser = $this->_sesion->user->codrole;
            $idUsuario = $this->_sesion->user->coduser;
            $privilegio = $this->validatePermissionsAdmin($idRoleUser, $idUsuario, 2);
        }
        //aquí coge alguno de los repetidos, y lo pone en el parametro que se necesita para validar
        if ($privilegio == 2) {
            $cod_role = $this->_sesion->user->codrole;
            $pasa = $this->validarRolesPrivilegios($cod_role, $privilegio, "Para acceder a esta seccion necesita tener permisos para administrar torneos.", null);
        }
        if ($pasa == true || $this->_sesion->user->codrole == 2) {
            if($this->_sesion->user->codrole == 2){     
                // usuario maestro
                // $tournaments = DAOFactory::getTournamentDAO()->queryAll();
                $tournaments = DAOFactory::getTournamentDAO()->usuariosConTorneos();
                // agrega nombre
                for ($i=0; $i < count($tournaments) ; $i++) { 
                   $datos =  DAOFactory::getUsersDAO()->queryByNameComplete($tournaments[$i]->coduser);
                    $nombre = $datos->name.' '.$datos->lastname;
                    $tournaments[$i]->nombre = $nombre;
                }
                // agrega torneos
                for ($i=0; $i < count($tournaments) ; $i++) { 
                    $torneosUsuario = DAOFactory::getTournamentDAO()->loadByCodUser($tournaments[$i]->coduser);
                    $tournaments[$i]->torneos = $torneosUsuario;
                }
                $this->_view->assign('titulo', 'TORNEOS POR USUARIO');
                $this->_view->assign('rol', 'maestro');
            }else{
                // usuario administrador 
                $tournaments = DAOFactory::getTournamentDAO()->queryByCodUser($this->_user->coduser);
                $this->_view->assign('titulo', 'MIS TORNEOS');
                $this->_view->assign('rol', 'admin');
            }
            $this->_view->assign('tournaments', $tournaments);
            
        //-----        
            $this->_view->setTitle("Mis Torneos");
            $this->_view->setItems("only", array('index.js'));
            $this->_view->assign('menu_item', 0);
            $this->_view->renderizar();
        }else{
            $this->validarRolesPrivilegios(null, null, null, null);
        }
    }

    public function nuevo_torneo() {
        $this->_view->setTitle("Nuevo Torneo");
        $this->_view->setItems("only", array('nuevo_torneo.css', 'nuevo_torneo.js'));
        $this->_view->assign('menu_item', 0);
        $this->_view->renderizar("nuevo_torneo");
    }

    public function modificar_torneo($code_tournament = null) {
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            $firstEnter = $this->get('firstEnter');
            if (isset($firstEnter)) {
                $this->_view->assign('firstEnter', $firstEnter);
            }
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            $this->_view->assign('tournament', $tournament);
            $this->_view->setTitle("Modificar Torneo");
            $this->_view->setItems("only", array('torneo.css', 'modificar_torneo.css'));
            $this->_view->assign('menu_item', 2);
            $this->_view->renderizar(__FUNCTION__);
        }
    }

    public function update() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
                $name = $this->post('name');
                $description = $this->post('description');
                $start = $this->post('start');
                $end = $this->post('end');
                $places = $this->post('places');
                $rules = $this->post('rules');
                $contacts = $this->post('contacts');
                $inscriptions = $this->post('inscriptions');
                if (!empty($name)) {
                    try {
                        $tournament->name = $name;
                        $tournament->description = $description;
                        $tournament->start = $start;
                        $tournament->end = $end;
                        $tournament->places = $places;
                        $tournament->rules = $rules;
                        $tournament->contacts = $contacts;
                        $tournament->inscriptions = $inscriptions;

                        DAOFactory::getTournamentDAO()->update($tournament);
                        $this->endProcess("¡Se ha modificado la información del torneo!", true);
                    } catch (Exception $exc) {
                        $this->endProcess("Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("El nombre del torneo es obligatorio.");
                }
            }
        }
    }

    public function creartorneo() {
        $this->_view->renderizar(__FUNCTION__);
    }

    public function createtournament() {
        if ($this->_request->isAjax()) {
            $name = $this->post('name');
            $type = $this->post('type');
            $n_participants = $this->post('number');
            
            $equipos_user = DAOFactory::getTournamentHasTeamDAO()->getAllTeams($this->_user->coduser);
            $limit_equipos_user = count($equipos_user);
            if($limit_equipos_user < 4 && $type != 3){
                $mensaje = 'No hay 4 o más equipos para crear el torneo.';
            }
            if($limit_equipos_user < 8 && $type == 3){
                $mensaje = 'No hay 8 o más equipos para crear el torneo.';
            }
            
            if($n_participants <= $limit_equipos_user){
                $description = $this->post('descripcion');
                $num_of_tournements = DAOFactory::getTournamentDAO()->getCountAll();
                $limite = 200;
                if ($num_of_tournements <= $limite) {
                    if (!empty($name) && !empty($description) && is_numeric($type) && is_numeric($n_participants)) {
                        if (strlen($name) <= 60) {
                            if (is_numeric($n_participants) && ($n_participants > 3)) {
                                switch ($type) {
                                    case 1:
                                    $type = self::TYPE_1;
                                    break;
                                    case 2:
                                    $type = self::TYPE_2;
                                    break;
                                    case 3:
                                    $type = self::TYPE_3;
                                    break;
                                    case 4:
                                    $type = self::TYPE_4;
                                    break;
                                    default:
                                    return null;
                                    break;
                                }
                                try {
                                    $num_of_tournements = DAOFactory::getTournamentDAO()->getCountAll();
                                    $limite = 200;
                                    if ($num_of_tournements <= $limite) {

                                    }
                                    $code = DAOFactory::getTournamentDAO()->createTournament($name, $description, $type, $n_participants, $this->_user->coduser);
                                    $message = "¡Se ha creado el torneo!";
                                    $link = SITE . "/torneos/index/modificar_torneo/$code";
                                    $status = true;
                                    $this->_view->_print(array('status' => $status, 'message' => $message, 'link' => $link), true);
                                } catch (Exception $exc) {
                                    $this->endProcess("Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.");
                                }
                            } else {
                                $this->endProcess("El número de participantes es invalido.");
                            }
                        } else {
                            $this->endProcess("El nombre del torneo, maximo puede tener 60 caracteres.");
                        }
                    } else {
                        $this->endProcess("Todos los campos son obligatorios.");
                    }
                } else {
                    $this->endProcess("Por el momento hay un limite para crear solo $limite torneos en la plataforma.");
                }
            }else{
                if(isset($mensaje)){
                    $this->endProcess($mensaje);
                }else{    
                    $this->endProcess("Por el momento solo puede crear un torneo de (".$limit_equipos_user.") participantes, ya que es el número de equipos que hay hasta ahora.");
                }
            }
        }
    }

    public function delete_torneo() {
        $code_tournament = $_POST['cod_tour'];
        $request["retorno"] = false;
        $request["mensage"] = "No se pudo eliminar el torneo...";
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            if ((DAOFactory::getTournamentDAO()->delete($code_tournament)) > 0) {
                $request["retorno"] = true;
                $request["mensage"] = "El torneo se elimino correctamente.";
            }
        }
        $this->_view->_print($request, true);
    }

    public function info_team() {
        $team = null;
//        $codteam = 2;
        $codteam = $_POST['code'];
        $data['retorno'] = false;
        $data['html'] = "";
        if (!is_null($codteam) && is_numeric($codteam)) {
            $team = DAOFactory::getTeamDAO()->getInfoTeam($codteam);
            $this->_view->assign('team', $team);
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $urlencode = new EncodeURL();
            $this->_view->assign('urlencode', $urlencode);
            $this->_view->assign('template', 'infoteam');
            $data['html'] = $this->_view->renderizar();
            $data['retorno'] = true;
        }
        $this->_view->_print($data, true);
    }

}
