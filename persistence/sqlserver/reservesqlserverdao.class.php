<?php 
 /**
 * Clase que opera sobre la tabla 'reserve'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-31 11:04
 */
class ReserveSqlServerDAO extends ModelDAO implements ReserveDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Reserve
     */
    public function load($codreserve){
        
$this->set($codreserve);
        $sql = "SELECT * FROM db_toquela.reserve WHERE  cod_reserve =  '$codreserve'";
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
        $sql = "SELECT * FROM db_toquela.reserve $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.reserve ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param reserve primary key
     */
    public function delete($codreserve){
            
$this->set($codreserve);
            $sql = "DELETE FROM db_toquela.reserve WHERE  cod_reserve =  '$codreserve'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Reserve reserve
     */
    public function insert($reserve){
            $this->set($reserve->amount);
$this->set($reserve->deposit);
$this->set($reserve->canal);
$this->set($reserve->start);
$this->set($reserve->end);
$this->set($reserve->coduser);
$this->set($reserve->codsubcomplex);
$this->set($reserve->date);
$this->set($reserve->codschedule);
            
            $sql = "INSERT INTO db_toquela.reserve ( amount , deposit , canal , start , \"end\" , cod_user , cod_sub_complex , date , cod_schedule ) 
                    VALUES ('$reserve->amount','$reserve->deposit','$reserve->canal','$reserve->start','$reserve->end','$reserve->coduser','$reserve->codsubcomplex',getdate(),'$reserve->codschedule')";
            $id = $this->executeInsert($sql);	
            /*$reserve-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Reserve reserve
     */
    public function update($reserve){
        $this->set($reserve->amount);
$this->set($reserve->deposit);
$this->set($reserve->canal);
$this->set($reserve->start);
$this->set($reserve->end);
$this->set($reserve->coduser);
$this->set($reserve->codsubcomplex);
$this->set($reserve->date);
$this->set($reserve->codschedule);
        
        $sql = "UPDATE db_toquela.reserve  SET 
		 amount = iif( len('$reserve->amount' ) <> 0  , '$reserve->amount', amount ),
		 deposit = iif( len('$reserve->deposit' ) <> 0  , '$reserve->deposit', deposit ),
		 canal = iif( len('$reserve->canal' ) <> 0  , '$reserve->canal', canal ),
		 start = iif( len('$reserve->start' ) <> 0  , '$reserve->start', start ),
		 end = iif( len('$reserve->end' ) <> 0  , '$reserve->end', end ),
		 cod_user = iif( len('$reserve->coduser' ) <> 0  , '$reserve->coduser', cod_user ),
		 cod_sub_complex = iif( len('$reserve->codsubcomplex' ) <> 0  , '$reserve->codsubcomplex', cod_sub_complex ),
		 date = iif( len('$reserve->date' ) <> 0  , '$reserve->date', date ),
		 cod_schedule = iif( len('$reserve->codschedule' ) <> 0  , '$reserve->codschedule', cod_schedule ) WHERE  cod_reserve =  '$reserve->codreserve'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.reserve';
        return $this->executeUpdate($sql);
    }


                        public function queryByAmount($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE amount  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDeposit($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE deposit  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCanal($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE canal  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByStart($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE start  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByEnd($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE end  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodSubComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE cod_sub_complex  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodSchedule($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE cod_schedule  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByAmount($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE amount  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByDeposit($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE deposit  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCanal($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE canal  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByStart($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE start  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByEnd($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE end  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE cod_user  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCodSubComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE cod_sub_complex  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE date  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCodSchedule($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE cod_schedule  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Reserve 
     */
    protected function readRow($row) {
        $reserve = new Reserve();
        $reserve->codreserve = $row['cod_reserve'];
        $reserve->amount = $row['amount'];
        $reserve->deposit = $row['deposit'];
        $reserve->canal = $row['canal'];
        $reserve->start = $row['start'];
        $reserve->end = $row['end'];
        $reserve->coduser = $row['cod_user'];
        $reserve->codsubcomplex = $row['cod_sub_complex'];
        $reserve->date = $row['date'];
        $reserve->codschedule = $row['cod_schedule'];
        return $reserve;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.reserve";
         return $this->getList($sql, true);
    }
    
}
  
?>
