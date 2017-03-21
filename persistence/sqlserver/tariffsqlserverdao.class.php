<?php 
 /**
 * Clase que opera sobre la tabla 'tariff'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class TariffSqlServerDAO extends ModelDAO implements TariffDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Tariff
     */
    public function load($codtariff){
        
$this->set($codtariff);
        $sql = "SELECT * FROM db_toquela.tariff WHERE  cod_tariff =  '$codtariff'";
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
        $sql = "SELECT * FROM db_toquela.tariff $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.tariff ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param tariff primary key
     */
    public function delete($codtariff){
            
$this->set($codtariff);
            $sql = "DELETE FROM db_toquela.tariff WHERE  cod_tariff =  '$codtariff'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Tariff tariff
     */
    public function insert($tariff){
            $this->set($tariff->amount);
            
            $sql = "INSERT INTO db_toquela.tariff ( amount ) 
                    VALUES ('$tariff->amount')";
            $id = $this->executeInsert($sql);	
            /*$tariff-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Tariff tariff
     */
    public function update($tariff){
        $this->set($tariff->amount);
        
        $sql = "UPDATE db_toquela.tariff  SET 
		 amount = iif( len('$tariff->amount' ) <> 0  , '$tariff->amount', amount ) WHERE  cod_tariff =  '$tariff->codtariff'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.tariff';
        return $this->executeUpdate($sql);
    }


                        public function queryByAmount($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tariff WHERE amount  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByAmount($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tariff WHERE amount  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Tariff 
     */
    protected function readRow($row) {
        $tariff = new Tariff();
        $tariff->codtariff = $row['cod_tariff'];
        $tariff->amount = $row['amount'];
        return $tariff;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.tariff";
         return $this->getList($sql, true);
    }
    
}
  
?>
