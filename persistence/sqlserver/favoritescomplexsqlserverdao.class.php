<?php 
 /**
 * Clase que opera sobre la tabla 'favorites_complex'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class FavoritesComplexSqlServerDAO extends ModelDAO implements FavoritesComplexDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return FavoritesComplex
     */
    public function load($coduser,$codcomplex){
        
$this->set($coduser);
$this->set($codcomplex);
        $sql = "SELECT * FROM db_toquela.favorites_complex WHERE  cod_user =  '$coduser' AND  cod_complex =  '$codcomplex'";
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
        $sql = "SELECT * FROM db_toquela.favorites_complex $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.favorites_complex ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param favoritescomplex primary key
     */
    public function delete($coduser,$codcomplex){
            
$this->set($coduser);
$this->set($codcomplex);
            $sql = "DELETE FROM db_toquela.favorites_complex WHERE  cod_user =  '$coduser' AND  cod_complex =  '$codcomplex'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param FavoritesComplex favoritescomplex
     */
    public function insert($favoritescomplex){
            ;
            
            $sql = "INSERT INTO db_toquela.favorites_complex ( cod_user , cod_complex ) 
                    VALUES ('$favoritescomplex->coduser','$favoritescomplex->codcomplex')";
            $id = $this->executeInsert($sql);	
            /*$favoritescomplex-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param FavoritesComplex favoritescomplex
     */
    public function update($favoritescomplex){
        ;
        
        $sql = "UPDATE db_toquela.favorites_complex  SET  WHERE  cod_user =  '$favoritescomplex->coduser' AND  cod_complex =  '$favoritescomplex->codcomplex'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.favorites_complex';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return FavoritesComplex 
     */
    protected function readRow($row) {
        $favoritescomplex = new FavoritesComplex();
        $favoritescomplex->coduser = $row['cod_user'];
        $favoritescomplex->codcomplex = $row['cod_complex'];
        return $favoritescomplex;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.favorites_complex";
         return $this->getList($sql, true);
    }
    
}
  
?>
