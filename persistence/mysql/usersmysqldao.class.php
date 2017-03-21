<?php 
 /**
 * Clase que opera sobre la tabla 'users'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-11-19 11:29
 */
class UsersMySqlDAO extends ModelDAO implements UsersDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Users
     */
    public function load($coduser){
        
$this->set($coduser);
        $sql = "SELECT * FROM db_toquela.users WHERE  cod_user =  '$coduser'";
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
        $sql = "SELECT * FROM db_toquela.users $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.users ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param users primary key
     */
    public function delete($coduser){
            
$this->set($coduser);
            $sql = "DELETE FROM db_toquela.users WHERE  cod_user =  '$coduser'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Users users
     */
    public function insert($users){
            $this->set($users->id);
$this->set($users->name);
$this->set($users->lastname);
$this->set($users->phone);
$this->set($users->cellular);
$this->set($users->address);
$this->set($users->city);
$this->set($users->username);
$this->set($users->password);
$this->set($users->email);
$this->set($users->sex);
$this->set($users->age);
$this->set($users->longitude);
$this->set($users->latitude);
$this->set($users->skilledleg);
$this->set($users->codlocality);
$this->set($users->codrole);
$this->set($users->idfan);
$this->set($users->privilegios);
            
            $sql = "INSERT INTO db_toquela.users ( id , name , last_name , phone , cellular , address , city , username , password , email , sex , age , longitude , latitude , skilled_leg , cod_locality , cod_role , idfan , privilegios ) 
                    VALUES ('$users->id','$users->name','$users->lastname','$users->phone','$users->cellular','$users->address','$users->city','$users->username','$users->password','$users->email','$users->sex','$users->age','$users->longitude','$users->latitude','$users->skilledleg','$users->codlocality','$users->codrole','$users->idfan','$users->privilegios')";
            $id = $this->executeInsert($sql);	
            /*$users-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Users users
     */
    public function update($users){
        $this->set($users->id);
$this->set($users->name);
$this->set($users->lastname);
$this->set($users->phone);
$this->set($users->cellular);
$this->set($users->address);
$this->set($users->city);
$this->set($users->username);
$this->set($users->password);
$this->set($users->email);
$this->set($users->sex);
$this->set($users->age);
$this->set($users->longitude);
$this->set($users->latitude);
$this->set($users->skilledleg);
$this->set($users->codlocality);
$this->set($users->codrole);
$this->set($users->idfan);
$this->set($users->privilegios);
        
        $sql = "UPDATE db_toquela.users  SET 
		 id = if( strcmp('$users->id'  , '' ) = 1  , '$users->id', id ),
		 name = if( strcmp('$users->name'  , '' ) = 1  , '$users->name', name ),
		 last_name = if( strcmp('$users->lastname'  , '' ) = 1  , '$users->lastname', last_name ),
		 phone = if( strcmp('$users->phone'  , '' ) = 1  , '$users->phone', phone ),
		 cellular = if( strcmp('$users->cellular'  , '' ) = 1  , '$users->cellular', cellular ),
		 address = if( strcmp('$users->address'  , '' ) = 1  , '$users->address', address ),
		 city = if( strcmp('$users->city'  , '' ) = 1  , '$users->city', city ),
		 username = if( strcmp('$users->username'  , '' ) = 1  , '$users->username', username ),
		 password = if( strcmp('$users->password'  , '' ) = 1  , '$users->password', password ),
		 email = if( strcmp('$users->email'  , '' ) = 1  , '$users->email', email ),
		 sex = if( strcmp('$users->sex'  , '' ) = 1  , '$users->sex', sex ),
		 age = if( strcmp('$users->age'  , '' ) = 1  , '$users->age', age ),
		 longitude = if( strcmp('$users->longitude'  , '' ) = 1  , '$users->longitude', longitude ),
		 latitude = if( strcmp('$users->latitude'  , '' ) = 1  , '$users->latitude', latitude ),
		 skilled_leg = if( strcmp('$users->skilledleg'  , '' ) = 1  , '$users->skilledleg', skilled_leg ),
		 cod_locality = if( strcmp('$users->codlocality'  , '' ) = 1  , '$users->codlocality', cod_locality ),
		 cod_role = if( strcmp('$users->codrole'  , '' ) = 1  , '$users->codrole', cod_role ),
		 idfan = if( strcmp('$users->idfan'  , '' ) = 1  , '$users->idfan', idfan ),
		 privilegios = if( strcmp('$users->privilegios'  , '' ) = 1  , '$users->privilegios', privilegios ) WHERE  cod_user =  '$users->coduser'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.users';
        return $this->executeUpdate($sql);
    }


                        public function queryById($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE id  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLastName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE last_name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPhone($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE phone  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCellular($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE cellular  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByAddress($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE address  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCity($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE city  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByUsername($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE username  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPassword($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE password  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByEmail($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE email  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryBySex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE sex  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByAge($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE age  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLongitude($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE longitude  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLatitude($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE latitude  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryBySkilledLeg($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE skilled_leg  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodLocality($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE cod_locality  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodRole($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE cod_role  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByIdfan($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE idfan  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPrivilegios($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE privilegios  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteById($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE id  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLastName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE last_name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPhone($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE phone  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCellular($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE cellular  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByAddress($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE address  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCity($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE city  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByUsername($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE username  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPassword($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE password  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByEmail($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE email  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteBySex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE sex  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByAge($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE age  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLongitude($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE longitude  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLatitude($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE latitude  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteBySkilledLeg($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE skilled_leg  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodLocality($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE cod_locality  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodRole($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE cod_role  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByIdfan($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE idfan  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPrivilegios($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE privilegios  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Users 
     */
    protected function readRow($row) {
        $users = new Users();
        $users->coduser = $row['cod_user'];
        $users->id = $row['id'];
        $users->name = $row['name'];
        $users->lastname = $row['last_name'];
        $users->phone = $row['phone'];
        $users->cellular = $row['cellular'];
        $users->address = $row['address'];
        $users->city = $row['city'];
        $users->username = $row['username'];
        $users->password = $row['password'];
        $users->email = $row['email'];
        $users->sex = $row['sex'];
        $users->age = $row['age'];
        $users->longitude = $row['longitude'];
        $users->latitude = $row['latitude'];
        $users->skilledleg = $row['skilled_leg'];
        $users->codlocality = $row['cod_locality'];
        $users->codrole = $row['cod_role'];
        $users->idfan = $row['idfan'];
        $users->privilegios = $row['privilegios'];
        return $users;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.users";
         return $this->getList($sql, true);
    }
    
}

?>