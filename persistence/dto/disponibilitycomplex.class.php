<?php 
 
/**
 * Objeto que representa la tabla 'disponibility_complex'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2013-12-16 16:56	 
 */
class DisponibilityComplex {
    const DAY_LUNES = 'LUNES';

    const DAY_MARTES = 'MARTES';

    const DAY_MIERCOLES = 'MIERCOLES';

    const DAY_JUEVES = 'JUEVES';

    const DAY_VIERNES = 'VIERNES';

    const DAY_SABADO = 'SABADO';

    const DAY_DOMINGO = 'DOMINGO';

    public $coddisponibilitycomplex;
    public $day;
    public $hour;
    public $codcomplex;
    public $codtariff;
        
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