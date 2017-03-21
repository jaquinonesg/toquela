<?php

/**
 * Controlador Index
 *
 */
class FiltersController extends Controller {

    /**
     *
     * @var Users 
     */
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
    }

    public function getplayersmatch() {
        if ($this->_request->isAjax()) {
            $respuesta = array('status' => false, 'message' => "No se pudo realizar la acción", "players" => NULL);
            $team_local = $this->post("teamlocal");
            $team_visitant = $this->post("teamvisitant");
            $daoteam = DAOFactory::getTeamDAO();
            $data = new stdClass();
            $data->local = $daoteam->getPlayersByTeam($team_local);
            $data->visitant = $daoteam->getPlayersByTeam($team_visitant);
            if (isset($data->local) && isset($data->visitant)) {
                $respuesta = array('status' => true, 'message' => "Se cargaron correctamente los jugadores", "players" => $data);
            }
            $this->_view->_print($respuesta, true);
        }
    }
    
    public function autocomplete(){
        $term = $this->get('term');
        $typefilter = $this->get('typefilter');
        $codtournament = $this->get('torn');
        if (!empty($term) && is_numeric($codtournament)) {
            $data_request = null;
            switch ($typefilter) {
                case 1:
                    //equipos
                    $data_request = DAOFactory::getTeamDAO()->autocompleteTeam($term);
                    break;
                case 2:
                    //Jugadores
                    $data_request = DAOFactory::getUsersDAO()->autocompleteUserAndTournament($term, $codtournament);
                    break;
                case 3:
                    //Complejos - Lugares
                    $data_request = DAOFactory::getMatchDAO()->autocompleteComplexAndTournament($term, $codtournament);
                    break;
                case 4:
                    //Arbitros
                    $data_request = DAOFactory::getMatchDAO()->autocompleteArbitrosAndTournament($term, $codtournament);
                    break;
                default :
                    $data_request = NULL;
                    break;
            }
            $this->_view->_print($data_request);
        }
    }

}
