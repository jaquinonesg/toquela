<?php 
 /**
 * Clase que opera sobre la tabla 'statistics'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-11-25 12:27
 */
class StatisticsMySqlDAO extends ModelDAO implements StatisticsDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Statistics
     */
    public function load($codstatistics){
        
$this->set($codstatistics);
        $sql = "SELECT * FROM db_toquela.statistics WHERE  cod_statistics =  '$codstatistics'";
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
        $sql = "SELECT * FROM db_toquela.statistics ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param statistics primary key
     */
    public function delete($codstatistics){
            
$this->set($codstatistics);
            $sql = "DELETE FROM db_toquela.statistics WHERE  cod_statistics =  '$codstatistics'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Statistics statistics
     */
    public function insert($statistics){
            $this->set($statistics->minute);
$this->set($statistics->date);
$this->set($statistics->islocal);
$this->set($statistics->description);
$this->set($statistics->codtypestatistic);
$this->set($statistics->coduser);
$this->set($statistics->codmatch);
$this->set($statistics->estado);
            
            $sql = "INSERT INTO db_toquela.statistics ( minute , date , is_local , description , cod_type_statistic , cod_user , cod_match , estado ) 
                    VALUES ('$statistics->minute','$statistics->date','$statistics->islocal','$statistics->description','$statistics->codtypestatistic','$statistics->coduser','$statistics->codmatch','$statistics->estado')";
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
        $this->set($statistics->minute);
$this->set($statistics->date);
$this->set($statistics->islocal);
$this->set($statistics->description);
$this->set($statistics->codtypestatistic);
$this->set($statistics->coduser);
$this->set($statistics->codmatch);
$this->set($statistics->estado);
        
        $sql = "UPDATE db_toquela.statistics  SET 
		 minute = if( strcmp('$statistics->minute'  , '' ) = 1  , '$statistics->minute', minute ),
		 date = if( strcmp('$statistics->date'  , '' ) = 1  , '$statistics->date', date ),
		 is_local = if( strcmp('$statistics->islocal'  , '' ) = 1  , '$statistics->islocal', is_local ),
		 description = if( strcmp('$statistics->description'  , '' ) = 1  , '$statistics->description', description ),
		 cod_type_statistic = if( strcmp('$statistics->codtypestatistic'  , '' ) = 1  , '$statistics->codtypestatistic', cod_type_statistic ),
		 cod_user = if( strcmp('$statistics->coduser'  , '' ) = 1  , '$statistics->coduser', cod_user ),
		 cod_match = if( strcmp('$statistics->codmatch'  , '' ) = 1  , '$statistics->codmatch', cod_match ),
		 estado = if( strcmp('$statistics->estado'  , '' ) = 1  , '$statistics->estado', estado ) WHERE  cod_statistics =  '$statistics->codstatistics'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.statistics';
        return $this->executeUpdate($sql);
    }


                        public function queryByMinute($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE minute  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByIsLocal($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE is_local  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE description  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodTypeStatistic($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE cod_type_statistic  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodMatch($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE cod_match  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByEstado($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.statistics WHERE estado  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByMinute($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE minute  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE date  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByIsLocal($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE is_local  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE description  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodTypeStatistic($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE cod_type_statistic  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodMatch($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE cod_match  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByEstado($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.statistics WHERE estado  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Statistics 
     */
    protected function readRow($row) {
        $statistics = new Statistics();
        $statistics->codstatistics = $row['cod_statistics'];
        $statistics->minute = $row['minute'];
        $statistics->date = $row['date'];
        $statistics->islocal = $row['is_local'];
        $statistics->description = $row['description'];
        $statistics->codtypestatistic = $row['cod_type_statistic'];
        $statistics->coduser = $row['cod_user'];
        $statistics->codmatch = $row['cod_match'];
        $statistics->estado = $row['estado'];
        return $statistics;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.statistics";
         return $this->getList($sql, true);
    }
    
}

?>