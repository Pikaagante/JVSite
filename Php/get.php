<?php
require_once ('Config/Config.php');
require_once ('BDD/Database.php');

class Get
{
    private $database;
    private $steamApiKey;

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

    public function GetJeu($nom_jeu){
        $req = "SELECT * FROM jv WHERE nom_jeu = :nom_jeu";
        $stmt = $this->database->getConnection()->prepare($req);
        $stmt->execute([':nom_jeu' => $nom_jeu]);


        return $stmt->fetch();
    }

    public function GetSteamGameDetails($gameName) {
        $apiUrl = 'https://api.steampowered.com/ISteamApps/GetAppList/v2/';
        $response = file_get_contents($apiUrl);
        if ($response === false) {
            return "Error fetching game list from Steam API";
        }
        $data = json_decode($response, true);
        if ($data === null) {
            return "Error decoding game list from Steam API";
        }
    
        $gameId = null;
        foreach ($data['applist']['apps'] as $app) {
            if (strcasecmp($app['name'], $gameName) == 0) {
                $gameId = $app['appid'];
                break;
            }
        }
    
        if ($gameId === null) {
            return "Game not found";
        }
    
        $steamStoreUrl = "https://store.steampowered.com/api/appdetails?appids=$gameId&l=french";
        $steamStoreResponse = file_get_contents($steamStoreUrl);
        if ($steamStoreResponse === false) {
            return "Error fetching game details from Steam Store";
        }
        $steamStoreData = json_decode($steamStoreResponse, true);
        if ($steamStoreData === null || !isset($steamStoreData[$gameId]['data'])) {
            return "Error decoding game details from Steam Store";
        }

        $steamStoreData[$gameId]['data']['additionalDetails'] = [
            'description' => $steamStoreData[$gameId]['data']['detailed_description'],
            'images' => [
                'header_image' => $steamStoreData[$gameId]['data']['header_image'],
                'screenshots' => array_map(function($screenshot) {
                    return $screenshot['path_full'];
                }, $steamStoreData[$gameId]['data']['screenshots']),
            ],
        ];
    
        return $steamStoreData[$gameId]['data'];
    }

}

?>