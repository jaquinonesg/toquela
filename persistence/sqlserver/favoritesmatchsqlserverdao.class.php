<?php 
 /**
 * Clase que opera sobre la tabla 'favorites_match'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class FavoritesMatchSqlServerDAO extends ModelDAO implements FavoritesMatchDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return FavoritesMatch
     */
    public function load($coduser,$codmatch){
        
$this->set($coduser);
$this->set($codmatch);
        $sql = "SELECT * FROM db_toquela.favorites_match WHERE  cod_user =  '$coduser' AND  cod_match =  '$codmatch'";
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
        $sql = "SELECT * FROM db_toquela.favorites_match $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.favorites_match ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param favoritesmatch primary key
     */
    public function delete($coduser,$codmatch){
            
$this->set($coduser);
$this->set($codmatch);
            $sql = "DELETE FROM db_toquela.favorites_match WHERE  cod_user =  '$coduser' AND  cod_match =  '$codmatch'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param FavoritesMatch favoritesmatch
     */
    public function insert($favoritesmatch){
            ;
            
            $sql = "INSERT INTO db_toquela.favorites_match ( cod_user , cod_match ) 
                    VALUES ('$favoritesmatch->coduser','$favoritesmatch->codmatch')";
            $id = $this->executeInsert($sql);	
            /*$favoritesmatch-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param FavoritesMatch favoritesmatch
     */
    public function update($favoritesmatch){
        ;
        
        $sql = "UPDATE db_toquela.favorites_match  SET  WHERE  cod_user =  '$favoritesmatch->coduser' AND  cod_match =  '$favoritesmatch->codmatch'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.favorites_match';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return FavoritesMatch 
     */
    protected function readRow($row) {
        $favoritesmatch = new FavoritesMatch();
        $favoritesmatch->coduser = $row['cod_user'];
        $favoritesmatch->codmatch = $row['cod_match'];
        return $favoritesmatch;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.favorites_match";
         return $this->getList($sql, true);
    }
    
}
  
?>
