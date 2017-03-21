<?php 
 /**
 * Clase que opera sobre la tabla 'statistics'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class StatisticsSqlServerDAO extends ModelDAO implements StatisticsDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Statistics
     */
    public function load($codmatch,$coduser){
        
$this->set($codmatch);
$this->set($coduser);
        $sql = "SELECT * FROM db_toquela.statistics WHERE  cod_match =  '$codmatch' AND  cod_user =  '$coduser'";
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
        $sql = "SELECT * FROM db_toquela.statistics $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.statistics ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param statistics primary key
     */
    public function delete($codmatch,$coduser){
            
$this->set($codmatch);
$this->set($coduser);
            $sql = "DELETE FROM db_toquela.statistics WHERE  cod_match =  '$codmatch' AND  cod_user =  '$coduser'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Statistics statistics
     */
    public function insert($statistics){
            $this->set($statistics->type);
$this->set($statistics->minute);
            
            $sql = "INSERT INTO db_toquela.statistics ( cod_match , cod_user , type , minute ) 
                    VALUES ('$statistics->codmatch','$statistics->coduser','$statistics->type','$statistics->minute')";
            $id = $this->executeInsert($sql);	
            /*$statistics-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Statistics statistics
     */
    public function update($statistics){
        $this->set($statistics->type);
$this->set($statistics->minute);
        
        $sql = "UPDATE db_toquela.statistics  SET 
		 type = iif( len('$statistics->type' ) <> 0  , '$statistics->type', type ),
		 minute = iif( len('$statistics->minute' ) <> 0  , '$statistics->minute', minute ) WHERE  cod_match =  '$statistics->codmatch' AND  cod_user =  '$statistics->coduser'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.statistics';
        return $this->executeUpdate($sql);
    }


                                    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByMinute($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE minute  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
                
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE type  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByMinute($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE minute  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Statistics 
     */
    protected function readRow($row) {
        $statistics = new Statistics();
        $statistics->codmatch = $row['cod_match'];
        $statistics->coduser = $row['cod_user'];
        $statistics->type = $row['type'];
        $statistics->minute = $row['minute'];
        return $statistics;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.statistics";
         return $this->getList($sql, true);
    }
    
}
  
?>
