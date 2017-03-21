<?php 
 /**
 * Clase que opera sobre la tabla 'courtamateur'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-07-15 16:34
 */
class CourtamateurMySqlDAO extends ModelDAO implements CourtamateurDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Courtamateur
     */
    public function load($idcourtamateur){
        
$this->set($idcourtamateur);
        $sql = "SELECT * FROM db_toquela.courtamateur WHERE  idcourtamateur =  '$idcourtamateur'";
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
        $sql = "SELECT * FROM db_toquela.courtamateur $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.courtamateur ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param courtamateur primary key
     */
    public function delete($idcourtamateur){
            
$this->set($idcourtamateur);
            $sql = "DELETE FROM db_toquela.courtamateur WHERE  idcourtamateur =  '$idcourtamateur'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Courtamateur courtamateur
     */
    public function insert($courtamateur){
            $this->set($courtamateur->nombre);
$this->set($courtamateur->lat);
$this->set($courtamateur->lng);
$this->set($courtamateur->direccion);
$this->set($courtamateur->redirec);
$this->set($courtamateur->descripcion);
            
            $sql = "INSERT INTO db_toquela.courtamateur ( nombre , lat , lng , direccion , redirec , descripcion ) 
                    VALUES ('$courtamateur->nombre','$courtamateur->lat','$courtamateur->lng','$courtamateur->direccion','$courtamateur->redirec','$courtamateur->descripcion')";
            $id = $this->executeInsert($sql);	
            /*$courtamateur-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Courtamateur courtamateur
     */
    public function update($courtamateur){
        $this->set($courtamateur->nombre);
$this->set($courtamateur->lat);
$this->set($courtamateur->lng);
$this->set($courtamateur->direccion);
$this->set($courtamateur->redirec);
$this->set($courtamateur->descripcion);
        
        $sql = "UPDATE db_toquela.courtamateur  SET 
		 nombre = if( strcmp('$courtamateur->nombre'  , '' ) = 1  , '$courtamateur->nombre', nombre ),
		 lat = if( strcmp('$courtamateur->lat'  , '' ) = 1  , '$courtamateur->lat', lat ),
		 lng = if( strcmp('$courtamateur->lng'  , '' ) = 1  , '$courtamateur->lng', lng ),
		 direccion = if( strcmp('$courtamateur->direccion'  , '' ) = 1  , '$courtamateur->direccion', direccion ),
		 redirec = if( strcmp('$courtamateur->redirec'  , '' ) = 1  , '$courtamateur->redirec', redirec ),
		 descripcion = if( strcmp('$courtamateur->descripcion'  , '' ) = 1  , '$courtamateur->descripcion', descripcion ) WHERE  idcourtamateur =  '$courtamateur->idcourtamateur'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.courtamateur';
        return $this->executeUpdate($sql);
    }


                        public function queryByNombre($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.courtamateur WHERE nombre  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLat($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.courtamateur WHERE lat  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLng($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.courtamateur WHERE lng  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDireccion($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.courtamateur WHERE direccion  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByRedirec($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.courtamateur WHERE redirec  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescripcion($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.courtamateur WHERE descripcion  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByNombre($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.courtamateur WHERE nombre  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLat($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.courtamateur WHERE lat  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLng($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.courtamateur WHERE lng  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDireccion($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.courtamateur WHERE direccion  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByRedirec($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.courtamateur WHERE redirec  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescripcion($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.courtamateur WHERE descripcion  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Courtamateur 
     */
    protected function readRow($row) {
        $courtamateur = new Courtamateur();
        $courtamateur->idcourtamateur = $row['idcourtamateur'];
        $courtamateur->nombre = $row['nombre'];
        $courtamateur->lat = $row['lat'];
        $courtamateur->lng = $row['lng'];
        $courtamateur->direccion = $row['direccion'];
        $courtamateur->redirec = $row['redirec'];
        $courtamateur->descripcion = $row['descripcion'];
        return $courtamateur;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.courtamateur";
         return $this->getList($sql, true);
    }
    
}

?>