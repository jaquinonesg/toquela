<?php 
 
/**
 * Objeto que representa la tabla 'aditional'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-01-27 11:44	 
 */
class Aditional {
    
    public $coduser;
    public $typedoc;
    public $numdoc;
    public $datebirth;
    public $category;
    public $typeblood;
    public $eps;
    public $profession;
    public $university;
    public $nationality;
    public $guardian;
    public $teamcarnet;
        
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