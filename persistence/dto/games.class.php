<?php 
 
/**
 * Objeto que representa la tabla 'games'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-07-24 15:50	 
 */
class Games {
    
    public $codgames;
    public $datetimegame;
    public $description;
    public $status;
    public $type;
    public $codcomplex;
    public $confirmcomplex;
    public $codteammanager;
    public $codusermanager;
    public $codteamrival;
    public $codmatch;
    public $idcourtamateur;
        
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