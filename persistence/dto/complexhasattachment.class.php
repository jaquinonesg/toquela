<?php 
 
/**
 * Objeto que representa la tabla 'complex_has_attachment'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-05-08 12:59	 
 */
class ComplexHasAttachment {
    
    public $codattachment;
    public $codcomplex;
    public $codsubcomplex;
        
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