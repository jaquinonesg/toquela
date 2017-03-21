<?php

/**
 * Objeto que representa la tabla 'team'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2013-12-16 16:56	 
 */
class Team {

    const TYPE_MALE = 'MALE';
    const TYPE_FEMALE = 'FEMALE';
    const TYPE_MIXED = 'MIXED';

    public $codteam;
    public $name;
    public $type;
    public $codlocality;
    public $description;

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

    public static function validateGeneroNumber($num_type) {
        switch ($num_type) {
            case 1:
                return Team::TYPE_MALE;
                break;
            case 2:
                return Team::TYPE_FEMALE;
                break;
            case 3:
                return Team::TYPE_MIXED;
                break;
        }
        return null;
    }

}

?>