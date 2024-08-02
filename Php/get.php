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

    public function GetAccueil()
    {
        $req = "SELECT nom_jeu, note, image_url FROM jv";
        $stmt = $this->database->getConnection()->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function GetFiltre($search, $vr, $fini, $style, $launcher, $plateforme, $note) {
        // Base de la requête
        $req = "SELECT nom_jeu, note, image_url FROM jv WHERE 1=1";
        
        // Paramètres pour la requête préparée
        $params = [];
        
        // Filtre de recherche par nom de jeu
        if (!empty($search)) {
            $req .= " AND nom_jeu LIKE :search";
            $params[':search'] = "%$search%";
        }
        
        // Filtre VR
        if ($vr !== '') {
            $req .= " AND vr = :vr";
            $params[':vr'] = $vr;
        }
        
        // Filtre Fini
        if ($fini !== '') {
            $req .= " AND fini = :fini";
            $params[':fini'] = $fini;
        }
        
        // Filtre Style
        if (!empty($style)) {
            $req .= " AND style = :style";
            $params[':style'] = $style;
        }

        // Filtre Launcher
        if (!empty($launcher)) {
            $req .= " AND launcher = :launcher";
            $params[':launcher'] = $launcher;
        }

        // Filtre Plateforme
        if (!empty($plateforme)) {
            $req .= " AND plateforme = :plateforme";
            $params[':plateforme'] = $plateforme;
        }

        // Filtre Note
        if (!empty($note)) {
            $req .= " AND note = :note";
            $params[':note'] = $note;
        }
        
        // Préparation et exécution de la requête
        $stmt = $this->database->getConnection()->prepare($req);
        $stmt->execute($params);
        
        // Retourner les résultats
        return $stmt->fetchAll();
    }

    public function GetRandom(){
        $req = "SELECT nom_jeu, note, image_url FROM jv ORDER BY RAND() LIMIT 1";
        $stmt = $this->database->getConnection()->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>