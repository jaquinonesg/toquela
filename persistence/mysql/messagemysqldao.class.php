<?php

/**
 * Clase que opera sobre la tabla 'message'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-01-27 17:35
 */
class MessageMySqlDAO extends ModelDAO implements MessageDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Message
     */
    public function load($codmessage) {

        $this->set($codmessage);
        $sql = "SELECT * FROM db_toquela.message WHERE  cod_message =  '$codmessage'";
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
        $sql = "SELECT * FROM db_toquela.message $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.message ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param message primary key
     */
    public function delete($codmessage) {

        $this->set($codmessage);
        $sql = "DELETE FROM db_toquela.message WHERE  cod_message =  '$codmessage'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Message message
     */
    public function insert($message) {
        $this->set($message->text);
        $this->set($message->subject);
        $this->set($message->date);
        $this->set($message->viewed);
        $this->set($message->state);
        $this->set($message->from);
        $this->set($message->to);
        $this->set($message->codteam);

        echo $sql = "INSERT INTO db_toquela.message ( text , subject , date , viewed , state , `from` , `to` , `cod_team` ) 
                    VALUES ('$message->text','$message->subject',NULL,'$message->viewed','$message->state','$message->from','$message->to',NULL)";
        $id = $this->executeInsert($sql);
        /* $message-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Message message
     */
    public function update($message) {
        $this->set($message->text);
        $this->set($message->subject);
        $this->set($message->date);
        $this->set($message->viewed);
        $this->set($message->state);
        $this->set($message->from);
        $this->set($message->to);
        $this->set($message->codteam);

        $sql = "UPDATE db_toquela.message  SET 
		 text = if( strcmp('$message->text'  , '' ) = 1  , '$message->text', text ),
		 subject = if( strcmp('$message->subject'  , '' ) = 1  , '$message->subject', subject ),
		 date = if( strcmp('$message->date'  , '' ) = 1  , '$message->date', date ),
		 viewed = if( strcmp('$message->viewed'  , '' ) = 1  , '$message->viewed', viewed ),
		 state = if( strcmp('$message->state'  , '' ) = 1  , '$message->state', state ),
		 from = if( strcmp('$message->from'  , '' ) = 1  , '$message->from', from ),
		 to = if( strcmp('$message->to'  , '' ) = 1  , '$message->to', to ),
		 cod_team = if( strcmp('$message->codteam'  , '' ) = 1  , '$message->codteam', cod_team ) WHERE  cod_message =  '$message->codmessage'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.message';
        return $this->executeUpdate($sql);
    }

    public function queryByText($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.message WHERE text  = '$value'";
        return $this->getList($sql);
    }

    public function queryBySubject($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.message WHERE subject  = '$value'";
        return $this->getList($sql);
    }

    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.message WHERE date  = '$value'";
        return $this->getList($sql);
    }

    public function queryByViewed($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.message WHERE viewed  = '$value'";
        return $this->getList($sql);
    }

    public function queryByState($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.message WHERE state  = '$value'";
        return $this->getList($sql);
    }

    public function queryByFrom($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.message WHERE from  = '$value'";
        return $this->getList($sql);
    }

    public function queryByTo($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.message WHERE to  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodTeam($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.message WHERE cod_team  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByText($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.message WHERE text  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteBySubject($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.message WHERE subject  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.message WHERE date  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByViewed($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.message WHERE viewed  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByState($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.message WHERE state  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByFrom($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.message WHERE from  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByTo($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.message WHERE to  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodTeam($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.message WHERE cod_team  = '$value'";
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return Message 
     */
    protected function readRow($row) {
        $message = new Message();
        $message->codmessage = $row['cod_message'];
        $message->text = $row['text'];
        $message->subject = $row['subject'];
        $message->date = $row['date'];
        $message->viewed = $row['viewed'];
        $message->state = $row['state'];
        $message->from = $row['from'];
        $message->to = $row['to'];
        $message->codteam = $row['cod_team'];
        return $message;
    }

    public function describe() {
        $sql = "DESC db_toquela.message";
        return $this->getList($sql, true);
    }

}

?>