<?php

/**
 * Class that operate on table 'reserve'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class ReserveMySqlExtDAO extends ReserveMySqlDAO {

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
        $sql = "SET @total = (SELECT SUM(r.amount) FROM db_toquela.reserve r 
                                            WHERE r.date BETWEEN '$date_start' AND '$date_end' AND r.cod_sub_complex IN 
                                            (SELECT s.cod_sub_complex FROM db_toquela.sub_complex s 
                                            WHERE s.cod_complex = '$cod_complex'));

                SET @parte = (SELECT SUM(r.amount) FROM db_toquela.reserve r 
                    WHERE r.canal = '$canal' AND r.date BETWEEN '$date_start' AND '$date_end' AND 
                    r.cod_sub_complex IN (SELECT s.cod_sub_complex FROM db_toquela.sub_complex s 
                    WHERE s.cod_complex = '$cod_complex'));
                SELECT @total 'total' , @parte 'parte' , (@parte*100 / @total) AS 'porcentaje';";
        return $this->getRow($sql, true);
    }

    public function getMonth($desde, $hasta, $cancha) {

        $sql = "SELECT * FROM  db_toquela.reserve WHERE start >= '$desde' AND start <= '$hasta'  and cod_sub_complex = '$cancha' ORDER BY start ASC";
        return $this->getList($sql);
    }

    public function getDay() {

        // $sql = "SELECT * FROM  db_toquela.reserve WHERE date >= '2013-07-18' AND date <= '2013-07-20' ORDER BY date ASC";
        //  return $this->getList($sql);
    }

    public function getMinDate($cod_complex) {
        $sql = "SELECT MIN(r.date) as 'date' FROM db_toquela.reserve r WHERE r.cod_sub_complex IN (SELECT 
                    s.cod_sub_complex FROM db_toquela.complex c, db_toquela.sub_complex s 
                    WHERE s.cod_complex = c.cod_complex AND c.cod_complex = '$cod_complex');";
        return $this->getRow($sql, true);
    }

    public function getMaxDate($cod_complex) {
        $sql = "SELECT MAX(r.date) as 'date' FROM db_toquela.reserve r WHERE r.cod_sub_complex IN (SELECT 
                    s.cod_sub_complex FROM db_toquela.complex c, db_toquela.sub_complex s 
                    WHERE s.cod_complex = c.cod_complex AND c.cod_complex = '$cod_complex');";
        return $this->getRow($sql, true);
    }

    public function insertValidate($reserve) {
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
        if (!isset($reserve->codgames) || $reserve->codgames == 'undefined') {
            $sql = "INSERT INTO db_toquela.reserve ( amount , deposit , canal , start , end , cod_user , cod_sub_complex , date , cod_schedule , cod_games ) 
                    VALUES ('$reserve->amount','$reserve->deposit','$reserve->canal','$reserve->start','$reserve->end','$reserve->coduser','$reserve->codsubcomplex','$reserve->date','$reserve->codschedule',NULL)";
        } else {
            $sql = "INSERT INTO db_toquela.reserve ( amount , deposit , canal , start , end , cod_user , cod_sub_complex , date , cod_schedule , cod_games ) 
                    VALUES ('$reserve->amount','$reserve->deposit','$reserve->canal','$reserve->start','$reserve->end','$reserve->coduser','$reserve->codsubcomplex','$reserve->date','$reserve->codschedule','$reserve->codgames')";
        }
        $id = $this->executeInsert($sql);
        /* $reserve-> = $id; */
        return $id;
    }

}
