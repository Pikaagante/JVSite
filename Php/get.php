<?php
require_once ('Config/Config.php');
require_once ('BDD/Database.php');

class Get
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }
}

$config = new Config();
$database = new Database($config->getServername(), $config->getUsername(), $config->getPassword(), $config->getDBName());
$modif = new Modif($database);

?>