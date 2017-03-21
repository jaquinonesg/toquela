<?php 
 /**
 * Clase que opera sobre la tabla 'match'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class MatchSqlServerDAO extends ModelDAO implements MatchDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Match
     */
    public function load($codmatch){
        
$this->set($codmatch);
        $sql = "SELECT * FROM db_toquela.match WHERE  cod_match =  '$codmatch'";
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
        $sql = "SELECT * FROM db_toquela.match $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.match ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param match primary key
     */
    public function delete($codmatch){
            
$this->set($codmatch);
            $sql = "DELETE FROM db_toquela.match WHERE  cod_match =  '$codmatch'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Match match
     */
    public function insert($match){
            $this->set($match->date);
$this->set($match->hour);
$this->set($match->location);
$this->set($match->codcomplex);
            
            $sql = "INSERT INTO db_toquela.match ( date , hour , location , cod_complex ) 
                    VALUES ('$match->date','$match->hour','$match->location','$match->codcomplex')";
            $id = $this->executeInsert($sql);	
            /*$match-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Match match
     */
    public function update($match){
        $this->set($match->date);
$this->set($match->hour);
$this->set($match->location);
$this->set($match->codcomplex);
        
        $sql = "UPDATE db_toquela.match  SET 
		 date = iif( len('$match->date' ) <> 0  , '$match->date', date ),
		 hour = iif( len('$match->hour' ) <> 0  , '$match->hour', hour ),
		 location = iif( len('$match->location' ) <> 0  , '$match->location', location ),
		 cod_complex = iif( len('$match->codcomplex' ) <> 0  , '$match->codcomplex', cod_complex ) WHERE  cod_match =  '$match->codmatch'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.match';
        return $this->executeUpdate($sql);
    }


                        public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByHour($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE hour  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLocation($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE location  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE cod_complex  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE date  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByHour($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE hour  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByLocation($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE location  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCodComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE cod_complex  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Match 
     */
    protected function readRow($row) {
        $match = new Match();
        $match->codmatch = $row['cod_match'];
        $match->date = $row['date'];
        $match->hour = $row['hour'];
        $match->location = $row['location'];
        $match->codcomplex = $row['cod_complex'];
        return $match;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.match";
         return $this->getList($sql, true);
    }
    
}
  
?>
