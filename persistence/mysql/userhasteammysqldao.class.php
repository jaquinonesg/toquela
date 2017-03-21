<?php 
 /**
 * Clase que opera sobre la tabla 'user_has_team'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
 class UserHasTeamMySqlDAO extends ModelDAO implements UserHasTeamDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return UserHasTeam
     */
    public function load($coduser,$codteam){
        
        $this->set($coduser);
        $this->set($codteam);
        $sql = "SELECT * FROM db_toquela.user_has_team WHERE  cod_user =  '$coduser' AND  cod_team =  '$codteam'";
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
        $sql = "SELECT * FROM db_toquela.user_has_team $extra";
        return $this->getList($sql);
    }
    
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.user_has_team ORDER BY $orderColumn";
        return $this->getList($sql);
    }
    
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param userhasteam primary key
     */
    public function delete($coduser,$codteam){
        
        $this->set($coduser);
        $this->set($codteam);
        $sql = "DELETE FROM db_toquela.user_has_team WHERE  cod_user =  '$coduser' AND  cod_team =  '$codteam'";
        return $this->executeUpdate($sql);
    }
    
    /**
     * Insert record to table
     *
     * @param UserHasTeam userhasteam
     */
    public function insert($userhasteam){
        $this->set($userhasteam->status);
        
        $sql = "INSERT INTO db_toquela.user_has_team ( cod_user , cod_team , status ) 
        VALUES ('$userhasteam->coduser','$userhasteam->codteam','$userhasteam->status')";
        $id = $this->executeInsert($sql);	
        /*$userhasteam-> = $id;*/
        return $id;
    }
    
    /**
     * Update record in table
     *
     * @param UserHasTeam userhasteam
     */
    public function update($userhasteam){
        $this->set($userhasteam->status);
        
        $sql = "UPDATE db_toquela.user_has_team  SET 
        status = if( strcmp('$userhasteam->status'  , '' ) = 1  , '$userhasteam->status', status ) WHERE  cod_user =  '$userhasteam->coduser' AND  cod_team =  '$userhasteam->codteam'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.user_has_team';
        return $this->executeUpdate($sql);
    }


    public function queryByStatus($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.user_has_team WHERE status  = '$value'";
        return $this->getList($sql);    
    }
    
    
    
    
    public function deleteByStatus($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.user_has_team WHERE status  = '$value'";
        return $this->executeUpdate($sql);
    }
    
    
    
    
    /**
     * Read row
     *
     * @return UserHasTeam 
     */
    protected function readRow($row) {
        $userhasteam = new UserHasTeam();
        $userhasteam->coduser = $row['cod_user'];
        $userhasteam->codteam = $row['cod_team'];
        $userhasteam->status = $row['status'];
        return $userhasteam;
    }    
    
    
    public function describe(){
       $sql = "DESC db_toquela.user_has_team";
       return $this->getList($sql, true);
   }
   
}

?>