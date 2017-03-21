<?php 
 /**
 * Clase que opera sobre la tabla 'comment'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class CommentMySqlDAO extends ModelDAO implements CommentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Comment
     */
    public function load($codcomment){
        
$this->set($codcomment);
        $sql = "SELECT * FROM db_toquela.comment WHERE  cod_comment =  '$codcomment'";
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
        $sql = "SELECT * FROM db_toquela.comment $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.comment ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param comment primary key
     */
    public function delete($codcomment){
            
$this->set($codcomment);
            $sql = "DELETE FROM db_toquela.comment WHERE  cod_comment =  '$codcomment'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Comment comment
     */
    public function insert($comment){
            $this->set($comment->message);
$this->set($comment->codmatch);
$this->set($comment->coduser);
            
            $sql = "INSERT INTO db_toquela.comment ( message , cod_match , cod_user ) 
                    VALUES ('$comment->message','$comment->codmatch','$comment->coduser')";
            $id = $this->executeInsert($sql);	
            /*$comment-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Comment comment
     */
    public function update($comment){
        $this->set($comment->message);
$this->set($comment->codmatch);
$this->set($comment->coduser);
        
        $sql = "UPDATE db_toquela.comment  SET 
		 message = if( strcmp('$comment->message'  , '' ) = 1  , '$comment->message', message ),
		 cod_match = if( strcmp('$comment->codmatch'  , '' ) = 1  , '$comment->codmatch', cod_match ),
		 cod_user = if( strcmp('$comment->coduser'  , '' ) = 1  , '$comment->coduser', cod_user ) WHERE  cod_comment =  '$comment->codcomment'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.comment';
        return $this->executeUpdate($sql);
    }


                        public function queryByMessage($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.comment WHERE message  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodMatch($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.comment WHERE cod_match  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.comment WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByMessage($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.comment WHERE message  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodMatch($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.comment WHERE cod_match  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.comment WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Comment 
     */
    protected function readRow($row) {
        $comment = new Comment();
        $comment->codcomment = $row['cod_comment'];
        $comment->message = $row['message'];
        $comment->codmatch = $row['cod_match'];
        $comment->coduser = $row['cod_user'];
        return $comment;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.comment";
         return $this->getList($sql, true);
    }
    
}

?>