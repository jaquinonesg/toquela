<?php

/**
 * Clase que opera sobre la tabla 'team'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class TeamMySqlDAO extends ModelDAO implements TeamDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Team
     */
    public function load($codteam) {
        $this->set($codteam);
        $sql = "SELECT * FROM db_toquela.team WHERE  cod_team =  '$codteam'";
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
        $sql = "SELECT * FROM db_toquela.team $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.team ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param team primary key
     */
    public function delete($codteam) {

        $this->set($codteam);
        $sql = "DELETE FROM db_toquela.team WHERE  cod_team =  '$codteam'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Team team
     */
    public function insert($team) {
        $this->set($team->name);
        $this->set($team->type);
        $this->set($team->codlocality);
        $this->set($team->description);
        $sql = "INSERT INTO db_toquela.team ( name , type , cod_locality , description ) 
                    VALUES ('$team->name','$team->type','$team->codlocality','$team->description')";
        $id = $this->executeInsert($sql);
        /* $team-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Team team
     */
    public function update($team) {
        $this->set($team->name);
        $this->set($team->type);
        $this->set($team->codlocality);
        $this->set($team->description);

        $sql = "UPDATE db_toquela.team  SET 
		 name = if( strcmp('$team->name'  , '' ) = 1  , '$team->name', name ),
		 type = if( strcmp('$team->type'  , '' ) = 1  , '$team->type', type ),
		 cod_locality = if( strcmp('$team->codlocality'  , '' ) = 1  , '$team->codlocality', cod_locality ),
		 description = if( strcmp('$team->description'  , '' ) = 1  , '$team->description', description ) WHERE  cod_team =  '$team->codteam'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.team';
        return $this->executeUpdate($sql);
    }

    public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.team WHERE name  = '$value'";
        return $this->getList($sql);
    }

    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.team WHERE type  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodLocality($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.team WHERE cod_locality  = '$value'";
        return $this->getList($sql);
    }

    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.team WHERE description  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.team WHERE name  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.team WHERE type  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodLocality($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.team WHERE cod_locality  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.team WHERE description  = '$value'";
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return Team 
     */
    protected function readRow($row) {
        $team = new Team();
        $team->codteam = $row['cod_team'];
        $team->name = $row['name'];
        $team->type = $row['type'];
        $team->codlocality = $row['cod_locality'];
        $team->description = $row['description'];
        return $team;
    }

    public function describe() {
        $sql = "DESC db_toquela.team";
        return $this->getList($sql, true);
    }

    public function inserttmsgteam($message) {
        $this->set($message->text);
        $this->set($message->subject);
        $this->set($message->date);
        $this->set($message->viewed);
        $this->set($message->state);
        $this->set($message->from);
        $this->set($message->to);
        $this->set($message->codteam);

        $sql = "INSERT INTO db_toquela.message ( text , subject , date , viewed , state , `from` , `to` , `cod_team` ) 
                    VALUES ('$message->text','$message->subject',now(),'$message->viewed','$message->state','$message->from',$message->to,$message->codteam)";
        $id = $this->executeInsert($sql);
        /* $message-> = $id; */
        return $id;
    }

}

?>