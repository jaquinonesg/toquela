<?php 
 /**
 * Clase que opera sobre la tabla 'mailtemp'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-02-03 11:36
 */
class MailtempMySqlDAO extends ModelDAO implements MailtempDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Mailtemp
     */
    public function load($codmailtemp){
        
$this->set($codmailtemp);
        $sql = "SELECT * FROM db_toquela.mailtemp WHERE  codmailtemp =  '$codmailtemp'";
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
        $sql = "SELECT * FROM db_toquela.mailtemp $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.mailtemp ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param mailtemp primary key
     */
    public function delete($codmailtemp){
            
$this->set($codmailtemp);
            $sql = "DELETE FROM db_toquela.mailtemp WHERE  codmailtemp =  '$codmailtemp'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Mailtemp mailtemp
     */
    public function insert($mailtemp){
            $this->set($mailtemp->tomails);
$this->set($mailtemp->subject);
$this->set($mailtemp->text);
$this->set($mailtemp->date);
$this->set($mailtemp->state);
$this->set($mailtemp->prioritydate);
$this->set($mailtemp->priorityhour);
            
            $sql = "INSERT INTO db_toquela.mailtemp ( tomails , subject , text , date , state , prioritydate , priorityhour ) 
                    VALUES ('$mailtemp->tomails','$mailtemp->subject','$mailtemp->text','$mailtemp->date','$mailtemp->state','$mailtemp->prioritydate','$mailtemp->priorityhour')";
            $id = $this->executeInsert($sql);	
            /*$mailtemp-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Mailtemp mailtemp
     */
    public function update($mailtemp){
        $this->set($mailtemp->tomails);
$this->set($mailtemp->subject);
$this->set($mailtemp->text);
$this->set($mailtemp->date);
$this->set($mailtemp->state);
$this->set($mailtemp->prioritydate);
$this->set($mailtemp->priorityhour);
        
        $sql = "UPDATE db_toquela.mailtemp  SET 
		 tomails = if( strcmp('$mailtemp->tomails'  , '' ) = 1  , '$mailtemp->tomails', tomails ),
		 subject = if( strcmp('$mailtemp->subject'  , '' ) = 1  , '$mailtemp->subject', subject ),
		 text = if( strcmp('$mailtemp->text'  , '' ) = 1  , '$mailtemp->text', text ),
		 date = if( strcmp('$mailtemp->date'  , '' ) = 1  , '$mailtemp->date', date ),
		 state = if( strcmp('$mailtemp->state'  , '' ) = 1  , '$mailtemp->state', state ),
		 prioritydate = if( strcmp('$mailtemp->prioritydate'  , '' ) = 1  , '$mailtemp->prioritydate', prioritydate ),
		 priorityhour = if( strcmp('$mailtemp->priorityhour'  , '' ) = 1  , '$mailtemp->priorityhour', priorityhour ) WHERE  codmailtemp =  '$mailtemp->codmailtemp'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.mailtemp';
        return $this->executeUpdate($sql);
    }


                        public function queryByTomails($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.mailtemp WHERE tomails  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryBySubject($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.mailtemp WHERE subject  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByText($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.mailtemp WHERE text  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.mailtemp WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByState($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.mailtemp WHERE state  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPrioritydate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.mailtemp WHERE prioritydate  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPriorityhour($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.mailtemp WHERE priorityhour  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByTomails($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.mailtemp WHERE tomails  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteBySubject($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.mailtemp WHERE subject  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByText($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.mailtemp WHERE text  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.mailtemp WHERE date  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByState($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.mailtemp WHERE state  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPrioritydate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.mailtemp WHERE prioritydate  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPriorityhour($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.mailtemp WHERE priorityhour  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Mailtemp 
     */
    protected function readRow($row) {
        $mailtemp = new Mailtemp();
        $mailtemp->codmailtemp = $row['codmailtemp'];
        $mailtemp->tomails = $row['tomails'];
        $mailtemp->subject = $row['subject'];
        $mailtemp->text = $row['text'];
        $mailtemp->date = $row['date'];
        $mailtemp->state = $row['state'];
        $mailtemp->prioritydate = $row['prioritydate'];
        $mailtemp->priorityhour = $row['priorityhour'];
        return $mailtemp;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.mailtemp";
         return $this->getList($sql, true);
    }
    
}

?>