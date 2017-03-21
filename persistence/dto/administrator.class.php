<?php 
 
/**
 * Objeto que representa la tabla 'administrator'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2013-12-16 16:56	 
 */
class Administrator {
    
    public $codadministrator;
    public $name;
    public $password;
    public $email;
    public $address;
    public $phone;
    public $isdiary;
    public $isuser;
    public $iscomplex;
    public $isindex;
    public $codcomplex;
    public $istoquela;
        
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