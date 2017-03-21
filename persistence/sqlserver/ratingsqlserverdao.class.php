<?php 
 /**
 * Clase que opera sobre la tabla 'rating'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class RatingSqlServerDAO extends ModelDAO implements RatingDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Rating
     */
    public function load($coduser,$codmatch){
        
$this->set($coduser);
$this->set($codmatch);
        $sql = "SELECT * FROM db_toquela.rating WHERE  cod_user =  '$coduser' AND  cod_match =  '$codmatch'";
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
        $sql = "SELECT * FROM db_toquela.rating $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.rating ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param rating primary key
     */
    public function delete($coduser,$codmatch){
            
$this->set($coduser);
$this->set($codmatch);
            $sql = "DELETE FROM db_toquela.rating WHERE  cod_user =  '$coduser' AND  cod_match =  '$codmatch'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Rating rating
     */
    public function insert($rating){
            $this->set($rating->score);
            
            $sql = "INSERT INTO db_toquela.rating ( cod_user , cod_match , score ) 
                    VALUES ('$rating->coduser','$rating->codmatch','$rating->score')";
            $id = $this->executeInsert($sql);	
            /*$rating-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Rating rating
     */
    public function update($rating){
        $this->set($rating->score);
        
        $sql = "UPDATE db_toquela.rating  SET 
		 score = iif( len('$rating->score' ) <> 0  , '$rating->score', score ) WHERE  cod_user =  '$rating->coduser' AND  cod_match =  '$rating->codmatch'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.rating';
        return $this->executeUpdate($sql);
    }


                                    public function queryByScore($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.rating WHERE score  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
                
            public function deleteByScore($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.rating WHERE score  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Rating 
     */
    protected function readRow($row) {
        $rating = new Rating();
        $rating->coduser = $row['cod_user'];
        $rating->codmatch = $row['cod_match'];
        $rating->score = $row['score'];
        return $rating;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.rating";
         return $this->getList($sql, true);
    }
    
}
  
?>
