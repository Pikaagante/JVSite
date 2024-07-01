<?php
class Database {
    private $connection;

    public function __construct($servername, $username, $password, $dbname) {
        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}
?>