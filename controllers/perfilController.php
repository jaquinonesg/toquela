<?php

class perfilController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->_view->setItems('except', array('update.js'));
        if(isset($this->_sesion->user)){
        // toca así para que cargue las notificaciones que tiene en tiempo real
            $this->_sesion->user = $this->loaduser($this->_sesion->user->coduser);
        }
    }

    public function index() {
        require_once APP_ROOT . '/controllers/class/Encrypter.php';
        $coduser = $this->get('cod');
        $userdto = DAOFactory::getUsersDAO()->load($coduser);
        if (isset($userdto)) {
            $userdto = $this->loaduser($userdto->coduser);
            $virtues = DAOFactory::getUserHasVirtuesDAO()->getVirtuesByUser($userdto->coduser);
            $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByUser($userdto->coduser);
            $isfollower = DAOFactory::getFollowersDAO()->isFollower($this->_sesion->user->coduser, $userdto->coduser);
            $view = "perfilpublico";
            $this->_view->assign('isfollower', $isfollower);
            $this->_view->assign('teams', $teams);
            $this->_view->assign('userpublic', $userdto);
            $this->_view->assign('menu', false);
            $this->_view->assign('user', $this->_sesion->user);
        } else {
            if (is_numeric($this->_sesion->user->coduser)) {
                $virtues = DAOFactory::getUserHasVirtuesDAO()->getVirtuesByUser($this->_sesion->user->coduser);
                $teamsfans = DAOFactory::getFanDAO()->getAllteamsFans();
                $aditional = DAOFactory::getAditionalDAO()->load($this->_sesion->user->coduser);
                $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByUser($this->_sesion->user->coduser);
                $this->_view->assign('teams', $teams);
                $this->_view->assign('aditional', $aditional);
                $this->_view->assign('teamsfans', $teamsfans);
                $this->_view->assign('menu', true);
                $this->_view->assign('user', $this->_sesion->user);
            } else {
                $this->redireccionar("/index");
            }
        }
        $ciudades = DAOFactory::getCityDAO()->queryAll();
        $uservirtues = array();
        if (!is_null($virtues)) {
            foreach ($virtues as $virtue) {
                $uservirtues[$virtue->codvirtues] = true;
            }
        }
        $encodeurl = new EncodeURL();
        $this->_view->assign('urlencode', $encodeurl);
        $this->_view->assign('encodeurl', $encodeurl);
        $this->_view->assign('pestana', $pestana);
        $this->_view->assign('profile', false);
        $this->_view->assign('virtues', $uservirtues);
        $this->_view->assign('virtuespublic', $virtues);
        $this->_view->assign('cities', $ciudades);
        if (is_numeric($this->_sesion->user->coduser)) {
            $this->_view->assign('haySesion', true);
        }
        $this->_view->renderizar($view);
    }

    public function videos() {
        $this->validacionSession();
        $videos = DAOFactory::getAttachmentDAO()->getYoutubeVideosUser($this->_sesion->user->coduser);
        $this->_view->assign('menu', true);
        $this->_view->assign('youtube', $videos);
        $this->validacionSession();
        $this->_view->renderizar(__FUNCTION__);
    }

    public function fotos() {
        $this->validacionSession();
        $images = DAOFactory::getAttachmentDAO()->getPhotosUser($this->_sesion->user->coduser);
        $this->_view->assign('menu', true);
        $this->_view->assign('photos', $images);
                $this->validacionSession();
        $this->_view->renderizar(__FUNCTION__);
    }

    public function miscanchas() {
        $this->_view->setItems('only', array('canchas.css'));
        $complexs = DAOFactory::getFavoritesComplexDAO()->getComplexbyUser($this->_sesion->user->coduser);
        $this->_view->assign('complexs', $complexs);
        $this->_view->renderizar(__FUNCTION__);
    }

    public function galeria() {
        $this->_view->renderizar('fotos');
    }

    public function uploadattachment() {
        if (isset($_FILES['new_photo'])) {
            $upload = "photo";
            $referencia = "/perfil/fotos";
        } elseif ($_POST['new_link']) {
            $upload = "link";
            $referencia = "/perfil/videos";
        }
        switch ($upload) {
            case 'photo':
                $extension = pathinfo($_FILES['new_photo']['name'], PATHINFO_EXTENSION);
                if (in_array(strtolower($extension), array('jpeg', 'jpg', 'gif', 'png'))) {
                    $this->getLibrary("upload" . DS . "class.upload");

                    $handle = new upload($_FILES['new_photo']);
                    if ($handle->uploaded) {
                        $handle->file_new_name_body = time();
                        $handle->process(APP_ROOT . "public" . DS . "img" . DS . "users" . DS . sha1($this->_sesion->user->coduser) . DS . "photos" . DS);
                        if ($handle->processed) {
                            $img = "public" . SDS . "img" . SDS . "users" . SDS . sha1($this->_sesion->user->coduser) . SDS . "photos" . SDS . $handle->file_dst_name;
                            $handle->clean();
                        }
                    }

                    $attachment = new Attachment();
                    $attachment->type = "image";
                    $attachment->path = $img;
                    $attachment->description = "Foto de galeria...";
                    $attachment->nameencode = $attachment->namefile = $this->_sesion->username;
                    $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);

                    $userattachment = new UserHasAttachment();
                    $userattachment->codattachment = $attachment->codattachment;
                    $userattachment->coduser = $this->_sesion->user->coduser;
                    $userattachment->type = UserHasAttachment::TYPE_FOTO;
                    DAOFactory::getUserHasAttachmentDAO()->insert($userattachment);
                    $profile = $this->post('profile');
                    if (!is_null($profile) && $profile === 'true') {
                        $userattachment->type = UserHasAttachment::TYPE_PERFIL;
                        DAOFactory::getUserHasAttachmentDAO()->update($userattachment);
                        $photoprofile = DAOFactory::getUserHasAttachmentDAO()->getPhotProfileUser($this->_sesion->user->coduser);
                        if (!is_null($photoprofile)) {
                            $this->_sesion->user->photoprofile = $photoprofile;
                        }
                    }
                }
                break;
            case 'link':
                $link = $this->post('new_link');
                if (Util::isVideoYoutube($link)) {
                    $attachment = new Attachment;
                    $attachment->type = "link";
                    $attachment->path = Util::isVideoYoutube($link, false);
                    $attachment->description = "link video youtube";
                    $attachment->nameencode = $attachment->namefile = $this->_sesion->user->username;
                    $attachment->codattachment = DAOFactory::getAttachmentDAO()->insert($attachment);

                    $userattachment = new UserHasAttachment;
                    $userattachment->codattachment = $attachment->codattachment;
                    $userattachment->coduser = $this->_sesion->user->coduser;
                    $userattachment->type = UserHasAttachment::TYPE_YOUTUBE;
                    DAOFactory::getUserHasAttachmentDAO()->insert($userattachment);
                }
                break;
        }
        $this->redireccionar($referencia);
    }

    public function updateprofile() {
        $virtues2 = array();
        $virtues = $this->post('virtues');
        foreach ($virtues as $virtue) {
            $virtues2[$virtue] = $virtues2[$virtue] + 1;
        }
        $user = $this->_sesion->user;
        $user->name = $this->post('name');
        $user->lastname = $this->post('lastname');
        $user->phone = $this->post('phone');
//            $user->address = $this->post('');
        $namecity = $this->post('namecity');
        if (isset($namecity) || ($namecity != "")) {
            $user->city = $namecity;
        }
        $user->username = $this->post('email');
//            $user->password = $this->post('');
        $user->email = $this->post('email');
        $user->sex = $this->post('sex');
        $user->age = $this->post('age');
//            $user->longitude = $this->post('');
//            $user->latitude = $this->post('');
//            $user->skilledleg = $this->post('');
        $user->codlocality = $this->post('codlocality');
        $user->idfan = $this->post('idfan');
//            $user->codrole = $this->post('');
        DAOFactory::getUserHasVirtuesDAO()->deleteVirtuesByUser($user->coduser);
        $virtues = $this->post('virtues');
        $userhasvirtues = new UserHasVirtues();
        $userhasvirtues->coduser = $user->coduser;
        $favoritevirtue = $this->post('favoritevirtue');
        if (is_numeric($favoritevirtue)) {
            $userhasvirtues->codvirtues = $favoritevirtue;
            $userhasvirtues->main = 1;
            DAOFactory::getUserHasVirtuesDAO()->insert($userhasvirtues);
        }
        if (count($virtues)) {
            foreach ($virtues as $virtue) {
                $userhasvirtues->codvirtues = $virtue;
                $userhasvirtues->main = 0;
                if ($virtue != $favoritevirtue) {
                    DAOFactory::getUserHasVirtuesDAO()->insert($userhasvirtues);
                }
            }
        }
        $affets = DAOFactory::getUsersDAO()->update($user);
        $this->_sesion->user = $this->loaduser($user->coduser);
        $this->redireccionar("/perfil/{$this->_sesion->user->coduser}-{$this->_sesion->user->username}");
    }

    public function updateaditionaldata() {
        $cod_user = $this->_sesion->user->coduser;
        $auxobj = (object) $_POST;
        if (is_numeric($cod_user) && !is_null($auxobj) && is_object($auxobj)) {
            $aditional = DAOFactory::getAditionalDAO()->load($cod_user);
            if (is_null($aditional)) {
                if (is_numeric(DAOFactory::getAditionalDAO()->insertRecord($cod_user))) {
                    $aditional = DAOFactory::getAditionalDAO()->load($cod_user);
                } else {
                    return false;
                }
            }
            $aditional->coduser = $cod_user;
            $aditional->typedoc = $auxobj->typedoc;
            $aditional->numdoc = $auxobj->numdoc;
//'2008-02-02'
            $aditional->datebirth = $auxobj->datebirth;
            $aditional->category = $auxobj->category;
            $aditional->typeblood = $auxobj->typeblood;
            $aditional->eps = $auxobj->eps;
            $aditional->profession = $auxobj->profession;
            $aditional->university = $auxobj->university;
            $aditional->nationality = $auxobj->nationality;
            $aditional->guardian = $auxobj->guardian;
            if (isset($auxobj->teamcarnet)) {
                $aditional->teamcarnet = $auxobj->teamcarnet;
            }
            DAOFactory::getAditionalDAO()->update($aditional);
            if (isset($auxobj->phone) || isset($auxobj->cellular)) {
                $users = new stdClass();
                $users->coduser = $cod_user;
                $users->phone = $auxobj->phone;
                $users->cellular = $auxobj->cellular;
                $numaffets = DAOFactory::getUsersDAO()->update($users);
                if (is_numeric($numaffets)) {
                    $this->_sesion->user->phone = $users->phone;
                    $this->_sesion->user->cellular = $users->cellular;
                }
            }
        }
        $this->redireccionar("/perfil/index/2");
    }

    public function deleteattachment() {
        $referencia = "/index";
        $toma_referencia = true;
        if (isset($_POST['attachment'])) {
            if (isset($_POST['referencia'])) {
                $referencia = $_POST['referencia'];
                $toma_referencia = false;
            }
            $codattachment = $this->post('attachment');
            $userattachment_dao = DAOFactory::getUserHasAttachmentDAO();
            $userattachment = $userattachment_dao->load($codattachment, $this->_sesion->user->coduser);
            $attachment = DAOFactory::getAttachmentDAO()->load($codattachment);
            if (!is_null($attachment)) {
                if ($userattachment->type == UserHasAttachment::TYPE_FOTO) {
                    $path = str_replace(SDS, DS, $attachment->path);
                    if ($toma_referencia) {
                        $referencia = "/perfil/fotos";
                    }
                } else if ($userattachment->type == UserHasAttachment::TYPE_YOUTUBE) {
                    if ($toma_referencia) {
                        $referencia = "/perfil/videos";
                    }
                }
                $userattachment_dao->delete($codattachment, $this->_sesion->user->coduser);
                DAOFactory::getAttachmentDAO()->delete($attachment->codattachment);
            }
        }
        $this->redireccionar($referencia);
    }

    public function favoritesubcomplex() {
        $codcomplex = $this->post('complejo');
        $complex = DAOFactory::getComplexDAO()->load($codcomplex);
        $response = array();
        if (!is_null($complex)) {
            $favorite = new FavoritesComplex;
            $favorite->codcomplex = $complex->codcomplex;
            $favorite->coduser = $this->_sesion->user->coduser;
            try {
                DAOFactory::getFavoritesComplexDAO()->insert($favorite);

                $response['messagge'] = "Se ha guarda el complejo $complex->name como su favorito";
            } catch (Exception $e) {
                $response['error'] = "No se ha podido agregar como favorito";
                if ($e->getCode() == 2627) {
                    $response['error'] = "Ya esta escogida como favorita";
                }
            }
        } else {
            $response['error'] = "Cancha no encontrada";
        }
        $this->_view->_print($response);
    }

    public function cerrar() {
        $this->_sesion->__destroy();
        $this->redireccionar('/index');
    }

    /**
     * 
     * @param type $coduser
     * @return Users 
     */
    public function estadisticas() {
        $this->validacionSession();
        $estadistica = DAOFactory::getStatisticsDAO()->getGoalsAndRedYellowCardsByUser($this->_sesion->user->coduser);
        $mas_estadisticas = DAOFactory::getStatisticsDAO()->getAllStatisticsByUser($this->_sesion->user->coduser);
        $matches = DAOFactory::getStatisticsDAO()->getPlayedMatches($this->_sesion->user->coduser);
        $torneos = DAOFactory::getTournamentDAO()->getTorneosEnJuegoPorUsuario($this->_sesion->user->coduser);
        $this->_view->assign('menu', true);
        $this->_view->assign('mas_estadisticas', $mas_estadisticas);
        $this->_view->assign('estadistica', $estadistica);
        $this->_view->assign('matches', $matches);
        $this->_view->assign('torneos', $torneos);
        $this->_view->renderizar(__FUNCTION__);
    }

    public function estadisticastorneo() {
        if ($this->_request->isAjax()) {
            $cod_tournament = $this->post('torneo');
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $teams = DAOFactory::getTournamentDAO()->getEquiposEnJuegoPorTorneoYusuario($cod_tournament, $this->_sesion->user->coduser);
            $this->_view->assign('codtournament', $cod_tournament);
            $this->_view->assign('teams', $teams);
            $this->_view->assign('template', 'listar_equipos_acordion');
            $html = $this->_view->renderizar();
            $this->_view->_print(array('html' => $html), true);
        }
    }

    public function estadisticaspartidos() {
        if ($this->_request->isAjax()) {
            $cod_tournament = $this->post('torneo');
            $cod_team = $this->post('equipo');
            $onlyteam = $this->post('onlyteam');
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $matches = null;
            if ($onlyteam) {
                $matches = DAOFactory::getTournamentDAO()->getPartidosEnJuegoPorTorneoEquipoYusuario($cod_tournament, $cod_team);
                $this->_view->assign('onlyteam', true);
                $this->_view->assign('codteam', $cod_team);
            } else {
                $matches = DAOFactory::getTournamentDAO()->getPartidosEnJuegoPorTorneoEquipoYusuario($cod_tournament, $cod_team, $this->_sesion->user->coduser);
                $this->_view->assign('coduser', $this->_sesion->user->coduser);
            }
            $this->_view->assign('matches', $matches);
            $this->_view->assign('template', 'listar_partidos_acordion');
            $html = $this->_view->renderizar();
            $this->_view->_print(array('html' => $html), true);
        }
    }

    public function estadisticasporpartido() {
        if ($this->_request->isAjax()) {
            $cod_match = $this->post('partido');
            $cod_user = null;
            if (is_numeric($this->_sesion->user->coduser)) {
                $cod_user = $this->_sesion->user->coduser;
            }
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $statistics = DAOFactory::getMatchDAO()->getAllStatisticsByMatch($cod_match, $cod_user);
            $this->_view->assign('statistics', $statistics);
            $this->_view->assign('template', 'listar_estadisticas');
            $html = $this->_view->renderizar();
            $this->_view->_print(array('html' => $html), true);
        }
    }

    public function estadisticasporpartidoequipo() {
        if ($this->_request->isAjax()) {
            $cod_match = $this->post('partido');
            $equipo = $this->post('equipo');
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $statistics = DAOFactory::getMatchDAO()->getAllStatisticsByMatchTeam($cod_match, $equipo);
            $this->_view->assign('statistics', $statistics);
            $this->_view->assign('template', 'listar_estadisticas');
            $html = $this->_view->renderizar();
            $this->_view->_print(array('html' => $html), true);
        }
    }

    public function estadisticasportorneo() {
        if ($this->_request->isAjax()) {
            $cod_tournament = $this->post('torneo');
            $cod_user = $this->post('usuario');
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $statistics = DAOFactory::getMatchDAO()->getStatisticsByTournamentOrUser($cod_tournament, $cod_user);
            $this->_view->assign('statistics', $statistics);
            $this->_view->assign('template', 'listar_estadisticas');
            $html = $this->_view->renderizar();
            $this->_view->_print(array('html' => $html), true);
        }
    }

    public function estadisticasportorneoequipo() {
        if ($this->_request->isAjax()) {
            $cod_tournament = $this->post('torneo');
            $cod_team = $this->post('equipo');
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $statistics = DAOFactory::getMatchDAO()->getStatisticsByTournamentOrTeam($cod_tournament, $cod_team);
            $this->_view->assign('statistics', $statistics);
            $this->_view->assign('template', 'listar_estadisticas');
            $html = $this->_view->renderizar();
            $this->_view->_print(array('html' => $html), true);
        }
    }

    public function misamigos() {
        $this->validacionSession();
        require_once APP_ROOT . '/controllers/class/Encrypter.php';
        $encripter = new Encrypter();
        $user = $this->_sesion->user;
        $cod_user = $user->coduser;
        $encodeurl = new EncodeURL();
        $usuarios = DAOFactory::getFollowersDAO()->getAmigos($this->_sesion->user->coduser);
        $this->_view->assign('menu', true);
        $this->_view->assign('encodeurl', $encodeurl);
        $this->_view->assign('usuarios', $usuarios);
        $this->_view->assign('encripter', $encripter);
        $this->_view->renderizar(__FUNCTION__);
    }

    public function follow() {
        if (count($this->_request->getArgs()) > 0) {
            $arg = $this->_request->getArgs();
            $urluser = $arg[0];
        } elseif (strlen($this->_request->getMetodo()) > 0) {
            $urluser = $this->_request->getMetodo();
        }
        $urluser = Controller::post('user');
        $item_categoria = explode('-', $urluser);
        $coduser = (int) array_shift($item_categoria);
        if ($coduser == '') {
            $coduser = 0;
        }
        $username = implode('-', $item_categoria);
        $userdto = DAOFactory::getUsersDAO()->load($coduser);
        if (isset($userdto)) {
            $follower = new Followers;
            $follower->from = $this->_sesion->user->coduser;
            $follower->to = $userdto->coduser;
            try {
                $accion = Controller::post('action');
                switch ($accion) {
                    case 'save':
                        DAOFactory::getFollowersDAO()->insert($follower);
                        $this->_view->_print(array('success' => 'Sigues a a este usuario', 'error' => false, 'accion' => 'delete', 'text' => 'Dejar de seguir'));
                        break;
                    case 'delete':
                        DAOFactory::getFollowersDAO()->delete($follower->from, $follower->to);
                        $this->_view->_print(array('success' => 'Ya no sigues a este usuario', 'error' => false, 'accion' => 'save', 'text' => 'Seguir'));
                        break;
                    default :
                        $this->_view->_print(array('error' => 'Error no identificado ' . $accion));
                        break;
                }
            } catch (Exception $e) {
                $msg = "";
                if ($e->getCode() == 1062)
                    $msg = "ya se encuentra sigueindo a esta persona";
                $this->_view->_print(array('error' => 'Hubo un erro al tratar de seguir esta persona, ' . $msg));
            }
        } else {
            $this->_view->_print(array('error' => 'NO existe usuario '));
        }
    }

    public function sendmessage() {
        $mensaje = Controller::post('msg');
        $asunto = Controller::post('asunto');
        $user_to = Controller::post('user_to');
        $cod_user = $this->_sesion->user->coduser;
        $obj = new Message();

        $obj->text = $mensaje;
        $obj->subject = $asunto;
        $this->date;
        $obj->viewed = 0;
        $obj->state = 0;
        $obj->from = $cod_user;
        $obj->to = $user_to;
        $obj->codteam = 'NULL';
        $sendmessage = DAOFactory::getMessageDAO()->insert($obj);
    }

    /*
     * Autocomplete enviar Mensage
     */

    public function autocompletemensaje() {
        $term = $this->get('term');
        if (!empty($term)) {
            $data_request = DAOFactory::getMessageDAO()->autocompleteEnviarMensaje($this->_sesion->user->coduser, $term);
            $this->_view->_print($data_request);
        }
    }

    /*
     * Ver todos los mensajes y Agruparlos
     */

    public function mismensajes() {
        $this->validacionSession();
        $message = DAOFactory::getMessageDAO()->getMessage($this->_sesion->user->coduser);
        $this->_view->assign('menu', true);
        $this->_view->assign('all_messages', $message);
        $this->_view->renderizar(__FUNCTION__);
    }

    /*
     * Mensajes Por usuario
     */

    public function msgporusuario() {
        $message = "No se pudo realizar la acción.";
        $html = "";
        $status = false;
        $cod_user = $this->post('cod_user_from');
        $msgporusuario = DAOFactory::getMessageDAO()->verMessage($cod_user, $this->_sesion->user->coduser);
        $notiporusuario = DAOFactory::getNotificationDAO()->notificationsUser($this->_sesion->user->coduser);
        if (isset($msgporusuario) || ($notiporusuario)) {
            require_once APP_ROOT . '/controllers/class/renderFecha.php';
            $renderfecha = new renderFecha();
            $this->_view->assign('renderfecha', $renderfecha);
            $this->_view->assign('msg_por_usuario', $msgporusuario);
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $html = $this->_view->renderizar('contend_mis_mensajes');
            DAOFactory::getMessageDAO()->updateNotificacionesMessageUser($cod_user, $this->_sesion->user->coduser);
            $this->_sesion->user->nummsg = DAOFactory::getMessageDAO()->notificacionMessage($this->_sesion->user->coduser);
            $this->_sesion->user->notify = DAOFactory::getNotificationDAO()->notificationsUser($this->_sesion->user->coduser);
            $status = true;
            $message = "Operación realizada con exito.";
        }
        $this->_view->_print(array('html' => $html, 'status' => $status, 'message' => $message), true);
    }

    public function deletemsguser() {
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

    /*
     * Eliminar todos los mensajes de
     * Determinado Usuario
     */

    public function deleteallmessages() {
        $cod_from = $this->post('cod_from');
        $message = "No se pudo realizar la accion.";
        $status = false;
        $accion = DAOFactory::getMessageDAO()->deleteAllmessages($cod_from, $this->_sesion->user->coduser);
        if ($accion > 0) {
            $status = true;
            $message = "Operacion Realizada con exito.";
        }
        $this->_view->_print(array('status' => $status, 'message' => $message), true);
    }

    public function misnotificaciones() {
        $this->validacionSession();
        require_once APP_ROOT . '/controllers/class/renderFecha.php';
        require_once APP_ROOT . '/controllers/class/Zebra_Pagination.php';
        $renderfecha = new renderFecha();
        $this->_view->assign('renderfecha', $renderfecha);
        $this->_view->assign('menu', true);
        $this->_view->assign('allnotifications', $allnotifications);
        /*

         * $cantidad:obtengo cantidad de registros
         * $total = cantidad de rows que quiero mostrar
         * Zebra_Pagination (Libreria paginador PHP)
         * 
         * 
         *          */
        $cantidad = DAOFactory::getNotificationDAO()->verMas($this->_sesion->user->coduser);
        $total = 12;
        $paginacion = new Zebra_Pagination();
        $this->_view->assign('paginacion', $paginacion);
        $paginacion->records($cantidad);
        $paginacion->records_per_page($total);
        $pagination = (($paginacion->get_page() - 1) * $total);
        $notifications = DAOFactory::getNotificationDAO()->notificationsSenVer($this->_sesion->user->coduser, $pagination, $total);
        
        //se vuelve a cargar la session para que se quite el numero de notificaciones
        $this->_sesion->user = $this->loaduser($this->_sesion->user->coduser);
        $this->_view->assign('user', $this->_sesion->user);

        $this->_view->assign('notifications', $notifications);
        $this->_view->renderizar(__FUNCTION__);
    }

//eliminar una notificacion 
    public function deletenotificationuser() {
        $cod_notification = $this->post('cod_elimi_notifi');
        $message = "No se pudo realizar la acción";
        $status = false;
        $deletenoti = DAOFactory::getNotificationDAO()->delete($cod_notification);
        if ($deletenoti > 0) {
            $status = true;
            $message = "Operacion Realizada con Exito";
        }
        $this->_view->_print(array('status' => $status, 'message' => $message), true);
    }

//eliminar todas las notificaciones

    public function deleteallnotification() {
        $cod_user = $this->post('cod_user_delete_all_notifi');
        $message = "No se pudo realizar la accion";
        $status = false;
        $deleteallnotifi = DAOFactory::getNotificationDAO()->deleteAllNotification($cod_user);
        if ($deleteallnotifi > 0) {
            $status = true;
            $message = "Operacion Realizada con Exito";
            $this->_sesion->user->notify = DAOFactory::getNotificationDAO()->notificationsUser($this->_sesion->user->coduser);
        }
        $this->_view->_print(array('status' => $status, 'message' => $message), true);
    }

//actualizar cada vez que es vista una notificacion 
    public function updateviewednotification() {
        $cod_update_viewed = $this->post('cod_update_noti');
        $message = "No se pudo realizar la acción.";
        $status = false;
        $updateviewed = DAOFactory::getNotificationDAO()->updateNotificacionesUser($cod_update_viewed);

        if ($updateviewed > 0) {
            $status = true;
            $message = "Operación realizada con exito.";
//actualizar la variable de sesion
            $this->_sesion->user->notify = DAOFactory::getNotificationDAO()->notificationsUser($this->_sesion->user->coduser);
        }
        $this->_view->_print(array('status' => $status, 'message' => $message), true);
    }

    /*
     * Seccion Actividades :
     * $numdias : variable para darle el rango de fecha (dias)
     * $total :  Cantidad de registros a cargar
     * $totalactivi : Cantidad de registros.
     * Zebra : Libreria (Paginacion)
     *      */

    public function actividades() {
        $this->validacionSession();
        require_once APP_ROOT . '/controllers/class/Zebra_Pagination.php';
        $numdias = 10;
        $total = 9;
        $cantactivi = DAOFactory::getNotificationDAO()->cantidadActividadesTorneo($this->_sesion->user->coduser, $numdias);
        $canactiuserteam = DAOFactory::getNotificationDAO()->cantidadActividadesUserTeam($this->_sesion->user->coduser, $numdias);
        $totalactivi = $cantactivi + $canactiuserteam;
        $paginacion = new Zebra_Pagination();
        $this->_view->assign('paginacion', $paginacion);
        $paginacion->records($totalactivi);
        $paginacion->records_per_page($total);
        $pagination = (($paginacion->get_page() - 1) * $total);
        $actividadestorneo = DAOFactory::getNotificationDAO()->actividadesTorneo($this->_sesion->user->coduser, $pagination, $total, $numdias);
        $actividadesuserteam = DAOFactory::getNotificationDAO()->actividadUserTeam($this->_sesion->user->coduser, $numdias);
        $this->_view->assign('actividadestorneo', $actividadestorneo);
        $this->_view->assign('actividadesuserteam', $actividadesuserteam);
        $this->_view->assign('menu', true);
        $this->_view->renderizar(__FUNCTION__);
    }
    
   //para los partidos en mi perfil
    public function partidos_perfil() {
        require_once APP_ROOT . '/controllers/class/PaginatorBootstrap.php';
        $total_partidos = DAOFactory::getGamesDAO()->getCountGamesByType(1);
        $pagina = new PaginatorBootstrap("paginator_games", $total_partidos, 6, 1);

        $htmlpaginator = $pagina->getHtmlPaginator(true);

        $games_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina->inicio_limit, $pagina->fin_limit, 1);
        $types_futbol = DAOFactory::getVirtuesDAO()->getTypesGame();

        $games = $this->cargarDatos($games_info);

        $total_partidos_public = DAOFactory::getGamesDAO()->getCountGamesByType(2);

        $pagina_public = new PaginatorBootstrap("paginator_games_public", $total_partidos_public, 6, 1);

        $htmlpaginator_public = $pagina_public->getHtmlPaginator(true);
        $games_public_info = DAOFactory::getGamesDAO()->getSeccionesGames($pagina_public->inicio_limit, $pagina_public->fin_limit, 2);

        $gamesPublic = $this->cargarDatos($games_public_info);

        $urlencode = new EncodeURL();
        $this->_view->assign('types_futbol', $types_futbol);
        $this->_view->assign('htmlpaginator', $htmlpaginator);
        $this->_view->assign('htmlpaginator_public', $htmlpaginator_public);
        $this->_view->assign('urlencode', $urlencode);
        $this->_view->assign('games', $games);
        $this->_view->assign('gamesPublic', $gamesPublic);
        $this->_view->assign('menu', true);
        $this->_view->assign('iscreator', true);
        $this->_view->renderizar('partidos_perfil');
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

    public function notificationVisited(){
        $data['message'] = 'Notificacion no visitada, o ya visitada O_O.';
        $data['status'] = false;
        $codnotification = $this->post('codnotification');
        $notification = new Notification();
        $notification->codnotification= $codnotification;
        $notification->viewed= 1;
        $pasa = DAOFactory::getNotificationDAO()->update($notification);
        if($pasa){
            $data['message'] = 'Notificacion visitada.';
            $data['status'] = true;
        }
        $this->_view->_print($data, true);
    }
}


