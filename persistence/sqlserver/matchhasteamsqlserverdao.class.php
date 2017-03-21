<?php 
 /**
 * Clase que opera sobre la tabla 'match_has_team'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class MatchHasTeamSqlServerDAO extends ModelDAO implements MatchHasTeamDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return MatchHasTeam
     */
    public function load($codmatch,$codteam){
        
$this->set($codmatch);
$this->set($codteam);
        $sql = "SELECT * FROM db_toquela.match_has_team WHERE  cod_match =  '$codmatch' AND  cod_team =  '$codteam'";
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
        $sql = "SELECT * FROM db_toquela.match_has_team $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.match_has_team ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param matchhasteam primary key
     */
    public function delete($codmatch,$codteam){
            
$this->set($codmatch);
$this->set($codteam);
            $sql = "DELETE FROM db_toquela.match_has_team WHERE  cod_match =  '$codmatch' AND  cod_team =  '$codteam'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param MatchHasTeam matchhasteam
     */
    public function insert($matchhasteam){
            ;
            
            $sql = "INSERT INTO db_toquela.match_has_team ( cod_match , cod_team ) 
                    VALUES ('$matchhasteam->codmatch','$matchhasteam->codteam')";
            $id = $this->executeInsert($sql);	
            /*$matchhasteam-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param MatchHasTeam matchhasteam
     */
    public function update($matchhasteam){
        ;
        
        $sql = "UPDATE db_toquela.match_has_team  SET  WHERE  cod_match =  '$matchhasteam->codmatch' AND  cod_team =  '$matchhasteam->codteam'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.match_has_team';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return MatchHasTeam 
     */
    protected function readRow($row) {
        $matchhasteam = new MatchHasTeam();
        $matchhasteam->codmatch = $row['cod_match'];
        $matchhasteam->codteam = $row['cod_team'];
        return $matchhasteam;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.match_has_team";
         return $this->getList($sql, true);
    }
    
}
  
?>
