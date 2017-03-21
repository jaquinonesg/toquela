<?php 
 /**
 * Clase que opera sobre la tabla 'aditional'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-01-27 11:44
 */
 class AditionalMySqlDAO extends ModelDAO implements AditionalDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Aditional
     */
    public function load($coduser){

        $this->set($coduser);
        $sql = "SELECT * FROM db_toquela.aditional WHERE  cod_user =  '$coduser'";
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
        $sql = "SELECT * FROM db_toquela.aditional $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.aditional ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param aditional primary key
     */
    public function delete($coduser){

        $this->set($coduser);
        $sql = "DELETE FROM db_toquela.aditional WHERE  cod_user =  '$coduser'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Aditional aditional
     */
    public function insert($aditional){
        $this->set($aditional->typedoc);
        $this->set($aditional->numdoc);
        $this->set($aditional->datebirth);
        $this->set($aditional->category);
        $this->set($aditional->typeblood);
        $this->set($aditional->eps);
        $this->set($aditional->profession);
        $this->set($aditional->university);
        $this->set($aditional->nationality);
        $this->set($aditional->guardian);
        $this->set($aditional->teamcarnet);

        $sql = "INSERT INTO db_toquela.aditional ( cod_user , typedoc , numdoc , datebirth , category , typeblood , eps , profession , university , nationality , guardian , teamcarnet ) 
        VALUES ('$aditional->coduser','$aditional->typedoc','$aditional->numdoc','$aditional->datebirth','$aditional->category','$aditional->typeblood','$aditional->eps','$aditional->profession','$aditional->university','$aditional->nationality','$aditional->guardian','$aditional->teamcarnet')";
        $id = $this->executeInsert($sql);	
        /*$aditional-> = $id;*/
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Aditional aditional
     */
    public function update($aditional){
        $this->set($aditional->typedoc);
        $this->set($aditional->numdoc);
        $this->set($aditional->datebirth);
        $this->set($aditional->category);
        $this->set($aditional->typeblood);
        $this->set($aditional->eps);
        $this->set($aditional->profession);
        $this->set($aditional->university);
        $this->set($aditional->nationality);
        $this->set($aditional->guardian);
        $this->set($aditional->teamcarnet);
        
        $sql = "UPDATE db_toquela.aditional  SET 
        typedoc = if( strcmp('$aditional->typedoc'  , '' ) = 1  , '$aditional->typedoc', typedoc ),
        numdoc = if( strcmp('$aditional->numdoc'  , '' ) = 1  , '$aditional->numdoc', numdoc ),
        datebirth = if( strcmp('$aditional->datebirth'  , '' ) = 1  , '$aditional->datebirth', datebirth ),
        category = if( strcmp('$aditional->category'  , '' ) = 1  , '$aditional->category', category ),
        typeblood = if( strcmp('$aditional->typeblood'  , '' ) = 1  , '$aditional->typeblood', typeblood ),
        eps = if( strcmp('$aditional->eps'  , '' ) = 1  , '$aditional->eps', eps ),
        profession = if( strcmp('$aditional->profession'  , '' ) = 1  , '$aditional->profession', profession ),
        university = if( strcmp('$aditional->university'  , '' ) = 1  , '$aditional->university', university ),
        nationality = if( strcmp('$aditional->nationality'  , '' ) = 1  , '$aditional->nationality', nationality ),
        guardian = if( strcmp('$aditional->guardian'  , '' ) = 1  , '$aditional->guardian', guardian ),
        teamcarnet = if( strcmp('$aditional->teamcarnet'  , '' ) = 1  , '$aditional->teamcarnet', teamcarnet ) WHERE  cod_user =  '$aditional->coduser'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.aditional';
        return $this->executeUpdate($sql);
    }


    public function queryByTypedoc($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE typedoc  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByNumdoc($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE numdoc  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByDatebirth($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE datebirth  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByCategory($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE category  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByTypeblood($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE typeblood  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByEps($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE eps  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByProfession($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE profession  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByUniversity($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE university  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByNationality($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE nationality  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByGuardian($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE guardian  = '$value'";
        return $this->getList($sql);    
    }
    
    public function queryByTeamcarnet($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.aditional WHERE teamcarnet  = '$value'";
        return $this->getList($sql);    
    }
    


    public function deleteByTypedoc($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE typedoc  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByNumdoc($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE numdoc  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByDatebirth($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE datebirth  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByCategory($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE category  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByTypeblood($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE typeblood  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByEps($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE eps  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByProfession($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE profession  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByUniversity($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE university  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByNationality($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE nationality  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByGuardian($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE guardian  = '$value'";
        return $this->executeUpdate($sql);
    }


    public function deleteByTeamcarnet($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.aditional WHERE teamcarnet  = '$value'";
        return $this->executeUpdate($sql);
    }




    /**
     * Read row
     *
     * @return Aditional 
     */
    protected function readRow($row) {
        $aditional = new Aditional();
        $aditional->coduser = $row['cod_user'];
        $aditional->typedoc = $row['typedoc'];
        $aditional->numdoc = $row['numdoc'];
        $aditional->datebirth = $row['datebirth'];
        $aditional->category = $row['category'];
        $aditional->typeblood = $row['typeblood'];
        $aditional->eps = $row['eps'];
        $aditional->profession = $row['profession'];
        $aditional->university = $row['university'];
        $aditional->nationality = $row['nationality'];
        $aditional->guardian = $row['guardian'];
        $aditional->teamcarnet = $row['teamcarnet'];
        return $aditional;
    }    
    
    
    public function describe(){
       $sql = "DESC db_toquela.aditional";
       return $this->getList($sql, true);
   }

}

?>