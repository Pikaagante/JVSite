<?php
class Config {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "jv";

    public function getServername() {
        return $this->servername;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getDBName() {
        return $this->dbname;
    }
}
?>
