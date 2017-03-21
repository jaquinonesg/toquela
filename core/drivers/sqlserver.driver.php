<?php

final class SqlServer extends Database {

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

    /**
     * Obtiene la instancia de la base de datos.
     * 
     * @return Session
     */
    public static function database() {
        if (!isset(self::$_instance)) {
            $className = __CLASS__;
            self::$_instance = new $className;
        }
        self::$autocommit = true;
        return self::$_instance;
    }

    /**
     * Abre la conexión con la base de datos, creando la instancia para el manejo
     * posterior a los procesos del CRUD.
     */
    protected function open_connection() {
        $this->last_id = null;
        $this->affect_rows = null;

        $connectionInfo = array(
            "UID" => self::$db_user,
            "pwd" => self::$db_pass,
            "Database" => $this->db_name,
            "LoginTimeout" => 30,
            "Encrypt" => 1);

        $serverName = self::$db_host;
        $this->connection = sqlsrv_connect($serverName, $connectionInfo) or
                ($this->errors("Errores en la Conexión: "));

        $dataset = sqlsrv_query($this->connection, "USE db_toquela") or
                $this->errors(sqlsrv_errors(), "Error en la ejecución del script");
        sqlsrv_free_stmt($dataset);
    }

    /**
     * Cierra la conexión con la base de datos.
     */
    protected function close_connection() {
        if ($this->connection == !null) {
            sqlsrv_close($this->connection);
        }
    }

    /**
     * Ejecuta varios querys al tiempo (INSERT - UPDATE - DELETE)
     */
    public function execute_query() {
        $this->open_connection();
        $this->dataset = sqlsrv_query($this->connection, $this->query . "; SELECT SCOPE_IDENTITY() AS 'id';") or
                $this->errors(sqlsrv_errors(), "Error en la ejecución del script");
        $this->num_rows = sqlsrv_num_rows($this->dataset);
        $next_result = sqlsrv_next_result($this->dataset);
        if ($next_result) {
            $row = sqlsrv_fetch_array($this->dataset, SQLSRV_FETCH_ASSOC);
            $this->last_id = $row['id'];
        }
        sqlsrv_free_stmt($this->dataset);
        $this->close_connection();
    }

    public function commit() {
        $this->conn->commit();
    }

    public function rollback() {
        $this->conn->rollback();
    }

    /**
     * Escape strings 
     * 
     * @param   mixed  String to escape 
     * @return  string Escaped string, ready for SQL insertion 
     */
    public function escape($data) {
        switch (gettype($data)) {
            case 'string':
                $data = "'" . mysql_real_escape_string($data) . "'";
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

    /**
     * Retorna un result de un query.
     * 
     * @param Boolean $object
     * @return Object | Array
     */
    public function get_results_from_query($object = false) {
        $this->open_connection();
        if ($params == null) {
            $this->dataset = sqlsrv_query($this->connection, $this->query, null, array("Scrollable" => 'keyset')) or $this->errors(sqlsrv_errors(), "Error en la consulta del script", $sentencia);
        } else {
            $this->dataset = sqlsrv_query($this->connection, $sentencia, $params) or
                    $this->errors(sqlsrv_errors(), "Error en la ejecución del script", $sentencia);
        }
        while ($rows[] = sqlsrv_fetch_array($this->dataset, SQLSRV_FETCH_ASSOC));
        array_pop($rows);
        $resultSet = $rows;
        $this->num_rows = sqlsrv_num_rows($this->dataset);
        $this->last_id = sqlsrv_get_field($this->dataset, 0);
        sqlsrv_free_stmt($this->dataset);
        $this->close_connection();
        return $resultSet;
    }

    /**
     * Obtiene cuantos registros se obtubieron durante la consulta.
     * 
     * @return int 
     */
    public function num_rows() {
        return $this->num_rows;
    }

    /**
     * 
     * @return type
     */
    public function getAffectedRows() {
        return $this->affect_rows;
    }

    /**
     * 
     * @return type
     */
    public function getLastId() {
        return $this->last_id;
    }

    /**
     * LLama un procedimiento almacenado de la base de datos.
     * 
     * @param string $procedure Nombre del procedure
     */
    public function callProcedure($procedure) {
        
    }

    public function set(&$value) {
        
        
        /* $this->open_connection();
          $value = mysqli_escape_string($this->conn, $value);
          $this->close_connection(); */
    }

    public function setAutocommit($flag) {
        if (is_bool($flag)) {
            $this->autocommit = $flag;
        }
    }

    protected function errors($algo = "") {
        throw new ExceptionSqlServer(sqlsrv_errors());
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            $className = __CLASS__;
            self::$_instance = new $className;
        }
        return self::$_instance;
    }

}

class ExceptionSqlServer extends ExceptionDatabase implements ErrorDatabase {

    public function __construct($errors) {
        $error = (object) $errors[0];

        $this->message = $error->message;
        $this->code = $error->code;
        $this->message();
        $this->log();
        parent::__construct($this->message, $this->code);
    }

    public function message() {
        switch ($this->code) {
            case 18456 :
                $string = "Error al tratar de autentificarse con el servidor";
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
