<?php

/**
 * Description of tableroController
 *
 * @author Jhon
 */
class TableroController extends Controller {

    /**
     *
     * @var Users 
     */
    private $_user;
    private $num_element_pag = 6;

    public function __construct() {
        parent::__construct();
        $this->_user = $this->_sesion->user;
        if (is_object($this->_user)) {
            $this->_view->assign('user', $this->_user);
        }
    }

    public function index() {
        
    }

    public function informacion($code_tournament = null) {
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            $news = DAOFactory::getNewsDAO()->getNewsByTournment($tournament->codtournament);
            $this->_view->assign('tournament', $tournament);
            $this->_view->assign('news', $news);
            $this->_view->setTitle("Información Torneo");
            $this->_view->setItems("only", array('informacion_torneo.css'));
            $this->_view->assign('menu_item', 3);
            $this->_view->renderizar("informacion_torneo");
        }
    }

    public function publico($code_tournament = null) {
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            if (isset($tournament)) {
                $news = DAOFactory::getNewsDAO()->getNewsByTournment($tournament->codtournament);
                $numteams = DAOFactory::getTournamentDAO()->getNumTeamsByTournament($tournament->codtournament);
                $this->paginator_person($numteams, $this->num_element_pag, 1);
                $teams = null;
                if (isset($this->_user->coduser)) {
                    $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByTournamentAndUser($tournament->codtournament, $this->_user->coduser, 0, $this->num_element_pag);
                } else {
                    $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByTournament($tournament->codtournament, 0, $this->num_element_pag);
                }
                $this->_view->setTitle("Información Torneo");
                $urlencode = new EncodeURL();
                $this->_view->assign('urlencode', $urlencode);
                $this->_view->assign('teams', $teams);
                $this->_view->assign('news', $news);
                $this->_view->setItems("only", array('informacion_torneo.css', 'publico.js'));
                $this->_view->assign('tournament', $tournament);
                $this->_view->renderizar(__FUNCTION__);
            }
        }
    }

    public function public_pag_equipos() {
        $data["message"] = "No se pudo realizar la acción.";
        $data["status"] = false;
        $data["html"] = null;
        if ($this->_request->isAjax()) {
            $pag = $this->post('pag');
            $code_tournament = $this->post('torneo');
            if (is_numeric($pag) && is_numeric($code_tournament)) {
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $this->_view->assign('template', 'paginar_equipos');
                $numteams = DAOFactory::getTournamentDAO()->getNumTeamsByTournament($code_tournament);
                $this->paginator_person($numteams, $this->num_element_pag, $pag);
                $teams = null;
                $limit_init = (($pag - 1) * $this->num_element_pag);
                if (isset($this->_user->coduser)) {
                    $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByTournamentAndUser($code_tournament, $this->_user->coduser, $limit_init, $this->num_element_pag);
                } else {
                    $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByTournament($code_tournament, $limit_init, $this->num_element_pag);
                }
                $urlencode = new EncodeURL();
                $this->_view->assign('urlencode', $urlencode);
                $this->_view->assign('teams', $teams);
                $data["message"] = "Operación realizada con éxito.";
                $data["status"] = true;
                $data["html"] = $this->_view->renderizar();
            }
        }
        $this->_view->_print($data, true);
    }

    public function publish() {
        if ($this->_request->isAjax()) {
            $type = $this->post('type');
            $text = $this->post('text');
            $code_tournament = $this->post('code');
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            if (is_numeric($type) && !empty($text) && is_numeric($tournament->codtournament) && $this->_user->codrole == 2 || $this->_user->codrole == 3) {
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
                        DAOFactory::getNewsDAO()->insertNullDate($dto);
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
                $news = DAOFactory::getNewsDAO()->getNewsByTournment($tournament->codtournament);
                $this->_view->assign('news', $news);
                $this->_view->setLayout('empty');
                $this->_view->setOutput(false);
                $this->_view->assign('template', 'news');
                $html = $this->_view->renderizar();
                $this->_view->_print(array('html' => $html));
            }
        }
    }

    public function publico_temp($code_tournament = null) {
        if (!is_null($code_tournament) && is_numeric($code_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($code_tournament);
            if (isset($tournament)) {
                $news = DAOFactory::getNewsDAO()->getNewsByTournment($tournament->codtournament);
                $numteams = DAOFactory::getTournamentDAO()->getNumTeamsByTournament($tournament->codtournament);
                $this->paginator_person($numteams, $this->num_element_pag, 1);
                $teams = null;
                if (isset($this->_user->coduser)) {
                    $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByTournamentAndUser($tournament->codtournament, $this->_user->coduser, 0, $this->num_element_pag);
                } else {
                    $teams = DAOFactory::getUserHasTeamDAO()->getTeamsByTournament($tournament->codtournament, 0, $this->num_element_pag);
                }
                $this->_view->setTitle("Información Torneo");
                $urlencode = new EncodeURL();
                $this->_view->assign('urlencode', $urlencode);
                $this->_view->assign('teams', $teams);
                $this->_view->assign('news', $news);
                $this->_view->setItems("only", array('informacion_torneo.css', 'publico.js'));
                $this->_view->assign('tournament', $tournament);


                /**
                 * Variables Home y noticias
                 */
                $num_noticias = DAOFactory::getNoticiasDAO()->getCountAllTournament($code_tournament);
                if($num_noticias <= 0){
                    $this->_view->assign('noticias',false);
                }else{
                    $this->_view->assign('noticias',true);
                    $noticias = DAOFactory::getNoticiasDAO()->getbyTournament($code_tournament);

                    /**Extraer fecha*/
                    foreach ($noticias as $val) {
                        $DateArray = explode(' ',$val->date);
                        $fecha = explode('-',$DateArray[0]);
                        $val->date =  $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];
                    }
                    /**fin fecha*/
                    
                    $noticias_slide = array($noticias[0]);
                    array_shift($noticias);
                    while( $noticias[0]->prioridadtorneo == 1){
                        array_push($noticias_slide,$noticias[0]);
                        array_shift($noticias);
                    }
                    /**recortar el resumen a 200 letras*/
                    for ($i=0; $i < count($noticias); $i++) { 
                        $noticias[$i]->resumen = substr($noticias[$i]->resumen,0,200) . '...';
                    }

                    $this->_view->assign("noticia_principal", $noticias_slide);
                    $this->_view->assign("mas_noticias",$noticias);
                }
                /**
                 * fin Home y noticias
                 */

                $this->_view->renderizar(__FUNCTION__);
            }
        }
    }

}
