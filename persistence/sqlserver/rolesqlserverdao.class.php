<?php 
 /**
 * Clase que opera sobre la tabla 'role'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class RoleSqlServerDAO extends ModelDAO implements RoleDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Role
     */
    public function load($codrole){
        
$this->set($codrole);
        $sql = "SELECT * FROM db_toquela.role WHERE  cod_role =  '$codrole'";
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
        $sql = "SELECT * FROM db_toquela.role $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.role ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param role primary key
     */
    public function delete($codrole){
            
$this->set($codrole);
            $sql = "DELETE FROM db_toquela.role WHERE  cod_role =  '$codrole'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Role role
     */
    public function insert($role){
            $this->set($role->name);
            
            $sql = "INSERT INTO db_toquela.role ( name ) 
                    VALUES ('$role->name')";
            $id = $this->executeInsert($sql);	
            /*$role-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Role role
     */
    public function update($role){
        $this->set($role->name);
        
        $sql = "UPDATE db_toquela.role  SET 
		 name = iif( len('$role->name' ) <> 0  , '$role->name', name ) WHERE  cod_role =  '$role->codrole'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.role';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.role WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.role WHERE name  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Role 
     */
    protected function readRow($row) {
        $role = new Role();
        $role->codrole = $row['cod_role'];
        $role->name = $row['name'];
        return $role;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.role";
         return $this->getList($sql, true);
    }
    
}
  
?>
