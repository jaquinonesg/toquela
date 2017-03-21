<?php

/**
 * Class that operate on table 'reserve'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class ReserveSqlServerExtDAO extends ReserveSqlServerDAO {

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.reserve ";
        return $this->getValue($sql);
    }
        public function getAvgByCanal($canal, $cod_complex) {
        $sql = "SELECT (SELECT SUM(r.amount) FROM db_toquela.reserve r WHERE canal = '$canal' ) * (100 / SUM(r.amount) ) as 'porcentaje'
                    FROM db_toquela.reserve r;";
        return $this->getRow($sql, true);
    }

    public function porcentajeByCanal($canal, $cod_complex, $date_start, $date_end) {
        $sql = "DECLARE @total FLOAT = (SELECT SUM(r.amount) FROM db_toquela.reserve r 
                                            WHERE r.date BETWEEN '$date_start' AND '$date_end' AND r.cod_sub_complex IN 
                                            (SELECT s.cod_sub_complex FROM db_toquela.sub_complex s 
                                            WHERE s.cod_complex = '$cod_complex'));

                DECLARE @parte FLOAT = (SELECT SUM(r.amount) FROM db_toquela.reserve r 
                    WHERE r.canal = '$canal' AND r.date BETWEEN '$date_start' AND '$date_end' AND 
                    r.cod_sub_complex IN (SELECT s.cod_sub_complex FROM db_toquela.sub_complex s 
                    WHERE s.cod_complex = '$cod_complex'));
                SELECT @total 'total' , @parte 'parte' , (@parte*100 / @total) AS 'porcentaje';";
        return $this->getRow($sql, true);
    }

    public function getMonth($desde, $hasta) {

        $sql = "SELECT * FROM  db_toquela.reserve WHERE start >= '$desde' AND start <= '$hasta'  ORDER BY start ASC";
        return $this->getList($sql);
    }

    public function getDay($desde, $hasta) {

        $sql = "SELECT * FROM  db_toquela.reserve where  start >= '$desde' AND start <= '$hasta' ORDER BY start ASC";
        return $this->getList($sql);
    }



}

?>
