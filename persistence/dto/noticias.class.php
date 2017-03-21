<?php 
 
/**
 * Objeto que representa la tabla 'noticias'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2015-07-23 14:13	 
 */
class Noticias {
    
    public $codnews;
    public $message;
    public $type;
    public $date;
    public $codtournament;
    public $coduser;
    public $resumen;
    public $locimg;
    public $titulo;
    public $prioridadtorneo;
    public $prioridadhome;
        
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