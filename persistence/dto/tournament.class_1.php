<?php 
 
/**
 * Objeto que representa la tabla 'tournament'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2013-10-23 11:21	 
 */
class Tournament {
    
    public $codtournament;
    public $name;
    public $type;
    public $description;
    public $numberparticipants;
    public $poster;
    public $start;
    public $end;
    public $contacts;
    public $rules;
    public $inscriptions;
    public $places;
    public $date;
    public $coduser;
        
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