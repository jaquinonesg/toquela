<?php 
 /**
 * Clase que opera sobre la tabla 'administrator'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class AdministratorMySqlDAO extends ModelDAO implements AdministratorDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Administrator
     */
    public function load($codadministrator){
        
$this->set($codadministrator);
        $sql = "SELECT * FROM db_toquela.administrator WHERE  cod_administrator =  '$codadministrator'";
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
        $sql = "SELECT * FROM db_toquela.administrator $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.administrator ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param administrator primary key
     */
    public function delete($codadministrator){
            
$this->set($codadministrator);
            $sql = "DELETE FROM db_toquela.administrator WHERE  cod_administrator =  '$codadministrator'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Administrator administrator
     */
    public function insert($administrator){
            $this->set($administrator->name);
$this->set($administrator->password);
$this->set($administrator->email);
$this->set($administrator->address);
$this->set($administrator->phone);
$this->set($administrator->isdiary);
$this->set($administrator->isuser);
$this->set($administrator->iscomplex);
$this->set($administrator->isindex);
$this->set($administrator->codcomplex);
$this->set($administrator->istoquela);
            
            $sql = "INSERT INTO db_toquela.administrator ( name , password , email , address , phone , is_diary , is_user , is_complex , is_index , cod_complex , is_toquela ) 
                    VALUES ('$administrator->name','$administrator->password','$administrator->email','$administrator->address','$administrator->phone','$administrator->isdiary','$administrator->isuser','$administrator->iscomplex','$administrator->isindex','$administrator->codcomplex','$administrator->istoquela')";
            $id = $this->executeInsert($sql);	
            /*$administrator-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Administrator administrator
     */
    public function update($administrator){
        $this->set($administrator->name);
$this->set($administrator->password);
$this->set($administrator->email);
$this->set($administrator->address);
$this->set($administrator->phone);
$this->set($administrator->isdiary);
$this->set($administrator->isuser);
$this->set($administrator->iscomplex);
$this->set($administrator->isindex);
$this->set($administrator->codcomplex);
$this->set($administrator->istoquela);
        
        $sql = "UPDATE db_toquela.administrator  SET 
		 name = if( strcmp('$administrator->name'  , '' ) = 1  , '$administrator->name', name ),
		 password = if( strcmp('$administrator->password'  , '' ) = 1  , '$administrator->password', password ),
		 email = if( strcmp('$administrator->email'  , '' ) = 1  , '$administrator->email', email ),
		 address = if( strcmp('$administrator->address'  , '' ) = 1  , '$administrator->address', address ),
		 phone = if( strcmp('$administrator->phone'  , '' ) = 1  , '$administrator->phone', phone ),
		 is_diary = if( strcmp('$administrator->isdiary'  , '' ) = 1  , '$administrator->isdiary', is_diary ),
		 is_user = if( strcmp('$administrator->isuser'  , '' ) = 1  , '$administrator->isuser', is_user ),
		 is_complex = if( strcmp('$administrator->iscomplex'  , '' ) = 1  , '$administrator->iscomplex', is_complex ),
		 is_index = if( strcmp('$administrator->isindex'  , '' ) = 1  , '$administrator->isindex', is_index ),
		 cod_complex = if( strcmp('$administrator->codcomplex'  , '' ) = 1  , '$administrator->codcomplex', cod_complex ),
		 is_toquela = if( strcmp('$administrator->istoquela'  , '' ) = 1  , '$administrator->istoquela', is_toquela ) WHERE  cod_administrator =  '$administrator->codadministrator'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.administrator';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPassword($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE password  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByEmail($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE email  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByAddress($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE address  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPhone($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE phone  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByIsDiary($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE is_diary  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByIsUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE is_user  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByIsComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE is_complex  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByIsIndex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE is_index  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE cod_complex  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByIsToquela($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.administrator WHERE is_toquela  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPassword($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE password  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByEmail($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE email  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByAddress($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE address  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPhone($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE phone  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByIsDiary($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE is_diary  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByIsUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE is_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByIsComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE is_complex  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByIsIndex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE is_index  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE cod_complex  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByIsToquela($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.administrator WHERE is_toquela  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Administrator 
     */
    protected function readRow($row) {
        $administrator = new Administrator();
        $administrator->codadministrator = $row['cod_administrator'];
        $administrator->name = $row['name'];
        $administrator->password = $row['password'];
        $administrator->email = $row['email'];
        $administrator->address = $row['address'];
        $administrator->phone = $row['phone'];
        $administrator->isdiary = $row['is_diary'];
        $administrator->isuser = $row['is_user'];
        $administrator->iscomplex = $row['is_complex'];
        $administrator->isindex = $row['is_index'];
        $administrator->codcomplex = $row['cod_complex'];
        $administrator->istoquela = $row['is_toquela'];
        return $administrator;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.administrator";
         return $this->getList($sql, true);
    }
    
}

?>