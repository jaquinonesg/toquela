<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of torneoController
 *
 * @author DESARROLLO2
 */
class TorneoController extends Controller {

    private $_user;

    public function __construct() {
        parent::__construct();
        // $this->validacionSession();
        $this->user = $this->_sesion->user;
    }

    private function loginSession() {
        $this->validacionSession();
        $this->_user = $this->_sesion->user;
    }

    public function index() {
        $this->_view->setTitle("Mis Torneos");
        $this->_view->setItems("only", array('listar_torneos.css', 'listar_torneos.js'));
        $tipos_torneos = $this->getTiposTorneo();
        $total_torneos = DAOFactory::getTournamentDAO()->getTorneosBuscador("", null, null, null, null, true);
        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $pj = new PaginatorJorge("pagina_torneos", $total_torneos, 6, 1);
        $tournaments = DAOFactory::getTournamentDAO()->getTorneosBuscador("", null, null, $pj->inicio_limit, $pj->fin_limit);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/torneo/");
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('tipos_torneos', $tipos_torneos);
        $this->_view->assign('tournaments', $tournaments);
        $user = $this->_sesion->user;
        $this->_view->assign('user', $user);
        $this->_view->renderizar("temp_torneos");
    }

    public function search_torneos() {
        $data["html"] = "";
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $tipo_torneo = $this->post("tipo");
        $participantes = $this->post("participantes");
        $strtorneo = $this->post("strtorneo");
        $pagina = $this->post("pag");
        if ($pagina < 1) {
            $pagina = 1;
        }
        $arr_tipos_torneos = $this->getTiposTorneo();
        if (!in_array($tipo_torneo, $arr_tipos_torneos)) {
            $tipo_torneo = null;
        }
        if (!is_numeric($participantes)) {
            $participantes = null;
        }

        $this->_view->setLayout("empty");
        $this->_view->assign("template", "listar_torneos");
        $this->_view->assign("is_buscador_torneos", false);
        $this->_view->assign("is_paginator", true);
        $this->_view->assign("init_js_paginator", false);
        $this->_view->setOutput(false);

        $total_torneos = DAOFactory::getTournamentDAO()->getTorneosBuscador($strtorneo, $participantes, $tipo_torneo, null, null, true);

        require_once APP_ROOT . '/controllers/class/PaginatorJorge.php';
        $pj = new PaginatorJorge("pagina_torneos", $total_torneos, 6, $pagina);
        $tournaments = DAOFactory::getTournamentDAO()->getTorneosBuscador($strtorneo, $participantes, $tipo_torneo, $pj->inicio_limit, $pj->fin_limit);
        $htmlpaginator = $pj->getHtmlPaginator(true, 2, SITE . "/torneo/");
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('tournaments', $tournaments);
        $data["html"] = $this->_view->renderizar();
        if (isset($data["html"])) {
            $data["message"] = "Operación realizada con éxito.";
            $data["status"] = true;
        }
        $this->_view->_print($data);
    }

    public function mis_torneos() {
        $this->loginSession();

        $tournaments = DAOFactory::getTournamentDAO()->queryByCodUser($this->_user->coduser);
        $this->_view->assign('tournaments', $tournaments);
        //-----        
        $this->_view->setTitle("Mis Torneos");
        $this->_view->setItems("only", array('torneo.css', 'mis_torneos.js'));
        $this->_view->assign('menu_item', 0);
        $this->_view->renderizar("mis_torneos");
    }

    public function nuevo_torneo() {
        $this->loginSession();
        $this->_view->setTitle("Nuevo Torneo");
        $this->_view->setItems("only", array('torneo.css', 'nuevo_torneo.css', 'nuevo_torneo.js'));
        $this->_view->assign('menu_item', 0);
        $this->_view->renderizar("nuevo_torneo");
    }

