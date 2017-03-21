<?php

/**
 * Clase que opera sobre la tabla 'reserve'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-07-24 15:50
 */
class ReserveMySqlDAO extends ModelDAO implements ReserveDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Reserve
     */
    public function load($codreserve) {

        $this->set($codreserve);
        $sql = "SELECT * FROM db_toquela.reserve WHERE  cod_reserve =  '$codreserve'";
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
        $sql = "SELECT * FROM db_toquela.reserve $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.reserve ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param reserve primary key
     */
    public function delete($codreserve) {

        $this->set($codreserve);
        $sql = "DELETE FROM db_toquela.reserve WHERE  cod_reserve =  '$codreserve'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Reserve reserve
     */
    public function insert($reserve) {
        $this->set($reserve->amount);
        $this->set($reserve->deposit);
        $this->set($reserve->canal);
        $this->set($reserve->start);
        $this->set($reserve->end);
        $this->set($reserve->coduser);
        $this->set($reserve->codsubcomplex);
        $this->set($reserve->date);
        $this->set($reserve->codschedule);
        $this->set($reserve->codgames);

        $sql = "INSERT INTO db_toquela.reserve ( amount , deposit , canal , start , end , cod_user , cod_sub_complex , date , cod_schedule , cod_games ) 
                    VALUES ('$reserve->amount','$reserve->deposit','$reserve->canal','$reserve->start','$reserve->end','$reserve->coduser','$reserve->codsubcomplex','$reserve->date','$reserve->codschedule','$reserve->codgames')";
        $id = $this->executeInsert($sql);
        /* $reserve-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Reserve reserve
     */
    public function update($reserve) {
        $this->set($reserve->amount);
        $this->set($reserve->deposit);
        $this->set($reserve->canal);
        $this->set($reserve->start);
        $this->set($reserve->end);
        $this->set($reserve->coduser);
        $this->set($reserve->codsubcomplex);
        $this->set($reserve->date);
        $this->set($reserve->codschedule);
        $this->set($reserve->codgames);

        $sql = "UPDATE db_toquela.reserve  SET 
		 amount = if( strcmp('$reserve->amount'  , '' ) = 1  , '$reserve->amount', amount ),
		 deposit = if( strcmp('$reserve->deposit'  , '' ) = 1  , '$reserve->deposit', deposit ),
		 canal = if( strcmp('$reserve->canal'  , '' ) = 1  , '$reserve->canal', canal ),
		 start = if( strcmp('$reserve->start'  , '' ) = 1  , '$reserve->start', start ),
		 end = if( strcmp('$reserve->end'  , '' ) = 1  , '$reserve->end', end ),
		 cod_user = if( strcmp('$reserve->coduser'  , '' ) = 1  , '$reserve->coduser', cod_user ),
		 cod_sub_complex = if( strcmp('$reserve->codsubcomplex'  , '' ) = 1  , '$reserve->codsubcomplex', cod_sub_complex ),
		 date = if( strcmp('$reserve->date'  , '' ) = 1  , '$reserve->date', date ),
		 cod_schedule = if( strcmp('$reserve->codschedule'  , '' ) = 1  , '$reserve->codschedule', cod_schedule ),
		 cod_games = if( strcmp('$reserve->codgames'  , '' ) = 1  , '$reserve->codgames', cod_games ) WHERE  cod_reserve =  '$reserve->codreserve'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.reserve';
        return $this->executeUpdate($sql);
    }

    public function queryByAmount($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE amount  = '$value'";
        return $this->getList($sql);
    }

    public function queryByDeposit($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE deposit  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCanal($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE canal  = '$value'";
        return $this->getList($sql);
    }

    public function queryByStart($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE start  = '$value'";
        return $this->getList($sql);
    }

    public function queryByEnd($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE end  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE cod_user  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodSubComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE cod_sub_complex  = '$value'";
        return $this->getList($sql);
    }

    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE date  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodSchedule($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE cod_schedule  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodGames($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.reserve WHERE cod_games  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByAmount($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE amount  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByDeposit($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE deposit  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCanal($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE canal  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByStart($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE start  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByEnd($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE end  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodSubComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE cod_sub_complex  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE date  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodSchedule($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE cod_schedule  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodGames($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.reserve WHERE cod_games  = '$value'";
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return Reserve 
     */
    protected function readRow($row) {
        $reserve = new Reserve();
        $reserve->codreserve = $row['cod_reserve'];
        $reserve->amount = $row['amount'];
        $reserve->deposit = $row['deposit'];
        $reserve->canal = $row['canal'];
        $reserve->start = $row['start'];
        $reserve->end = $row['end'];
        $reserve->coduser = $row['cod_user'];
        $reserve->codsubcomplex = $row['cod_sub_complex'];
        $reserve->date = $row['date'];
        $reserve->codschedule = $row['cod_schedule'];
        $reserve->codgames = $row['cod_games'];
        return $reserve;
    }

    public function describe() {
        $sql = "DESC db_toquela.reserve";
        return $this->getList($sql, true);
    }

}

?>