<?php 
 
/**
 * Objeto que representa la tabla 'notification'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-02-12 09:35	 
 */
class Notification {
    
    public $codnotification;
    public $text;
    public $subject;
    public $date;
    public $viewed;
    public $state;
    public $link;
    public $codtypenotifications;
    public $coduser;
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