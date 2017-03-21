<?php 
 
/**
 * Objeto que representa la tabla 'message'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-01-27 17:35	 
 */
class Message {
    
    public $codmessage;
    public $text;
    public $subject;
    public $date;
    public $viewed;
    public $state;
    public $from;
    public $to;
    public $codteam;
        
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