    public function informacion_torneo($code_tournament = null) {
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            $news = DAOFactory::getNewsDAO()->queryByCodTournament($tournament->codtournament);
            $this->_view->assign('tournament', $tournament);
            $this->_view->assign('news', $news);
            $this->_view->setTitle("Información Torneo");
            $this->_view->setItems("only", array('torneo.css', 'informacion_torneo.css'));
            $this->_view->assign('menu_item', 3);
            $this->_view->renderizar("informacion_torneo");
        }
    }

    public function calendario() {
        $this->_view->setTitle("Calendario Torneo");
        $this->_view->setItems("only", array('torneo.css', 'calendario.css'));
        $this->_view->assign('menu_item', 1);
        $this->_view->renderizar("calendario");
    }

    public function participantes($cod_tournament = null) {
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

    public function participantes_completo() {
        $this->_view->setTitle("Participantes Torneo");
        $this->_view->setItems("only", array('torneo.css', 'participantes_completo.css'));
        $this->_view->assign('menu_item', 2);
        $this->_view->renderizar("participantes_completo");
    }

    public function informacion() {
        $this->_view->setTitle("Información Torneo");
        $this->_view->setItems("only", array('torneo.css', 'informacion.css'));
        $this->_view->assign('menu_item', 3);
        $this->_view->renderizar("informacion");
    }

    public function tablero_completo() {
        $this->_view->setTitle("Tablero Completo Torneo");
        $this->_view->setItems("only", array('torneo.css', 'tablero_completo.css'));
        $this->_view->assign('menu_item', 4);
        $this->_view->renderizar("tablero_completo");
    }

    public function nombretorneo() {
        $this->loginSession();
        $userteam = DAOFactory::getUserHasTeamDAO()->getUserTeam();
        $this->_view->assign('userteam', $userteam);
        /* die("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
          print_r($userteam, true) .
          "</pre>"); */
        $this->_view->renderizar(__FUNCTION__);
    }

    public function perfil() {
        $teams = DAOFactory::getTeamDAO()->queryAll();
        $this->_view->assign('teams', $teams);
        $this->_view->assign('disable', true);
        $this->_view->renderizar(__FUNCTION__);
    }

    public function createtournament() {
        if ($this->_request->isAjax()) {
            $name = $this->post('name');
            $type = $this->post('type');
            $n_participants = $this->post('number');
            $description = $this->post('descripcion');
            if (!empty($name) && !empty($description) && is_numeric($type) && is_numeric($n_participants)) {
                if (strlen($name) <= 60) {
                    if ($n_participants > 1 && $n_participants < 17) {
                        switch ($type) {
                            case 1:
                                $type = self::TYPE_1;
                                break;
                            case 2:
                                $type = self::TYPE_2;
                                break;
                            default:
                                $type = self::TYPE_3;
                                break;
                        }
                        try {
                            $code = DAOFactory::getTournamentDAO()->createTournament($name, $description, $type, $n_participants, $this->_user->coduser);
                            $message = "¡Se ha creado el torneo! <a href='" . SITE . "/torneo/informacion_torneo/$code'><strong>Ir al torneo</strong></a>";
                            $this->endProcess($message, true);
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
        }
    }

    public function delete_torneo() {
        $this->loginSession();
        $code_tournament = $_POST['cod_tour'];
        $request["retorno"] = false;
        $request["mensage"] = "No se pudo eliminar el torneo...";
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            if (is_numeric(DAOFactory::getTournamentDAO()->delete($code_tournament))) {
                $request["retorno"] = true;
                $request["mensage"] = "El torneo se elimino correctamente.";
            }
        }
        $this->_view->_print($request, true);
    }

    public function modificar_torneo($code_tournament = null) {
        $this->loginSession();
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            $this->_view->assign('tournament', $tournament);
            $this->_view->setTitle("Modificar Torneo");
            $this->_view->setItems("only", array('torneo.css', 'modificar_torneo.css'));
            $this->_view->assign('menu_item', 0);
            $this->_view->renderizar(__FUNCTION__);
        }
    }

    //tablero

    public function update() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament) && $tournament->coduser == $this->_user->coduser) {
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

    public function publico($code_tournament = null) {
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            $this->_view->assign('tournament', $tournament);
            $this->_view->renderizar(__FUNCTION__);
        }
    }

    public function publish() {
        $this->loginSession();
        if ($this->_request->isAjax()) {
            $type = $this->post('type');
            $text = $this->post('text');
            $code_tournament = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            if (is_numeric($type) && !empty($text) && is_numeric($tournament->codtournament) && $tournament->coduser == $this->_user->coduser) {
                $validation = false;
                switch ($type) {
                    case 2:
                        $validation = Util::isUrl($text);
                        $type_name = "image";
                        break;
                    case 3:
                        $validation = Util::isUrl($text);
                        $type_name = "video";
                        break;
                    case 1:
                    default:
                        $validation = true;
                        $type_name = "text";
                        break;
                }

                if ($validation) {
                    $dto = new News();
                    $dto->message = $text;
                    $dto->codtournament = $tournament->codtournament;
                    $dto->coduser = $this->_user->coduser;
                    $dto->type = $type_name;
                    try {
                        DAOFactory::getNewsDAO()->insert($dto);
                        $this->endProcess("¡Se ha publicado el mensaje!", true);
                    } catch (Exception $exc) {
                        $this->endProcess("Ha ocurrido un error en el proceso, por favor vuelva a intentarlo.");
                    }
                } else {
                    $this->endProcess("Error, debe ingresar una URL valida.");
                }
            } else {
                $this->endProcess("Error en la validación de los datos, por favor vuelva a intentarlo.");
            }
        }
    }

    public function loadnews() {
        if ($this->_request->isAjax()) {
            $code = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code);
            if (is_numeric($tournament->codtournament)) {
                $news = DAOFactory::getNewsDAO()->queryByCodTournament($tournament->codtournament);
                $this->_view->assign('news', $news);
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $this->_view->assign('template', 'news');
                $html = $this->_view->renderizar();
                $this->_view->_print(array('html' => $html));
            }
        }
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
            $this->_view->assign('template', 'infoteam');
            $data['html'] = $this->_view->renderizar();
            $data['retorno'] = true;
        }
        $this->_view->_print($data, true);
    }

    //---------------------------
    //----- participantes--------



    public function saveprofile() {
        /* $user = new Users();
          $user->set();
          $user->username = str_replace(" ", "", strtolower($user->name)) . $this->post('cedula');
          $user->codlocality = 3;
          $user->codrole = 1;
          $user->password = sha1($user->username);
          $user->age = 1;
          $user->skilledleg = "AMBAS";
          $user->sex = "UNDEFINED";
          $user->idho = $this->post('cedula');

          $this->getLibrary("upload" . DS . "class.upload");
          $handle = new upload($_FILES['image']);
          if ($handle->uploaded) {
          $handle->file_new_name_body = $user->username;

          $handle->image_resize = true;
          $handle->image_x = 200;
          $handle->image_ratio_y = false;
          $handle->process(APP_ROOT . "public" . DS . "img" . DS . "users" . DS);
          if ($handle->processed) {
          $img = "public" . SDS . "img" . SDS . "users" . SDS . $handle->file_dst_name;
          $handle->clean();
          }
          }

          $user->coduser = DAOFactory::getUsersDAO()->insert($user);

          $teamuser = new UserHasTeam();
          $teamuser->coduser = $user->coduser;
          $teamuser->codteam = $this->post('team');
          DAOFactory::getUserHasTeamDAO()->insert($teamuser);
          $team = DAOFactory::getTeamDAO()->load($team->codteam);

          $attachment = new Attachment;
          $attachment->type = "image";
          $attachment->path = $img;
          $attachment->description = "foto de perfil";
          $attachment->nameencode = $attachment->namefile = $user->username;
          $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);

          $userattachment = new UserHasAttachment;
          $userattachment->codattachment = $attachment->codattachment;
          $userattachment->coduser = $user->coduser;
          DAOFactory::getUserHasAttachmentDAO()->insert($userattachment);
          $this->getLibrary("mailing/correo.class");
          $mail = new Correo();
          $mail->agregarCorreos('andreacatalina1@gmail.com;juan.espinosa@grimorum.com;hernan.cortes@grimorum.com;' , true);
          $mail->setAsunto('Su registro se ha compleatado');
          $this->_view->assign('user', $user);
          $this->_view->assign('team', $team);
          $this->_view->setLayout('empty');
          $this->_view->setOutput(false);
          $message = $this->_view->renderizar('mail');
          $mail->setMensaje($message);
          $mail->enviar();
          $message .= " - $mail->xmlt ";
          $this->redireccionar('/torneo/ok'); */
    }

    public function ok() {
        $this->_view->renderizar(__FUNCTION__);
    }

}

?>
