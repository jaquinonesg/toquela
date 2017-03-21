<?php 
 
/**
 * Objeto que representa la tabla 'users'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2014-11-19 11:29	 
 */
class Users {
        const SKILLEDLEG_DERECHA = 'DERECHA';

    const SKILLEDLEG_IZQUIERDA = 'IZQUIERDA';

    const SKILLEDLEG_AMBAS = 'AMBAS';

    public $coduser;
    public $id;
    public $name;
    public $lastname;
    public $phone;
    public $cellular;
    public $address;
    public $city;
    public $username;
    public $password;
    public $email;
    public $sex;
    public $age;
    public $longitude;
    public $latitude;
    public $skilledleg;
    public $codlocality;
    public $codrole;
    public $idfan;
    public $privilegios;
        
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

    public static function validateSexByNum($num_sex) {
        switch ($num_sex) {
            case 1:
            return "HOMBRE";
            break;
            case 2:
            return "MUJER";
            break;
            case 3:
            return "UNDEFINED";
            break;
        }
        return null;
    }

}

?>