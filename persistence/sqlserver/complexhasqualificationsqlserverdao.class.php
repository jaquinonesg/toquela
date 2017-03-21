<?php 
 /**
 * Clase que opera sobre la tabla 'complex_has_qualification'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-08-28 12:05
 */
class ComplexHasQualificationSqlServerDAO extends ModelDAO implements ComplexHasQualificationDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return ComplexHasQualification
     */
    public function load($codqualification,$codcomplex,$coduser){
        
$this->set($codqualification);
$this->set($codcomplex);
$this->set($coduser);
        $sql = "SELECT * FROM db_toquela.complex_has_qualification WHERE  cod_qualification =  '$codqualification' AND  cod_complex =  '$codcomplex' AND  cod_user =  '$coduser'";
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
        $sql = "SELECT * FROM db_toquela.complex_has_qualification $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.complex_has_qualification ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param complexhasqualification primary key
     */
    public function delete($codqualification,$codcomplex,$coduser){
            
$this->set($codqualification);
$this->set($codcomplex);
$this->set($coduser);
            $sql = "DELETE FROM db_toquela.complex_has_qualification WHERE  cod_qualification =  '$codqualification' AND  cod_complex =  '$codcomplex' AND  cod_user =  '$coduser'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param ComplexHasQualification complexhasqualification
     */
    public function insert($complexhasqualification){
            $this->set($complexhasqualification->qualification);
            
            $sql = "INSERT INTO db_toquela.complex_has_qualification ( cod_qualification , cod_complex , cod_user , qualification ) 
                    VALUES ('$complexhasqualification->codqualification','$complexhasqualification->codcomplex','$complexhasqualification->coduser','$complexhasqualification->qualification')";
            $id = $this->executeInsert($sql);	
            /*$complexhasqualification-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param ComplexHasQualification complexhasqualification
     */
    public function update($complexhasqualification){
        $this->set($complexhasqualification->qualification);
        
        $sql = "UPDATE db_toquela.complex_has_qualification  SET 
		 qualification = iif( len('$complexhasqualification->qualification' ) <> 0  , '$complexhasqualification->qualification', qualification ) WHERE  cod_qualification =  '$complexhasqualification->codqualification' AND  cod_complex =  '$complexhasqualification->codcomplex' AND  cod_user =  '$complexhasqualification->coduser'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.complex_has_qualification';
        return $this->executeUpdate($sql);
    }


                                                public function queryByQualification($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex_has_qualification WHERE qualification  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
                
                
            public function deleteByQualification($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex_has_qualification WHERE qualification  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return ComplexHasQualification 
     */
    protected function readRow($row) {
        $complexhasqualification = new ComplexHasQualification();
        $complexhasqualification->codqualification = $row['cod_qualification'];
        $complexhasqualification->codcomplex = $row['cod_complex'];
        $complexhasqualification->coduser = $row['cod_user'];
        $complexhasqualification->qualification = $row['qualification'];
        return $complexhasqualification;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.complex_has_qualification";
         return $this->getList($sql, true);
    }
    
}
  
?>
