<?php 
 
/**
 * Objeto que representa la tabla 'users_has_typenotifications'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-02-10 15:26	 
 */
class UsersHasTypenotifications {
    
    public $coduser;
    public $codtypenotifications;
        
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