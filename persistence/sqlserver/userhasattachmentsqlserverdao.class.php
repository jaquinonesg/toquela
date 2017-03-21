<?php 
 /**
 * Clase que opera sobre la tabla 'user_has_attachment'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class UserHasAttachmentSqlServerDAO extends ModelDAO implements UserHasAttachmentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return UserHasAttachment
     */
    public function load($codattachment,$coduser){
        
$this->set($codattachment);
$this->set($coduser);
        $sql = "SELECT * FROM db_toquela.user_has_attachment WHERE  cod_attachment =  '$codattachment' AND  cod_user =  '$coduser'";
        return $this->getRow($sql);
    }

    /**
     * Obtiene todo los registro de la tabla
     */
    /**
     * Obtener todos los registro de las tablas
     */
    public function queryAll($limit = null, $page = null) {
        $extra = "";
        if (!is_null($page)) {
            $this->set($page);
            $this->set($limit);
            $page = abs((int) $page);
            if (!preg_match('!^\d+$!', $limit)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            if (!preg_match('!^\d+$!', $page)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            $limit = abs($limit);
            $extra = "  LIMIT $page , $limit";
        } elseif (!is_null($limit)) {
            if (!preg_match('!^\d+$!', $limit)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            $extra = " LIMIT $limit";
        }
        $sql = "SELECT * FROM db_toquela.user_has_attachment $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.user_has_attachment ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param userhasattachment primary key
     */
    public function delete($codattachment,$coduser){
            
$this->set($codattachment);
$this->set($coduser);
            $sql = "DELETE FROM db_toquela.user_has_attachment WHERE  cod_attachment =  '$codattachment' AND  cod_user =  '$coduser'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param UserHasAttachment userhasattachment
     */
    public function insert($userhasattachment){
            $this->set($userhasattachment->type);
$this->set($userhasattachment->variable);
            
            $sql = "INSERT INTO db_toquela.user_has_attachment ( cod_attachment , cod_user , type , variable ) 
                    VALUES ('$userhasattachment->codattachment','$userhasattachment->coduser','$userhasattachment->type','$userhasattachment->variable')";
            $id = $this->executeInsert($sql);	
            /*$userhasattachment-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param UserHasAttachment userhasattachment
     */
    public function update($userhasattachment){
        $this->set($userhasattachment->type);
$this->set($userhasattachment->variable);
        
        $sql = "UPDATE db_toquela.user_has_attachment  SET 
		 type = iif( len('$userhasattachment->type' ) <> 0  , '$userhasattachment->type', type ),
		 variable = iif( len('$userhasattachment->variable' ) <> 0  , '$userhasattachment->variable', variable ) WHERE  cod_attachment =  '$userhasattachment->codattachment' AND  cod_user =  '$userhasattachment->coduser'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.user_has_attachment';
        return $this->executeUpdate($sql);
    }


                                    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.user_has_attachment WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByVariable($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.user_has_attachment WHERE variable  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
                
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.user_has_attachment WHERE type  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByVariable($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.user_has_attachment WHERE variable  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return UserHasAttachment 
     */
    protected function readRow($row) {
        $userhasattachment = new UserHasAttachment();
        $userhasattachment->codattachment = $row['cod_attachment'];
        $userhasattachment->coduser = $row['cod_user'];
        $userhasattachment->type = $row['type'];
        $userhasattachment->variable = $row['variable'];
        return $userhasattachment;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.user_has_attachment";
         return $this->getList($sql, true);
    }
    
}
  
?>
