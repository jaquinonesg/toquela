<?php 
 /**
 * Clase que opera sobre la tabla 'news'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class NewsMySqlDAO extends ModelDAO implements NewsDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return News
     */
    public function load($codnews){
        
$this->set($codnews);
        $sql = "SELECT * FROM db_toquela.news WHERE  cod_news =  '$codnews'";
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
        $sql = "SELECT * FROM db_toquela.news $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.news ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param news primary key
     */
    public function delete($codnews){
            
$this->set($codnews);
            $sql = "DELETE FROM db_toquela.news WHERE  cod_news =  '$codnews'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param News news
     */
    public function insert($news){
            $this->set($news->message);
$this->set($news->type);
$this->set($news->date);
$this->set($news->codtournament);
$this->set($news->coduser);
            
            $sql = "INSERT INTO db_toquela.news ( message , type , date , cod_tournament , cod_user ) 
                    VALUES ('$news->message','$news->type','$news->date','$news->codtournament','$news->coduser')";
            $id = $this->executeInsert($sql);	
            /*$news-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param News news
     */
    public function update($news){
        $this->set($news->message);
$this->set($news->type);
$this->set($news->date);
$this->set($news->codtournament);
$this->set($news->coduser);
        
        $sql = "UPDATE db_toquela.news  SET 
		 message = if( strcmp('$news->message'  , '' ) = 1  , '$news->message', message ),
		 type = if( strcmp('$news->type'  , '' ) = 1  , '$news->type', type ),
		 date = if( strcmp('$news->date'  , '' ) = 1  , '$news->date', date ),
		 cod_tournament = if( strcmp('$news->codtournament'  , '' ) = 1  , '$news->codtournament', cod_tournament ),
		 cod_user = if( strcmp('$news->coduser'  , '' ) = 1  , '$news->coduser', cod_user ) WHERE  cod_news =  '$news->codnews'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.news';
        return $this->executeUpdate($sql);
    }


                        public function queryByMessage($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.news WHERE message  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.news WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.news WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodTournament($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.news WHERE cod_tournament  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.news WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByMessage($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.news WHERE message  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.news WHERE type  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.news WHERE date  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodTournament($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.news WHERE cod_tournament  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.news WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return News 
     */
    protected function readRow($row) {
        $news = new News();
        $news->codnews = $row['cod_news'];
        $news->message = $row['message'];
        $news->type = $row['type'];
        $news->date = $row['date'];
        $news->codtournament = $row['cod_tournament'];
        $news->coduser = $row['cod_user'];
        return $news;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.news";
         return $this->getList($sql, true);
    }
    
}

?>