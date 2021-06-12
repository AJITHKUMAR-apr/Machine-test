<?php

function error_logger($str, $sql) {
    $log = "User: " . $_SERVER['REMOTE_ADDR'] . ' - ' . date("F j, Y, g:i a") . PHP_EOL .
            "Attempt: " . $str . PHP_EOL .
            "Query: " . PHP_EOL . $sql . PHP_EOL .
            "-------------------------" . PHP_EOL;
    throw new Exception("DB error " . $log);
}

class MySQLDatabase {

    private $connection;

    function __construct() {
        $this->open_connection();
    }

    function __destruct() {
        $this->close_connection();
    }

    public function open_connection() {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or error_logger("Database failed", "Connection");
        ;
    }

    public function close_connection() {
        if (isset($this->connection)) {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }

    public function basicquery($sql) {
        return mysqli_query($this->connection, $sql);
        //return mysql_error();
    }

    public function query($sql) {
        $result = mysqli_query($this->connection, $sql) or error_logger("Database query failed", $sql);
        return $result;
    }

    public function commit() {
        mysqli_commit($this->connection);
    }

    public function autoCommit($value) {
        mysqli_autocommit($this->connection, $value);
    }

    public function rollBack() {
        mysqli_rollback($this->connection);
    }

    public function fetch_array($result_set) {
        return mysqli_fetch_array($result_set);
    }

    public function num_rows($result_set) {
        return mysqli_num_rows($result_set);
    }

    public function select($query) {
        $rows = array();
        $result = $this->query($query);

        if ($result === false) {
            return false;
        }

        while ($row = $this->fetch_array($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function affected_rows() {
        return mysqli_affected_rows($this->connection);
    }

    public function insert_id() {
        return mysqli_insert_id($this->connection);
    }

    public function escape_string($string) {
        return mysqli_real_escape_string($this->connection, $string);
    }

    public function logInfo() {        
    }
    public function fetch_assoc($result_set){
        return mysqli_fetch_assoc($result_set);
        
    }
}

$database = new MySQLDatabase();
$db = & $database;
?>
