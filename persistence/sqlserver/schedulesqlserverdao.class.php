<?php 
 /**
 * Clase que opera sobre la tabla 'schedule'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-30 11:44
 */
class ScheduleSqlServerDAO extends ModelDAO implements ScheduleDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Schedule
     */
    public function load($codschedule){
        
$this->set($codschedule);
        $sql = "SELECT * FROM db_toquela.schedule WHERE  cod_schedule =  '$codschedule'";
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
        $sql = "SELECT * FROM db_toquela.schedule $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.schedule ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param schedule primary key
     */
    public function delete($codschedule){
            
$this->set($codschedule);
            $sql = "DELETE FROM db_toquela.schedule WHERE  cod_schedule =  '$codschedule'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Schedule schedule
     */
    public function insert($schedule){
            $this->set($schedule->day);
$this->set($schedule->starthour);
$this->set($schedule->endhour);
$this->set($schedule->price);
$this->set($schedule->codsubcomplex);
$this->set($schedule->status);
            
            $sql = "INSERT INTO db_toquela.schedule ( day , start_hour , end_hour , price , cod_sub_complex , status ) 
                    VALUES ('$schedule->day','$schedule->starthour','$schedule->endhour','$schedule->price','$schedule->codsubcomplex','$schedule->status')";
            $id = $this->executeInsert($sql);	
            /*$schedule-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Schedule schedule
     */
    public function update($schedule){
        $this->set($schedule->day);
$this->set($schedule->starthour);
$this->set($schedule->endhour);
$this->set($schedule->price);
$this->set($schedule->codsubcomplex);
$this->set($schedule->status);
        
        $sql = "UPDATE db_toquela.schedule  SET 
		 day = iif( len('$schedule->day' ) <> 0  , '$schedule->day', day ),
		 start_hour = iif( len('$schedule->starthour' ) <> 0  , '$schedule->starthour', start_hour ),
		 end_hour = iif( len('$schedule->endhour' ) <> 0  , '$schedule->endhour', end_hour ),
		 price = iif( len('$schedule->price' ) <> 0  , '$schedule->price', price ),
		 cod_sub_complex = iif( len('$schedule->codsubcomplex' ) <> 0  , '$schedule->codsubcomplex', cod_sub_complex ),
		 status = iif( len('$schedule->status' ) <> 0  , '$schedule->status', status ) WHERE  cod_schedule =  '$schedule->codschedule'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.schedule';
        return $this->executeUpdate($sql);
    }


                        public function queryByDay($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.schedule WHERE day  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByStartHour($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.schedule WHERE start_hour  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByEndHour($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.schedule WHERE end_hour  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPrice($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.schedule WHERE price  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodSubComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.schedule WHERE cod_sub_complex  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByStatus($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.schedule WHERE status  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByDay($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.schedule WHERE day  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByStartHour($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.schedule WHERE start_hour  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByEndHour($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.schedule WHERE end_hour  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByPrice($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.schedule WHERE price  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCodSubComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.schedule WHERE cod_sub_complex  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByStatus($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.schedule WHERE status  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Schedule 
     */
    protected function readRow($row) {
        $schedule = new Schedule();
        $schedule->codschedule = $row['cod_schedule'];
        $schedule->day = $row['day'];
        $schedule->starthour = $row['start_hour'];
        $schedule->endhour = $row['end_hour'];
        $schedule->price = $row['price'];
        $schedule->codsubcomplex = $row['cod_sub_complex'];
        $schedule->status = $row['status'];
        return $schedule;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.schedule";
         return $this->getList($sql, true);
    }
    
}
  
?>
