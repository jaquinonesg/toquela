<?php 
 /**
 * Clase que opera sobre la tabla 'user_has_position'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class UserHasPositionMySqlDAO extends ModelDAO implements UserHasPositionDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return UserHasPosition
     */
    public function load($coduser,$codposition){
        
$this->set($coduser);
$this->set($codposition);
        $sql = "SELECT * FROM db_toquela.user_has_position WHERE  cod_user =  '$coduser' AND  cod_position =  '$codposition'";
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
        $sql = "SELECT * FROM db_toquela.user_has_position $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.user_has_position ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param userhasposition primary key
     */
    public function delete($coduser,$codposition){
            
$this->set($coduser);
$this->set($codposition);
            $sql = "DELETE FROM db_toquela.user_has_position WHERE  cod_user =  '$coduser' AND  cod_position =  '$codposition'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param UserHasPosition userhasposition
     */
    public function insert($userhasposition){
            ;
            
            $sql = "INSERT INTO db_toquela.user_has_position ( cod_user , cod_position ) 
                    VALUES ('$userhasposition->coduser','$userhasposition->codposition')";
            $id = $this->executeInsert($sql);	
            /*$userhasposition-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param UserHasPosition userhasposition
     */
    public function update($userhasposition){
        ;
        
        $sql = "UPDATE db_toquela.user_has_position  SET  WHERE  cod_user =  '$userhasposition->coduser' AND  cod_position =  '$userhasposition->codposition'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.user_has_position';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return UserHasPosition 
     */
    protected function readRow($row) {
        $userhasposition = new UserHasPosition();
        $userhasposition->coduser = $row['cod_user'];
        $userhasposition->codposition = $row['cod_position'];
        return $userhasposition;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.user_has_position";
         return $this->getList($sql, true);
    }
    
}

?>