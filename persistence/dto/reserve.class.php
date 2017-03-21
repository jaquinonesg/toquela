<?php 
 
/**
 * Objeto que representa la tabla 'reserve'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-07-24 15:50	 
 */
class Reserve {
    
    public $codreserve;
    public $amount;
    public $deposit;
    public $canal;
    public $start;
    public $end;
    public $coduser;
    public $codsubcomplex;
    public $date;
    public $codschedule;
    public $codgames;
        
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