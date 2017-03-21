<?php

/**
 * Class that operate on table 'sub_complex'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class SubComplexMySqlExtDAO extends SubComplexMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.sub_complex LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.sub_complex ";
        return $this->getValue($sql);
    }

    public function loadConFoto($codsubcomplex) {
        $sql = "SELECT
	sc.*, (
		SELECT
			a.path
		FROM
			complex_has_attachment AS cha INNER JOIN attachment AS a ON cha.cod_attachment = a.cod_attachment	WHERE
			cha.cod_sub_complex = sc.cod_sub_complex LIMIT 1
	) 'foto'
FROM
	db_toquela.sub_complex AS sc
WHERE
	sc.cod_sub_complex = '$codsubcomplex';";
        return $this->getRow($sql, true);
    }

}

?>
