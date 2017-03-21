<?php 
 
/**
 * Objeto que representa la tabla 'user_has_attachment'
 *
 * @author: Hernán Cortés Navarro
 * 
 * @date: 2013-12-16 16:56	 
 */
class UserHasAttachment {
    const TYPE_PERFIL = 'PERFIL';

    const TYPE_FOTO = 'FOTO';

    const TYPE_YOUTUBE = 'YOUTUBE';

    public $codattachment;
    public $coduser;
    public $type;
    public $variable;
        
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