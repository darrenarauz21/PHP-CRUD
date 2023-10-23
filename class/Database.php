<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "actividad5";
    private $connection;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle exceptions here (e.g., error logging)
            echo "Error: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>
