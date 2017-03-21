<?php 
 
/**
 * Objeto que representa la tabla 'team_has_attachment'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-11-11 11:11	 
 */
class TeamHasAttachment {
    
    public $codattachment;
    public $codteam;
    public $status;
        
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