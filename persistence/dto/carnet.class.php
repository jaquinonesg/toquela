<?php 
 
/**
 * Objeto que representa la tabla 'carnet'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-01-23 10:43	 
 */
class Carnet {
    
    public $codtournament;
    public $nombre;
    public $id;
    public $auxdata;
    public $data;
    public $cods;
    public $logofilename;
    public $logoname;
        
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