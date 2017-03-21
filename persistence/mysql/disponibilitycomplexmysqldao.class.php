<?php 
 /**
 * Clase que opera sobre la tabla 'disponibility_complex'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class DisponibilityComplexMySqlDAO extends ModelDAO implements DisponibilityComplexDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return DisponibilityComplex
     */
    public function load($coddisponibilitycomplex){
        
$this->set($coddisponibilitycomplex);
        $sql = "SELECT * FROM db_toquela.disponibility_complex WHERE  cod_disponibility_complex =  '$coddisponibilitycomplex'";
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
        $sql = "SELECT * FROM db_toquela.disponibility_complex $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.disponibility_complex ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param disponibilitycomplex primary key
     */
    public function delete($coddisponibilitycomplex){
            
$this->set($coddisponibilitycomplex);
            $sql = "DELETE FROM db_toquela.disponibility_complex WHERE  cod_disponibility_complex =  '$coddisponibilitycomplex'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param DisponibilityComplex disponibilitycomplex
     */
    public function insert($disponibilitycomplex){
            $this->set($disponibilitycomplex->day);
$this->set($disponibilitycomplex->hour);
$this->set($disponibilitycomplex->codcomplex);
$this->set($disponibilitycomplex->codtariff);
            
            $sql = "INSERT INTO db_toquela.disponibility_complex ( day , hour , cod_complex , cod_tariff ) 
                    VALUES ('$disponibilitycomplex->day','$disponibilitycomplex->hour','$disponibilitycomplex->codcomplex','$disponibilitycomplex->codtariff')";
            $id = $this->executeInsert($sql);	
            /*$disponibilitycomplex-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param DisponibilityComplex disponibilitycomplex
     */
    public function update($disponibilitycomplex){
        $this->set($disponibilitycomplex->day);
$this->set($disponibilitycomplex->hour);
$this->set($disponibilitycomplex->codcomplex);
$this->set($disponibilitycomplex->codtariff);
        
        $sql = "UPDATE db_toquela.disponibility_complex  SET 
		 day = if( strcmp('$disponibilitycomplex->day'  , '' ) = 1  , '$disponibilitycomplex->day', day ),
		 hour = if( strcmp('$disponibilitycomplex->hour'  , '' ) = 1  , '$disponibilitycomplex->hour', hour ),
		 cod_complex = if( strcmp('$disponibilitycomplex->codcomplex'  , '' ) = 1  , '$disponibilitycomplex->codcomplex', cod_complex ),
		 cod_tariff = if( strcmp('$disponibilitycomplex->codtariff'  , '' ) = 1  , '$disponibilitycomplex->codtariff', cod_tariff ) WHERE  cod_disponibility_complex =  '$disponibilitycomplex->coddisponibilitycomplex'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.disponibility_complex';
        return $this->executeUpdate($sql);
    }


                        public function queryByDay($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.disponibility_complex WHERE day  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByHour($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.disponibility_complex WHERE hour  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.disponibility_complex WHERE cod_complex  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodTariff($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.disponibility_complex WHERE cod_tariff  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByDay($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.disponibility_complex WHERE day  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByHour($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.disponibility_complex WHERE hour  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.disponibility_complex WHERE cod_complex  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodTariff($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.disponibility_complex WHERE cod_tariff  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return DisponibilityComplex 
     */
    protected function readRow($row) {
        $disponibilitycomplex = new DisponibilityComplex();
        $disponibilitycomplex->coddisponibilitycomplex = $row['cod_disponibility_complex'];
        $disponibilitycomplex->day = $row['day'];
        $disponibilitycomplex->hour = $row['hour'];
        $disponibilitycomplex->codcomplex = $row['cod_complex'];
        $disponibilitycomplex->codtariff = $row['cod_tariff'];
        return $disponibilitycomplex;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.disponibility_complex";
         return $this->getList($sql, true);
    }
    
}

?>