<?php 
 /**
 * Clase que opera sobre la tabla 'notification'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-02-12 09:35
 */
class NotificationMySqlDAO extends ModelDAO implements NotificationDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Notification
     */
    public function load($codnotification){
        
$this->set($codnotification);
        $sql = "SELECT * FROM db_toquela.notification WHERE  codnotification =  '$codnotification'";
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
        $sql = "SELECT * FROM db_toquela.notification $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.notification ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param notification primary key
     */
    public function delete($codnotification){
            
$this->set($codnotification);
            $sql = "DELETE FROM db_toquela.notification WHERE  codnotification =  '$codnotification'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Notification notification
     */
    public function insert($notification){
            $this->set($notification->text);
$this->set($notification->subject);
$this->set($notification->date);
$this->set($notification->viewed);
$this->set($notification->state);
$this->set($notification->link);
$this->set($notification->codtypenotifications);
$this->set($notification->coduser);
$this->set($notification->codteam);
            
            $sql = "INSERT INTO db_toquela.notification ( text , subject , date , viewed , state , link , codtypenotifications , cod_user , cod_team ) 
                    VALUES ('$notification->text','$notification->subject','$notification->date','$notification->viewed','$notification->state','$notification->link','$notification->codtypenotifications','$notification->coduser','$notification->codteam')";
            $id = $this->executeInsert($sql);	
            /*$notification-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Notification notification
     */
    public function update($notification){
        $this->set($notification->text);
$this->set($notification->subject);
$this->set($notification->date);
$this->set($notification->viewed);
$this->set($notification->state);
$this->set($notification->link);
$this->set($notification->codtypenotifications);
$this->set($notification->coduser);
$this->set($notification->codteam);
        
        $sql = "UPDATE db_toquela.notification  SET 
		 text = if( strcmp('$notification->text'  , '' ) = 1  , '$notification->text', text ),
		 subject = if( strcmp('$notification->subject'  , '' ) = 1  , '$notification->subject', subject ),
		 date = if( strcmp('$notification->date'  , '' ) = 1  , '$notification->date', date ),
		 viewed = if( strcmp('$notification->viewed'  , '' ) = 1  , '$notification->viewed', viewed ),
		 state = if( strcmp('$notification->state'  , '' ) = 1  , '$notification->state', state ),
		 link = if( strcmp('$notification->link'  , '' ) = 1  , '$notification->link', link ),
		 codtypenotifications = if( strcmp('$notification->codtypenotifications'  , '' ) = 1  , '$notification->codtypenotifications', codtypenotifications ),
		 cod_user = if( strcmp('$notification->coduser'  , '' ) = 1  , '$notification->coduser', cod_user ),
		 cod_team = if( strcmp('$notification->codteam'  , '' ) = 1  , '$notification->codteam', cod_team ) WHERE  codnotification =  '$notification->codnotification'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.notification';
        return $this->executeUpdate($sql);
    }


                        public function queryByText($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE text  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryBySubject($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE subject  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByViewed($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE viewed  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByState($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE state  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLink($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE link  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodtypenotifications($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE codtypenotifications  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodTeam($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.notification WHERE cod_team  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByText($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE text  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteBySubject($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE subject  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE date  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByViewed($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE viewed  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByState($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE state  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLink($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE link  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodtypenotifications($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE codtypenotifications  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodTeam($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.notification WHERE cod_team  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Notification 
     */
    protected function readRow($row) {
        $notification = new Notification();
        $notification->codnotification = $row['codnotification'];
        $notification->text = $row['text'];
        $notification->subject = $row['subject'];
        $notification->date = $row['date'];
        $notification->viewed = $row['viewed'];
        $notification->state = $row['state'];
        $notification->link = $row['link'];
        $notification->codtypenotifications = $row['codtypenotifications'];
        $notification->coduser = $row['cod_user'];
        $notification->codteam = $row['cod_team'];
        return $notification;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.notification";
         return $this->getList($sql, true);
    }
    
}

?>