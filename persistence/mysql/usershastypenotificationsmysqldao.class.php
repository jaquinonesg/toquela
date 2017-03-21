<?php 
 /**
 * Clase que opera sobre la tabla 'users_has_typenotifications'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-02-10 15:26
 */
class UsersHasTypenotificationsMySqlDAO extends ModelDAO implements UsersHasTypenotificationsDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return UsersHasTypenotifications
     */
    public function load($coduser,$codtypenotifications){
        
$this->set($coduser);
$this->set($codtypenotifications);
        $sql = "SELECT * FROM db_toquela.users_has_typenotifications WHERE  cod_user =  '$coduser' AND  codtypenotifications =  '$codtypenotifications'";
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
        $sql = "SELECT * FROM db_toquela.users_has_typenotifications $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.users_has_typenotifications ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param usershastypenotifications primary key
     */
    public function delete($coduser,$codtypenotifications){
            
$this->set($coduser);
$this->set($codtypenotifications);
            $sql = "DELETE FROM db_toquela.users_has_typenotifications WHERE  cod_user =  '$coduser' AND  codtypenotifications =  '$codtypenotifications'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param UsersHasTypenotifications usershastypenotifications
     */
    public function insert($usershastypenotifications){
            ;
            
            $sql = "INSERT INTO db_toquela.users_has_typenotifications ( cod_user , codtypenotifications ) 
                    VALUES ('$usershastypenotifications->coduser','$usershastypenotifications->codtypenotifications')";
            $id = $this->executeInsert($sql);	
            /*$usershastypenotifications-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param UsersHasTypenotifications usershastypenotifications
     */
    public function update($usershastypenotifications){
        ;
        
        $sql = "UPDATE db_toquela.users_has_typenotifications  SET  WHERE  cod_user =  '$usershastypenotifications->coduser' AND  codtypenotifications =  '$usershastypenotifications->codtypenotifications'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.users_has_typenotifications';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return UsersHasTypenotifications 
     */
    protected function readRow($row) {
        $usershastypenotifications = new UsersHasTypenotifications();
        $usershastypenotifications->coduser = $row['cod_user'];
        $usershastypenotifications->codtypenotifications = $row['codtypenotifications'];
        return $usershastypenotifications;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.users_has_typenotifications";
         return $this->getList($sql, true);
    }
    
}

?>