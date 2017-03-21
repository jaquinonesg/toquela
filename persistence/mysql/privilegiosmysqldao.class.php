<?php 
 /**
 * Clase que opera sobre la tabla 'privilegios'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-11-19 10:44
 */
class PrivilegiosMySqlDAO extends ModelDAO implements PrivilegiosDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Privilegios
     */
    public function load($idprivilegios){
        
$this->set($idprivilegios);
        $sql = "SELECT * FROM db_toquela.privilegios WHERE  idprivilegios =  '$idprivilegios'";
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
        $sql = "SELECT * FROM db_toquela.privilegios $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.privilegios ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param privilegios primary key
     */
    public function delete($idprivilegios){
            
$this->set($idprivilegios);
            $sql = "DELETE FROM db_toquela.privilegios WHERE  idprivilegios =  '$idprivilegios'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Privilegios privilegios
     */
    public function insert($privilegios){
            $this->set($privilegios->nombre);
$this->set($privilegios->descripcion);
$this->set($privilegios->link);
            
            $sql = "INSERT INTO db_toquela.privilegios ( nombre , descripcion , link ) 
                    VALUES ('$privilegios->nombre','$privilegios->descripcion','$privilegios->link')";
            $id = $this->executeInsert($sql);	
            /*$privilegios-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Privilegios privilegios
     */
    public function update($privilegios){
        $this->set($privilegios->nombre);
$this->set($privilegios->descripcion);
$this->set($privilegios->link);
        
        $sql = "UPDATE db_toquela.privilegios  SET 
		 nombre = if( strcmp('$privilegios->nombre'  , '' ) = 1  , '$privilegios->nombre', nombre ),
		 descripcion = if( strcmp('$privilegios->descripcion'  , '' ) = 1  , '$privilegios->descripcion', descripcion ),
		 link = if( strcmp('$privilegios->link'  , '' ) = 1  , '$privilegios->link', link ) WHERE  idprivilegios =  '$privilegios->idprivilegios'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.privilegios';
        return $this->executeUpdate($sql);
    }


                        public function queryByNombre($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.privilegios WHERE nombre  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescripcion($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.privilegios WHERE descripcion  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLink($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.privilegios WHERE link  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByNombre($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.privilegios WHERE nombre  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescripcion($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.privilegios WHERE descripcion  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLink($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.privilegios WHERE link  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Privilegios 
     */
    protected function readRow($row) {
        $privilegios = new Privilegios();
        $privilegios->idprivilegios = $row['idprivilegios'];
        $privilegios->nombre = $row['nombre'];
        $privilegios->descripcion = $row['descripcion'];
        $privilegios->link = $row['link'];
        return $privilegios;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.privilegios";
         return $this->getList($sql, true);
    }
    
}

?>