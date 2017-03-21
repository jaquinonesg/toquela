<?php 
 
/**
 * Objeto que representa la tabla 'match_has_team'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2013-10-27 16:21	 
 */
class MatchHasTeam {
    
    public $codmatch;
    public $codteam;
    public $local;
    public $score;
        
    /**
     * Obtiene los datos tanto del post como del get 
     * para guardarlos dentro del objeto
     * 
     */
    public function set() {
        $variable = get_class_vars(__CLASS__);
        foreach ($variable as $key => $value) {
            if (!is_null(Controller::get($key))) {
                $this->$key = Controller::get($key);
            } elseif (!is_null(Controller::post($key))) {
                $this->$key = Controller::post($key);
            } else {
                $this->$key = $value;
            }
        }
    }

}
  
?>