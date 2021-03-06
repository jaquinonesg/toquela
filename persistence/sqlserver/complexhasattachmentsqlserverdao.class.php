<?php 
 /**
 * Clase que opera sobre la tabla 'complex_has_attachment'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class ComplexHasAttachmentSqlServerDAO extends ModelDAO implements ComplexHasAttachmentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return ComplexHasAttachment
     */
    public function load($codattachment,$codcomplex){
        
$this->set($codattachment);
$this->set($codcomplex);
        $sql = "SELECT * FROM db_toquela.complex_has_attachment WHERE  cod_attachment =  '$codattachment' AND  cod_complex =  '$codcomplex'";
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
        $sql = "SELECT * FROM db_toquela.complex_has_attachment $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.complex_has_attachment ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param complexhasattachment primary key
     */
    public function delete($codattachment,$codcomplex){
            
$this->set($codattachment);
$this->set($codcomplex);
            $sql = "DELETE FROM db_toquela.complex_has_attachment WHERE  cod_attachment =  '$codattachment' AND  cod_complex =  '$codcomplex'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param ComplexHasAttachment complexhasattachment
     */
    public function insert($complexhasattachment){
            ;
            
            $sql = "INSERT INTO db_toquela.complex_has_attachment ( cod_attachment , cod_complex ) 
                    VALUES ('$complexhasattachment->codattachment','$complexhasattachment->codcomplex')";
            $id = $this->executeInsert($sql);	
            /*$complexhasattachment-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param ComplexHasAttachment complexhasattachment
     */
    public function update($complexhasattachment){
        ;
        
        $sql = "UPDATE db_toquela.complex_has_attachment  SET  WHERE  cod_attachment =  '$complexhasattachment->codattachment' AND  cod_complex =  '$complexhasattachment->codcomplex'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.complex_has_attachment';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return ComplexHasAttachment 
     */
    protected function readRow($row) {
        $complexhasattachment = new ComplexHasAttachment();
        $complexhasattachment->codattachment = $row['cod_attachment'];
        $complexhasattachment->codcomplex = $row['cod_complex'];
        return $complexhasattachment;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.complex_has_attachment";
         return $this->getList($sql, true);
    }
    
}
  
?>
