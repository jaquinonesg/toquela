<?php

/**
 * Class that operate on table 'schedule'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class ScheduleSqlServerExtDAO extends ScheduleSqlServerDAO {

    public function schedule_exist($day, $start, $end, $sub) {
        $sql = "SELECT * FROM db_toquela.schedule s WHERE s.day = '$day' AND s.start_hour = '$start' AND s.end_hour = '$end' AND s.cod_sub_complex = '$sub';";
        if (!is_null($this->getRow($sql))) {
            return true;
        }
        return false;
    }

    public function getSchedulesByTime($time, $cod_sub, $day = 1) {
        switch ($time) {
            case 1: //Mañana
                $sql = "SELECT * FROM db_toquela.schedule WHERE end_hour <= '12:00' AND cod_sub_complex = '$cod_sub' AND day = '$day'
                            ORDER BY day, start_hour;";
                break;
            case 2://Tarde
            default:
                $sql = "SELECT * FROM db_toquela.schedule WHERE end_hour >= '12:00' AND cod_sub_complex = '$cod_sub' AND day = '$day'
                            ORDER BY day, start_hour;";
                break;
        }
        return $this->getList($sql, true);
    }

    public function isScheduleBetweenHours($day, $start, $end, $cod_sub) {
        $sql = "SELECT 
  COUNT(*) 'wow' 
FROM
  db_toquela.schedule s 
WHERE s.day = '$day' 
  AND (
    ('$start' >= s.start_hour AND  '$start' < s.end_hour )
    OR ('$end' > s.start_hour AND '$end' <= s.end_hour)
  ) 
AND s.cod_sub_complex = '$cod_sub';";

        $row = $this->getRow($sql, true);

        /* echo "<pre>";
          @print_r($row);
          echo "</pre>"; */

        if ($row->wow == 0) {
            return false;
        } else {
            return true;
        }
        return false;
    }

    public function getScheduleByComplexByDay($day, $cod_sub_complex) {
        $sql = "SELECT * FROM db_toquela.schedule WHERE day = '$day' AND cod_sub_complex = '$cod_sub_complex'";
        return $this->getList($sql);
    }

    public function getScheduleByComplexOrderByDay($cod_sub_complex) {
        $sql = "SELECT * FROM db_toquela.schedule WHERE cod_sub_complex = '$cod_sub_complex' ORDER BY day , start_hour";
        return $this->getList($sql);
    }

    public function getScheduleByDay($date, $day, $cancha) {
         $sql = "SELECT 
                s.*,
               (SELECT deposit FROM db_toquela.reserve WHERE CONVERT(varchar, start, 121) LIKE '$date%' AND s.cod_schedule = cod_schedule ) AS 'status' ,
               (SELECT cod_reserve FROM db_toquela.reserve WHERE CONVERT(varchar, start, 121) LIKE '$date%' AND s.cod_schedule = cod_schedule ) as cod_reserve
               FROM db_toquela.schedule s
               WHERE s.cod_sub_complex = '$cancha' 
                 AND s.day = '$day'
               ORDER BY start_hour";
        return $this->getList($sql, true);
    }

}
