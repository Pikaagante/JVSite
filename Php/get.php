<?php

require_once('Config/Config.php');
require_once('BDD/Database.php');

class Get
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * Récupère les jeux pour la page d'accueil
     */
    public function GetAccueil()
    {
        $req = "SELECT nom_jeu, note, image_url FROM jv";

        $stmt = $this->database->getConnection()->prepare($req);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Récupère les jeux selon les différents filtres
     */
    public function GetFiltre(
        $search,
        $vr,
        $fini,
        $style,
        $launcher,
        $plateforme,
        $note
    ) {
        $req = "SELECT nom_jeu, note, image_url FROM jv WHERE 1=1";

        $params = [];

        // Recherche par nom
        if (!empty($search)) {
            $req .= " AND nom_jeu LIKE :search";
            $params[':search'] = "%$search%";
        }

        // VR
        if ($vr !== '') {
            $req .= " AND vr = :vr";
            $params[':vr'] = $vr;
        }

        // Jeu terminé
        if ($fini !== '') {
            $req .= " AND fini = :fini";
            $params[':fini'] = $fini;
        }

        // Style
        if (!empty($style)) {
            $req .= " AND style = :style";
            $params[':style'] = $style;
        }

        // Launcher
        if (!empty($launcher)) {
            $req .= " AND launcher = :launcher";
            $params[':launcher'] = $launcher;
        }

        // Plateforme
        if (!empty($plateforme)) {
            $req .= " AND plateforme = :plateforme";
            $params[':plateforme'] = $plateforme;
        }

        // Note
        if (!empty($note)) {
            $req .= " AND note = :note";
            $params[':note'] = $note;
        }

        $stmt = $this->database->getConnection()->prepare($req);
        $stmt->execute($params);

        return $stmt->fetchAll();
    }

    /**
     * Récupère un jeu aléatoire
     */
    public function GetRandom()
    {
        $req = "SELECT nom_jeu, note, image_url
                FROM jv
                ORDER BY RAND()
                LIMIT 1";

        $stmt = $this->database->getConnection()->prepare($req);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * Récupère toutes les informations d'un jeu
     */
    public function GetJeu($nom_jeu)
    {
        $req = "SELECT *
                FROM jv
                WHERE nom_jeu = :nom_jeu";

        $stmt = $this->database->getConnection()->prepare($req);
        $stmt->execute([
            ':nom_jeu' => $nom_jeu
        ]);

        return $stmt->fetch();
    }

    /**
     * Effectue une requête HTTP vers Steam.
     *
     * @param string $url URL à appeler
     * @return array|null
     */
    private function steamRequest($url)
    {
        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => "User-Agent: Mozilla/5.0\r\n"
            ]
        ]);

        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            return null;
        }

        $data = json_decode($response, true);

        if (!is_array($data)) {
            return null;
        }

        return $data;
    }

    /**
     * Récupère les détails d'un jeu Steam à partir de son nom.
     *
     * Fonctionnement :
     *
     * 1. Recherche le jeu sur le Store Steam
     * 2. Récupère son AppID
     * 3. Appelle l'API publique appdetails
     * 4. Retourne les informations du jeu
     *
     * Aucune clé API Steam n'est nécessaire.
     */
    public function GetSteamGameDetails($gameName)
    {
        if (empty($gameName)) {
            return [];
        }

        /*
         * ---------------------------------------------------------
         * ÉTAPE 1 : rechercher le jeu sur le Store Steam
         * ---------------------------------------------------------
         */

        $searchUrl = 'https://store.steampowered.com/search/?term='
            . urlencode($gameName)
            . '&l=french';

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' =>
                    "User-Agent: Mozilla/5.0\r\n" .
                    "Accept-Language: fr-FR,fr;q=0.9\r\n"
            ]
        ]);

        $html = @file_get_contents($searchUrl, false, $context);

        if ($html === false) {
            return [];
        }

        /*
         * ---------------------------------------------------------
         * ÉTAPE 2 : récupérer l'AppID depuis les résultats Steam
         * ---------------------------------------------------------
         */

        $gameId = null;

        /*
         * Steam utilise notamment :
         *
         * data-ds-appid="379720"
         *
         * pour identifier les jeux dans les résultats.
         */

        if (preg_match_all(
            '/data-ds-appid=["\'](\d+)["\']/i',
            $html,
            $matches
        )) {

            /*
             * On récupère le nom des résultats pour essayer
             * de trouver la correspondance exacte.
             */

            if (preg_match_all(
                '/data-ds-appid=["\'](\d+)["\'][^>]*>(.*?)<\/a>/is',
                $html,
                $resultMatches
            )) {

                for ($i = 0; $i < count($resultMatches[1]); $i++) {

                    $appid = $resultMatches[1][$i];

                    $resultName = strip_tags($resultMatches[2][$i]);

                    $resultName = html_entity_decode(
                        $resultName,
                        ENT_QUOTES | ENT_HTML5,
                        'UTF-8'
                    );

                    $resultName = trim($resultName);

                    /*
                     * Correspondance exacte
                     */
                    if (strcasecmp($resultName, $gameName) === 0) {
                        $gameId = $appid;
                        break;
                    }
                }
            }

            /*
             * Si aucune correspondance exacte n'a été trouvée,
             * on prend le premier résultat Steam.
             */
            if ($gameId === null && !empty($matches[1])) {
                $gameId = $matches[1][0];
            }
        }

        /*
         * Impossible de trouver le jeu
         */
        if ($gameId === null) {
            return [];
        }

        /*
         * ---------------------------------------------------------
         * ÉTAPE 3 : récupérer les informations du jeu
         * ---------------------------------------------------------
         */

        $steamStoreUrl =
            'https://store.steampowered.com/api/appdetails'
            . '?appids=' . urlencode($gameId)
            . '&l=french';

        $steamStoreData = $this->steamRequest($steamStoreUrl);

        if (
            $steamStoreData === null ||
            !isset($steamStoreData[$gameId]['success']) ||
            !$steamStoreData[$gameId]['success'] ||
            !isset($steamStoreData[$gameId]['data'])
        ) {
            return [];
        }

        $data = $steamStoreData[$gameId]['data'];

        /*
         * ---------------------------------------------------------
         * ÉTAPE 4 : préparer les images
         * ---------------------------------------------------------
         */

        $screenshots = [];

        if (!empty($data['screenshots']) && is_array($data['screenshots'])) {

            foreach ($data['screenshots'] as $screenshot) {

                if (!empty($screenshot['path_full'])) {
                    $screenshots[] = $screenshot['path_full'];
                }
            }
        }

        /*
         * ---------------------------------------------------------
         * ÉTAPE 5 : ajouter les informations supplémentaires
         * ---------------------------------------------------------
         *
         * On garde exactement la structure utilisée dans
         * detail_jeu.php.
         */

        $data['additionalDetails'] = [
            'description' => $data['detailed_description'] ?? 'Description non disponible',

            'images' => [
                'header_image' => $data['header_image'] ?? '',
                'screenshots' => $screenshots
            ]
        ];

        /*
         * Retourne toutes les données Steam
         */
        return $data;
    }
}

?>

