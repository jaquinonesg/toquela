<?php

/**
 * Description of autocompleteController
 *
 * @author Jhon
 */
class AutocompleteController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
    }

    public function index() {
        
    }

    public function city() {
        $term = $this->get('term');
        if (!empty($term)) {
            $data_request = DAOFactory::getCityDAO()->autocompleteCity($term);
            $this->_view->_print($data_request);
        }
    }
    
    public function team() {
        $term = $this->get('term');
        if (!empty($term)) {
            $data_request = DAOFactory::getTeamDAO()->autocompleteTeam($term);
            $this->_view->_print($data_request);
        }
    }

}