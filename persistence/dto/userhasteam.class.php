<?php 
 
/**
 * Objeto que representa la tabla 'user_has_team'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2013-12-16 16:56	 
 */
class UserHasTeam {
    const STATUS_CAPTAIN = 'CAPTAIN';

    const STATUS_CREATOR = 'CREATOR';

    const STATUS_PLAYER = 'PLAYER';

    const STATUS_POSTULANT = 'POSTULANT';

    public $coduser;
    public $codteam;
    public $status;
        
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