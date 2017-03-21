<?php 
 
/**
 * Objeto que representa la tabla 'match'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2015-05-22 16:41	 
 */
class Match {
    
    public $codmatch;
    public $date;
    public $hour;
    public $round;
    public $group;
    public $type;
    public $codcomplex;
    public $teamlocal;
    public $scorelocal;
    public $teamvisitant;
    public $scorevisitant;
    public $codtournament;
    public $description;
    public $descriptionplace;
    public $numjornada;
    public $estate;
    public $arbitros;
    public $statescorevisitant;
    public $statescorelocal;
    public $golesfavorlocal;
    public $golescontralocal;
    public $golesfavorvisitant;
    public $golescontravisitant;
        
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