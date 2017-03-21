<?php

abstract class Database {

    /**
     * Host
     * 
     * @var string $db_host
     */
    protected static $db_host = DB_HOST;

    /**
     * Usuario de la base de datos
     * 
     * @var string $db_user
     */
    protected static $db_user = DB_USER;

    /**
     * Password del usuario de la base de datos.
     * 
     * @var string $db_pass
     */
    protected static $db_pass = DB_PASSWORD;

    /**
     * Nombre de la base de datos.
     * 
     * @var string $db_name
     */
    protected $db_name = DB_NAME;

    /**
     * Utilizado para los procesos del CRUD
     * 
     * @var string $query
     */
    public $query;

    /**
     * Gestiona la conexión con la base de datos.
     * 
     * @var $conn
     */
    protected $connection;

    /**
     * Obtiene el valor de la PRIMARY KEY después de un INSERT.
     * 
     * @var string $last_id
     */
    protected $last_id;

    /**
     * Es el numero de filas que se afectaron ya sea en una actualizacion o en una inserción
     * 
     * @var int affect_rows
     */
    protected $affect_rows = 0;

    /**
     * Obtiene el número de registros que se obtuvieron después de una consulta.
     * 
     * @var int $num_count
     */
    protected $num_rows;

    /**
     *
     * @var type 
     */
    protected $message_error;

    /**
     *
     * @var type 
     */
    protected $code_error;

    /**
     * Motores de bases de datos soportados.
     * 
     * @var array
     */
    private static $engines = array('MYSQL', 'SQLSERVER');

    /**
     * Obtiene la instancia de la base de datos.
     * 
     * @return Session
     */
    public static function getDatabase() {
        $instance = null;
        if (in_array(ENGINE_DATABASE, self::$engines)) {
            try {
                $instance = MySql::getInstance();
            } catch (ErrorException $e) {
                $instance = null;
            }
        }
        else{
            throw new Exception('Motor de base de datos no encontrado.');
        }
        return $instance;
    }

    abstract protected function open_connection();

    abstract protected function close_connection();

    abstract function get_results_from_query();

    abstract function execute_query();

    abstract function escape($data);

    abstract function commit();

    abstract function rollback();

    abstract function callProcedure($name_procedure);

    abstract protected function errors();

    //abstract static function getInstance();

    /**
     * 
     * @return int
     */
    public function num_rows() {
        return $this->num_rows;
    }

    /**
     * 
     * @return int
     */
    public function getAffectedRows() {
        return $this->affect_rows;
    }

    /**
     * 
     * @return int
     */
    public function getLastId() {
        return $this->last_id;
    }

}

