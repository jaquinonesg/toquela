<?php 
 
/**
 * Objeto que representa la tabla 'postulategame'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-06-27 15:24	 
 */
class Postulategame {
    
    public $codpostulategame;
    public $codgames;
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