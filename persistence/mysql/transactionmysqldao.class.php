<?php 
 /**
 * Clase que opera sobre la tabla 'transaction'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class TransactionMySqlDAO extends ModelDAO implements TransactionDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Transaction
     */
    public function load($codtransactions){
        
$this->set($codtransactions);
        $sql = "SELECT * FROM db_toquela.transaction WHERE  cod_transactions =  '$codtransactions'";
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
        $sql = "SELECT * FROM db_toquela.transaction $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.transaction ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param transaction primary key
     */
    public function delete($codtransactions){
            
$this->set($codtransactions);
            $sql = "DELETE FROM db_toquela.transaction WHERE  cod_transactions =  '$codtransactions'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Transaction transaction
     */
    public function insert($transaction){
            $this->set($transaction->amount);
$this->set($transaction->coduser);
            
            $sql = "INSERT INTO db_toquela.transaction ( amount , cod_user ) 
                    VALUES ('$transaction->amount','$transaction->coduser')";
            $id = $this->executeInsert($sql);	
            /*$transaction-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Transaction transaction
     */
    public function update($transaction){
        $this->set($transaction->amount);
$this->set($transaction->coduser);
        
        $sql = "UPDATE db_toquela.transaction  SET 
		 amount = if( strcmp('$transaction->amount'  , '' ) = 1  , '$transaction->amount', amount ),
		 cod_user = if( strcmp('$transaction->coduser'  , '' ) = 1  , '$transaction->coduser', cod_user ) WHERE  cod_transactions =  '$transaction->codtransactions'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.transaction';
        return $this->executeUpdate($sql);
    }


                        public function queryByAmount($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.transaction WHERE amount  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.transaction WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByAmount($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.transaction WHERE amount  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.transaction WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Transaction 
     */
    protected function readRow($row) {
        $transaction = new Transaction();
        $transaction->codtransactions = $row['cod_transactions'];
        $transaction->amount = $row['amount'];
        $transaction->coduser = $row['cod_user'];
        return $transaction;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.transaction";
         return $this->getList($sql, true);
    }
    
}

?>