<?php 
 /**
 * Class that operate on table 'aditional'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-01-22 16:53
 */
 class AditionalMySqlExtDAO extends AditionalMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.aditional LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.aditional ";        
        return $this->getValue($sql);
    }
    
    public function insertRecord($cod_user){
        $sql = "INSERT INTO `db_toquela`.`aditional` (`cod_user`, `typedoc`, `numdoc`, `datebirth`, `category`, `typeblood`, `eps`, `profession`, `university`, `nationality`) VALUES ('$cod_user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
        return $this->executeInsert($sql);
    }

    public function insertWithValsNulls($aditional) {
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
        VALUES ('$aditional->coduser','$aditional->typedoc','$aditional->numdoc','$aditional->datebirth','$aditional->category','$aditional->typeblood','$aditional->eps','$aditional->profession','$aditional->university','$aditional->nationality','$aditional->guardian',NULL)";
        $id = $this->executeInsert($sql);
        /* $users-> = $id; */
        return $id;
    }
    
    /**
     * Devuelve los campos de aditional cuando el agumento $cod corresponde a cod_user, 
     * se supone que cod siempre es un número
     *
     * @author Juan Carlos Gama
     * @param  int $cod             Código del usuario
     * @return Object[Aditional]    Objeto de la clase aditional
     */
    public function queryByCoduser($cod){
        $sql = " SELECT * FROM db_toquela.aditional WHERE cod_user = $cod ;";
        return $this->getRow($sql);
    }

	
}

?>