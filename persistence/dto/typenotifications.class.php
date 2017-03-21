<?php 
 
/**
 * Objeto que representa la tabla 'typenotifications'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-02-03 11:36	 
 */
class Typenotifications {
    
    public $codtypenotifications;
    public $name;
    public $description;
        
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