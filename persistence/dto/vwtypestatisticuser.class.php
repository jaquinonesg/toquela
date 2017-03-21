<?php 
 
/**
 * Objeto que representa la tabla 'vw_type_statistic_user'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2013-12-16 16:56	 
 */
class VwTypeStatisticUser {
    
    public $codtypestatistic;
    public $name;
    public $icon;
    public $minute;
    public $coduser;
    public $username;
    public $lastname;
    public $codmatch;
        
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