<?php 
 /**
 * Clase que opera sobre la tabla 'payment'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class PaymentMySqlDAO extends ModelDAO implements PaymentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Payment
     */
    public function load($codpayment){
        
$this->set($codpayment);
        $sql = "SELECT * FROM db_toquela.payment WHERE  cod_payment =  '$codpayment'";
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
        $sql = "SELECT * FROM db_toquela.payment $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.payment ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param payment primary key
     */
    public function delete($codpayment){
            
$this->set($codpayment);
            $sql = "DELETE FROM db_toquela.payment WHERE  cod_payment =  '$codpayment'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Payment payment
     */
    public function insert($payment){
            $this->set($payment->name);
            
            $sql = "INSERT INTO db_toquela.payment ( name ) 
                    VALUES ('$payment->name')";
            $id = $this->executeInsert($sql);	
            /*$payment-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Payment payment
     */
    public function update($payment){
        $this->set($payment->name);
        
        $sql = "UPDATE db_toquela.payment  SET 
		 name = if( strcmp('$payment->name'  , '' ) = 1  , '$payment->name', name ) WHERE  cod_payment =  '$payment->codpayment'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.payment';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.payment WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.payment WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Payment 
     */
    protected function readRow($row) {
        $payment = new Payment();
        $payment->codpayment = $row['cod_payment'];
        $payment->name = $row['name'];
        return $payment;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.payment";
         return $this->getList($sql, true);
    }
    
}

?>