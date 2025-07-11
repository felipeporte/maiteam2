<?php
class Database {
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $dbname = 'clubpatinaje';
    private $user = 'root';
    private $pass = '';

    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
        $this->conn = new PDO($dsn, $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
