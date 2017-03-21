<?php

final class MySql extends Database {

    /**
     * Única instancia de la clase.
     * 
     * @var Session $_instance
     */
    private static $_instance;
    
    /**
     *
     * @var bool 
     */
    private static $autocommit;

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            $className = __CLASS__;
            self::$_instance = new $className;
        }
        self::$autocommit = true;
        return self::$_instance;
    }

    protected function open_connection() {
        $this->last_id = null;
        $this->affect_rows = null;
        $this->connection = new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name) or ($this->errors("Errores en la Conexión: " . mysqli_connect_error($this->connection)));
        $this->connection->set_charset("utf8");
    }

    protected function close_connection() {
        $this->connection->close();
    }

    public function execute_query() {
        $this->open_connection();
        $this->connection->autocommit(self::$autocommit);
        $this->connection->multi_query($this->query) or ($this->errors());
        $this->last_id = mysqli_insert_id($this->connection);
        $this->affect_rows = mysqli_affected_rows($this->connection);
        $this->close_connection();
    }

    public function get_results_from_query($object = false) {
        $this->open_connection();
        $result = $this->connection->query($this->query) or ($this->errors());
        while ($rows[] = $result->fetch_assoc());
        array_pop($rows);
        $this->num_rows = count($rows);
        if ($object) {
            $resultSet = Util::arrayToObject($rows);
        } else {
            $resultSet = $rows;
        }
        $result->close();
        $this->close_connection();
        return $resultSet;
    }

    public function callProcedure($name_procedure) {
        
    }

    public function commit() {
        $this->connection->commit();
    }

    public function rollback() {
        $this->connection->rollback();
    }

    public function escape($data) {
        switch (gettype($data)) {
            case 'string':
                 $this->open_connection();
                $data = "'" . mysqli_real_escape_string($this->conn, $data) . "'";
                $this->close_connection();
                break;
            case 'boolean':
                $data = (int) $data;
                break;
            case 'double':
                $data = sprintf('%F', $data);
                break;
            default:
                $data = ($data === null) ? 'null' : $data;
        }
        return (string) $data;
    }

    protected function errors() {
        throw new ExceptionMysql(mysqli_error($this->connection), mysqli_errno($this->connection));
    }
    
    public function set(&$value) {
        $this->open_connection();
        $value = mysqli_escape_string($this->connection, $value);
        $this->close_connection();
    }

}

class ExceptionMysql extends ExceptionDatabase implements ErrorDatabase {

    public function __construct($message, $code, $previous = null) {
        $this->message = $message;
        $this->code = $code;
        $this->log();
        $this->message();
    }

    public function message() {
        switch ($this->code) {
            case 1062 :
                $string = "Ya se encuentran datos guardados con los valores introducidos, por favor intente de nuevo.";
                break;
            case 1264 :
                $string = "Algún dato fue dado fuera del rango establecido en la base de datos.";
                break;
            case 1064 :
                $string = "Error en la sintaxis.";
                break;
            default :
                $string = "Código $this->code no encontrado";
                break;
        }
    }

}