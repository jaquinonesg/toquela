<?php 
 /**
 * Clase que opera sobre la tabla 'attachment'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class AttachmentMySqlDAO extends ModelDAO implements AttachmentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Attachment
     */
    public function load($codattachment){
        
$this->set($codattachment);
        $sql = "SELECT * FROM db_toquela.attachment WHERE  cod_attachment =  '$codattachment'";
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
        $sql = "SELECT * FROM db_toquela.attachment $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.attachment ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param attachment primary key
     */
    public function delete($codattachment){
            
$this->set($codattachment);
            $sql = "DELETE FROM db_toquela.attachment WHERE  cod_attachment =  '$codattachment'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Attachment attachment
     */
    public function insert($attachment){
            $this->set($attachment->type);
$this->set($attachment->path);
$this->set($attachment->description);
$this->set($attachment->date);
$this->set($attachment->namefile);
$this->set($attachment->nameencode);
            
            $sql = "INSERT INTO db_toquela.attachment ( type , path , description , date , name_file , name_encode ) 
                    VALUES ('$attachment->type','$attachment->path','$attachment->description','$attachment->date','$attachment->namefile','$attachment->nameencode')";
            $id = $this->executeInsert($sql);	
            /*$attachment-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Attachment attachment
     */
    public function update($attachment){
        $this->set($attachment->type);
$this->set($attachment->path);
$this->set($attachment->description);
$this->set($attachment->date);
$this->set($attachment->namefile);
$this->set($attachment->nameencode);
        
        $sql = "UPDATE db_toquela.attachment  SET 
		 type = if( strcmp('$attachment->type'  , '' ) = 1  , '$attachment->type', type ),
		 path = if( strcmp('$attachment->path'  , '' ) = 1  , '$attachment->path', path ),
		 description = if( strcmp('$attachment->description'  , '' ) = 1  , '$attachment->description', description ),
		 date = if( strcmp('$attachment->date'  , '' ) = 1  , '$attachment->date', date ),
		 name_file = if( strcmp('$attachment->namefile'  , '' ) = 1  , '$attachment->namefile', name_file ),
		 name_encode = if( strcmp('$attachment->nameencode'  , '' ) = 1  , '$attachment->nameencode', name_encode ) WHERE  cod_attachment =  '$attachment->codattachment'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.attachment';
        return $this->executeUpdate($sql);
    }


                        public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.attachment WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPath($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.attachment WHERE path  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.attachment WHERE description  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.attachment WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByNameFile($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.attachment WHERE name_file  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByNameEncode($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.attachment WHERE name_encode  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.attachment WHERE type  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPath($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.attachment WHERE path  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.attachment WHERE description  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.attachment WHERE date  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByNameFile($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.attachment WHERE name_file  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByNameEncode($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.attachment WHERE name_encode  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Attachment 
     */
    protected function readRow($row) {
        $attachment = new Attachment();
        $attachment->codattachment = $row['cod_attachment'];
        $attachment->type = $row['type'];
        $attachment->path = $row['path'];
        $attachment->description = $row['description'];
        $attachment->date = $row['date'];
        $attachment->namefile = $row['name_file'];
        $attachment->nameencode = $row['name_encode'];
        return $attachment;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.attachment";
         return $this->getList($sql, true);
    }
    
}

?>