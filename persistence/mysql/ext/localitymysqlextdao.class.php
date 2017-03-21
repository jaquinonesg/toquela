<?php

/**
 * Class that operate on table 'locality'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-06-05 12:58
 */
class LocalityMySqlExtDAO extends LocalityMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM locality LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM locality ";
        return $this->getValue($sql);
    }

    public function getLocalityOrder() {
        $query = "SELECT 
                    cod_city AS 'cod_locality',
                    name AS 'ciudad',
                    name AS 'depart',
                    'Colombia' AS 'pais'
                  FROM
                    db_toquela.city  ORDER BY \"order\" DESC";
        return $this->getList($query, true);
    }

    public function getCoinciUsersComplex($value) {
        $data = array();
        $query = "SELECT u.name, u.cod_user FROM db_toquela.users u WHERE u.name LIKE '%$value%'";
        $result = $this->getList($query, true);
        if (is_array($result)) {
            foreach ($result as $user) {
                $arr_aux1['label'] = $user->name;
                $arr_aux1['value'] = "U_" . $user->coduser;
                array_push($data, $arr_aux1);
            }
        }
        $query2 = "SELECT c.name, c.cod_complex FROM db_toquela.complex c WHERE c.name LIKE '%$value%'";
        $result2 = $this->getList($query2, true);
        if (is_array($result2)) {
            foreach ($result2 as $complex) {
                $arr_aux2['label'] = $complex->name;
                $arr_aux2['value'] = "C_" . $complex->codcomplex;
                array_push($data, $arr_aux2);
            }
        }
        return $data;
    }

    public function getCity($cod_locality) {
        $sql = "SELECT c.* FROM db_toquela.city c, db_toquela.locality l WHERE c.cod_city = l.cod_city AND l.cod_locality = '$cod_locality';";
        return $this->getRow($sql, true);
    }

}
