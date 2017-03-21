<?php

/**
 * Clase que opera sobre la tabla 'tournament_has_team'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-17 10:28
 */
class TournamentHasTeamMySqlDAO extends ModelDAO implements TournamentHasTeamDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return TournamentHasTeam
     */
    public function load($codtournament, $codteam) {

        $this->set($codtournament);
        $this->set($codteam);
        $sql = "SELECT * FROM db_toquela.tournament_has_team WHERE  cod_tournament =  '$codtournament' AND  cod_team =  '$codteam'";
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
        $sql = "SELECT * FROM db_toquela.tournament_has_team $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.tournament_has_team ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param tournamenthasteam primary key
     */
    public function delete($codtournament, $codteam) {

        $this->set($codtournament);
        $this->set($codteam);
        $sql = "DELETE FROM db_toquela.tournament_has_team WHERE  cod_tournament =  '$codtournament' AND  cod_team =  '$codteam'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param TournamentHasTeam tournamenthasteam
     */
    public function insert($tournamenthasteam) {
        $this->set($tournamenthasteam->number);
        $this->set($tournamenthasteam->round);
        $this->set($tournamenthasteam->status);

        $sql = "INSERT INTO db_toquela.tournament_has_team ( cod_tournament , cod_team , number , round , status ) 
                    VALUES ('$tournamenthasteam->codtournament','$tournamenthasteam->codteam','$tournamenthasteam->number','$tournamenthasteam->round','$tournamenthasteam->status')";
        $id = $this->executeInsert($sql);
        /* $tournamenthasteam-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param TournamentHasTeam tournamenthasteam
     */
    public function update($tournamenthasteam) {
        $this->set($tournamenthasteam->number);
        $this->set($tournamenthasteam->round);
        $this->set($tournamenthasteam->status);

        $sql = "UPDATE db_toquela.tournament_has_team  SET 
		 number = if( strcmp('$tournamenthasteam->number'  , '' ) = 1  , '$tournamenthasteam->number', number ),
		 round = if( strcmp('$tournamenthasteam->round'  , '' ) = 1  , '$tournamenthasteam->round', round ),
		 status = if( strcmp('$tournamenthasteam->status'  , '' ) = 1  , '$tournamenthasteam->status', status ) WHERE  cod_tournament =  '$tournamenthasteam->codtournament' AND  cod_team =  '$tournamenthasteam->codteam'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.tournament_has_team';
        return $this->executeUpdate($sql);
    }

    public function queryByNumber($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament_has_team WHERE number  = '$value'";
        return $this->getList($sql);
    }

    public function queryByRound($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament_has_team WHERE round  = '$value'";
        return $this->getList($sql);
    }

    public function queryByStatus($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament_has_team WHERE status  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByNumber($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament_has_team WHERE number  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByRound($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament_has_team WHERE round  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByStatus($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament_has_team WHERE status  = '$value'";
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return TournamentHasTeam 
     */
    protected function readRow($row) {
        $tournamenthasteam = new TournamentHasTeam();
        $tournamenthasteam->codtournament = $row['cod_tournament'];
        $tournamenthasteam->codteam = $row['cod_team'];
        $tournamenthasteam->number = $row['number'];
        $tournamenthasteam->round = $row['round'];
        $tournamenthasteam->status = $row['status'];
        return $tournamenthasteam;
    }

    public function describe() {
        $sql = "DESC db_toquela.tournament_has_team";
        return $this->getList($sql, true);
    }

}

?>