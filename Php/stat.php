<?php
require_once('Config/Config.php');
require_once('BDD/Database.php');

class Stat
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getVr()
    {
        $sql = "SELECT COUNT(*) FROM jv WHERE VR = 1 AND note >= 1";
        $stmt = $this->database->getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function getNbrJeuxPlateforme($plateforme)
    {
        $sql = "SELECT COUNT(*) FROM jv WHERE plateforme = :plateforme";
        $stmt = $this->database->getConnection()->prepare($sql);
        $stmt->bindParam(':plateforme', $plateforme, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function getNbrJeuxLauncher($launcher)
    {
        $sql = "SELECT COUNT(*) FROM jv WHERE launcher = :launcher";
        $stmt = $this->database->getConnection()->prepare($sql);
        $stmt->bindParam(':launcher', $launcher, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function getNbrJeuxStyle($style)
    {
        $sql = "SELECT COUNT(*) FROM jv WHERE style = :style";
        $stmt = $this->database->getConnection()->prepare($sql);
        $stmt->bindParam(':style', $style, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function getNbrJeuxDossier($idDossier)
    {
        $sql = "SELECT COUNT(*) FROM jeuxdossiers WHERE id_dossier = :idDossier";
        $stmt = $this->database->getConnection()->prepare($sql);
        $stmt->bindParam(':idDossier', $idDossier, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchColumn();
    }
}
?>