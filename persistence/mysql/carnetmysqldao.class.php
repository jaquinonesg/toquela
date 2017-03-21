<?php 
 /**
 * Clase que opera sobre la tabla 'carnet'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-01-23 10:43
 */
class CarnetMySqlDAO extends ModelDAO implements CarnetDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Carnet
     */
    public function load($codtournament){
        
$this->set($codtournament);
        $sql = "SELECT * FROM db_toquela.carnet WHERE  cod_tournament =  '$codtournament'";
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
        $sql = "SELECT * FROM db_toquela.carnet $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.carnet ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param carnet primary key
     */
    public function delete($codtournament){
            
$this->set($codtournament);
            $sql = "DELETE FROM db_toquela.carnet WHERE  cod_tournament =  '$codtournament'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Carnet carnet
     */
    public function insert($carnet){
            $this->set($carnet->nombre);
$this->set($carnet->id);
$this->set($carnet->auxdata);
$this->set($carnet->data);
$this->set($carnet->cods);
$this->set($carnet->logofilename);
$this->set($carnet->logoname);
            
            $sql = "INSERT INTO db_toquela.carnet ( cod_tournament , nombre , id , auxdata , data , cods , logofilename , logoname ) 
                    VALUES ('$carnet->codtournament','$carnet->nombre','$carnet->id','$carnet->auxdata','$carnet->data','$carnet->cods','$carnet->logofilename','$carnet->logoname')";
            $id = $this->executeInsert($sql);	
            /*$carnet-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Carnet carnet
     */
    public function update($carnet){
        $this->set($carnet->nombre);
$this->set($carnet->id);
$this->set($carnet->auxdata);
$this->set($carnet->data);
$this->set($carnet->cods);
$this->set($carnet->logofilename);
$this->set($carnet->logoname);
        
        $sql = "UPDATE db_toquela.carnet  SET 
		 nombre = if( strcmp('$carnet->nombre'  , '' ) = 1  , '$carnet->nombre', nombre ),
		 id = if( strcmp('$carnet->id'  , '' ) = 1  , '$carnet->id', id ),
		 auxdata = if( strcmp('$carnet->auxdata'  , '' ) = 1  , '$carnet->auxdata', auxdata ),
		 data = if( strcmp('$carnet->data'  , '' ) = 1  , '$carnet->data', data ),
		 cods = if( strcmp('$carnet->cods'  , '' ) = 1  , '$carnet->cods', cods ),
		 logofilename = if( strcmp('$carnet->logofilename'  , '' ) = 1  , '$carnet->logofilename', logofilename ),
		 logoname = if( strcmp('$carnet->logoname'  , '' ) = 1  , '$carnet->logoname', logoname ) WHERE  cod_tournament =  '$carnet->codtournament'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.carnet';
        return $this->executeUpdate($sql);
    }


                        public function queryByNombre($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.carnet WHERE nombre  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryById($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.carnet WHERE id  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByAuxdata($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.carnet WHERE auxdata  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByData($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.carnet WHERE data  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCods($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.carnet WHERE cods  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLogofilename($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.carnet WHERE logofilename  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLogoname($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.carnet WHERE logoname  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByNombre($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.carnet WHERE nombre  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteById($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.carnet WHERE id  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByAuxdata($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.carnet WHERE auxdata  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByData($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.carnet WHERE data  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCods($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.carnet WHERE cods  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLogofilename($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.carnet WHERE logofilename  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLogoname($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.carnet WHERE logoname  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Carnet 
     */
    protected function readRow($row) {
        $carnet = new Carnet();
        $carnet->codtournament = $row['cod_tournament'];
        $carnet->nombre = $row['nombre'];
        $carnet->id = $row['id'];
        $carnet->auxdata = $row['auxdata'];
        $carnet->data = $row['data'];
        $carnet->cods = $row['cods'];
        $carnet->logofilename = $row['logofilename'];
        $carnet->logoname = $row['logoname'];
        return $carnet;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.carnet";
         return $this->getList($sql, true);
    }
    
}

?>