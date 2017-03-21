<?php 
 /**
 * Clase que opera sobre la tabla 'sub_complex'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class SubComplexSqlServerDAO extends ModelDAO implements SubComplexDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return SubComplex
     */
    public function load($codsubcomplex){
        
$this->set($codsubcomplex);
        $sql = "SELECT * FROM db_toquela.sub_complex WHERE  cod_sub_complex =  '$codsubcomplex'";
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
        $sql = "SELECT * FROM db_toquela.sub_complex $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.sub_complex ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param subcomplex primary key
     */
    public function delete($codsubcomplex){
            
$this->set($codsubcomplex);
            $sql = "DELETE FROM db_toquela.sub_complex WHERE  cod_sub_complex =  '$codsubcomplex'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param SubComplex subcomplex
     */
    public function insert($subcomplex){
            $this->set($subcomplex->name);
$this->set($subcomplex->codcomplex);
            
            $sql = "INSERT INTO db_toquela.sub_complex ( name , cod_complex ) 
                    VALUES ('$subcomplex->name','$subcomplex->codcomplex')";
            $id = $this->executeInsert($sql);	
            /*$subcomplex-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param SubComplex subcomplex
     */
    public function update($subcomplex){
        $this->set($subcomplex->name);
$this->set($subcomplex->codcomplex);
        
        $sql = "UPDATE db_toquela.sub_complex  SET 
		 name = iif( len('$subcomplex->name' ) <> 0  , '$subcomplex->name', name ),
		 cod_complex = iif( len('$subcomplex->codcomplex' ) <> 0  , '$subcomplex->codcomplex', cod_complex ) WHERE  cod_sub_complex =  '$subcomplex->codsubcomplex'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.sub_complex';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.sub_complex WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.sub_complex WHERE cod_complex  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.sub_complex WHERE name  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCodComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.sub_complex WHERE cod_complex  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return SubComplex 
     */
    protected function readRow($row) {
        $subcomplex = new SubComplex();
        $subcomplex->codsubcomplex = $row['cod_sub_complex'];
        $subcomplex->name = $row['name'];
        $subcomplex->codcomplex = $row['cod_complex'];
        return $subcomplex;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.sub_complex";
         return $this->getList($sql, true);
    }
    
}
  
?>
