<?php 
 /**
 * Clase que opera sobre la tabla 'team_has_virtues'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
 class TeamHasVirtuesMySqlDAO extends ModelDAO implements TeamHasVirtuesDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return TeamHasVirtues
     */
    public function load($codteam,$codvirtues){

        $this->set($codteam);
        $this->set($codvirtues);
        $sql = "SELECT * FROM db_toquela.team_has_virtues WHERE  cod_team =  '$codteam' AND  cod_virtues =  '$codvirtues'";
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
        $sql = "SELECT * FROM db_toquela.team_has_virtues $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.team_has_virtues ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param teamhasvirtues primary key
     */
    public function delete($codteam,$codvirtues){

        $this->set($codteam);
        $this->set($codvirtues);
        $sql = "DELETE FROM db_toquela.team_has_virtues WHERE  cod_team =  '$codteam' AND  cod_virtues =  '$codvirtues'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param TeamHasVirtues teamhasvirtues
     */
    public function insert($teamhasvirtues){
        $sql = "INSERT INTO db_toquela.team_has_virtues ( cod_team , cod_virtues )
        VALUES ('$teamhasvirtues->codteam','$teamhasvirtues->codvirtues')";
        $id = $this->executeInsert($sql);	
        /*$teamhasvirtues-> = $id;*/
        return $id;
    }

    /**
     * Update record in table
     *
     * @param TeamHasVirtues teamhasvirtues
     */
    public function update($teamhasvirtues){
        $sql = "UPDATE db_toquela.team_has_virtues  SET  WHERE  cod_team =  '$teamhasvirtues->codteam' AND  cod_virtues =  '$teamhasvirtues->codvirtues'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.team_has_virtues';
        return $this->executeUpdate($sql);
    }







    /**
     * Read row
     *
     * @return TeamHasVirtues 
     */
    protected function readRow($row) {
        $teamhasvirtues = new TeamHasVirtues();
        $teamhasvirtues->codteam = $row['cod_team'];
        $teamhasvirtues->codvirtues = $row['cod_virtues'];
        return $teamhasvirtues;
    }    
    
    
    public function describe(){
       $sql = "DESC db_toquela.team_has_virtues";
       return $this->getList($sql, true);
   }

}

?>