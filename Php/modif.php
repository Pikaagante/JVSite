<?php
require_once ('Config/Config.php');
require_once ('BDD/Database.php');

class Modif
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function updateName($old_name, $new_name)
    {
        try {
            // Vérifier si le jeu existe
            $sql = "SELECT * FROM jv WHERE nom_jeu = :old_name";
            $stmt = $this->database->getConnection()->prepare($sql);
            $stmt->bindParam(':old_name', $old_name, PDO::PARAM_STR);
            $stmt->execute();
            $jeu = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($jeu) {
                // Mettre à jour le nom du jeu
                $sql = "UPDATE jv SET nom_jeu = :new_name WHERE nom_jeu = :old_name";
                $stmt = $this->database->getConnection()->prepare($sql);

                $stmt->bindParam(':old_name', $old_name, PDO::PARAM_STR);
                $stmt->bindParam(':new_name', $new_name, PDO::PARAM_STR);

                $stmt->execute();

                $updatedRows = $stmt->rowCount();
                if ($updatedRows > 0) {
                    header('Location: ../Html/accueil.php');
                } else {
                    echo "La modification du nom a échoué.";
                }
            } else {
                echo "Le jeu avec le nom $old_name n'existe pas.";
            }
        } catch (PDOException $e) {
            echo "Erreur de mise à jour : " . $e->getMessage();
        }
    }

    public function updateFini($name_jeu_fini, $fini)
    {
        try {
            $sql = "UPDATE jv SET fini = :fini WHERE nom_jeu = :name";
            $stmt = $this->database->getConnection()->prepare($sql);

            $stmt->bindParam(':name', $name_jeu_fini, PDO::PARAM_STR);
            $stmt->bindParam(':fini', $fini, PDO::PARAM_INT);

            $stmt->execute();

            $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                header('Location: ../Html/accueil.php');
            } else {
                echo "La modification a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }

    public function updateFiniSucces($name_jeu_success, $fini_success)
    {
        try {
            $sql = "UPDATE jv SET fini_success = :fini_success WHERE nom_jeu = :nom_jeu";
            $stmt = $this->database->getConnection()->prepare($sql);

            $stmt->bindParam(':nom_jeu', $name_jeu_success, PDO::PARAM_STR);
            $stmt->bindParam(':fini_success', $fini_success, PDO::PARAM_INT);

            $stmt->execute();

            $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                header('Location: ../Html/accueil.php');
            } else {
                echo "La modification a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }

    public function updateImage($name_jeu_image, $image_url)
    {
        try {
            $sql = "UPDATE jv SET image_url = :image_url WHERE nom_jeu = :nom_jeu";
            $stmt = $this->database->getConnection()->prepare($sql);

            $stmt->bindParam(':nom_jeu', $name_jeu_image, PDO::PARAM_STR);
            $stmt->bindParam(':image_url', $image_url, PDO::PARAM_STR);

            $stmt->execute();

            $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                header('Location: ../Html/accueil.php');
            } else {
                echo "La modification a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }

    public function updateLauncher($name_jeu_launcher, $nom_launcher)
    {
        try {
        $sql = "UPDATE jv SET launcher = :nom_launcher WHERE nom_jeu = :nom_jeu";
        $stmt = $this->database->getConnection()->prepare($sql);

        $stmt->bindParam(':nom_jeu', $name_jeu_launcher, PDO::PARAM_STR);
        $stmt->bindParam(':nom_launcher', $nom_launcher, PDO::PARAM_STR);

        $stmt->execute();
        
        $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                header('Location: ../Html/accueil.php');
            } else {
                echo "La modification a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }

    public function updateNote($name_jeu_note, $note){
        try {
            $sql = "UPDATE jv SET note = :note WHERE nom_jeu = :nom_jeu";
            $stmt = $this->database->getConnection()->prepare($sql);

            $stmt->bindParam(':nom_jeu', $name_jeu_note, PDO::PARAM_STR);
            $stmt->bindParam(':note', $note, PDO::PARAM_INT);

            $stmt->execute();

            $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                header('Location: ../Html/accueil.php');
            } else {
                echo "La modification a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }

    public function updatePlateforme($name_jeu_plateforme, $plateforme){
        try {
            $sql = "UPDATE jv SET plateforme = :plateforme WHERE nom_jeu = :nom_jeu";
            $stmt = $this->database->getConnection()->prepare($sql);

            $stmt->bindParam(':nom_jeu', $name_jeu_plateforme, PDO::PARAM_STR);
            $stmt->bindParam(':plateforme', $plateforme, PDO::PARAM_STR);

            $stmt->execute();

            $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                header('Location: ../Html/accueil.php');
            } else {
                echo "La modification a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }

    public function updateStyle($name_jeu_style, $style){
        try {
            $sql = "UPDATE jv SET style = :style WHERE nom_jeu = :nom_jeu";
            $stmt = $this->database->getConnection()->prepare($sql);

            $stmt->bindParam(':nom_jeu', $name_jeu_style, PDO::PARAM_STR);
            $stmt->bindParam(':style', $style, PDO::PARAM_STR);

            $stmt->execute();

            $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                header('Location: ../Html/accueil.php');
            } else {
                echo "La modification a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }

    public function updateSupprimer($id_jeu){
        try {
            $sql = "DELETE FROM jv WHERE id_jeu = :id_jeu";
            $stmt = $this->database->getConnection()->prepare($sql);

            $stmt->bindParam(':id_jeu', $id_jeu, PDO::PARAM_INT);

            $stmt->execute();

            $updatedRows = $stmt->rowCount();
            if ($updatedRows > 0) {
                header('Location: ../Html/accueil.php');
            } else {
                echo "La suppression a échoué.";
            }
        } catch (PDOException $e) {
            echo "Erreur de suppression : " . $e->getMessage();
        }
    }

    public function updateAjouterDossier($name_jeu_dossier, $dossier){

    }
}


$config = new Config();
$database = new Database($config->getServername(), $config->getUsername(), $config->getPassword(), $config->getDBName());
$modif = new Modif($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {

        // Nom jeu
        if ($_POST['action'] === 'updateName' && isset($_POST['nom_jeu']) && isset($_POST['nouveau_nom_jeu'])) {
            $old_name = $_POST['nom_jeu'];
            $new_name = $_POST['nouveau_nom_jeu'];

            $modif->updateName($old_name, $new_name);

        // Fini
        } elseif ($_POST['action'] === 'updateFini' && isset($_POST['name_jeu_fini'])) {
            $name_jeu_fini = $_POST['name_jeu_fini'];
            $fini = isset($_POST['fini']) ? 1 : 0;

            $modif->updateFini($name_jeu_fini, $fini);

        // Succes
        } elseif ($_POST['action'] === 'updateFiniSucces' && isset($_POST['name_jeu_success'])) {
            $name_jeu_success = $_POST['name_jeu_success'];
            $fini_success = isset($_POST['fini_success']) ? 1 : 0;

            $modif->updateFiniSucces($name_jeu_success, $fini_success);

        // Image
        } elseif ($_POST['action'] === 'updateImage' && isset($_POST['name_jeu_image'])) {
            $name_jeu_image = $_POST['name_jeu_image'];
            $image_url = $_POST['image_url'];

            $modif->updateImage($name_jeu_image, $image_url);
        
        // Launcher
        }  elseif ($_POST['action'] === 'updateLauncher' && isset($_POST['name_jeu_launcher'])) {
            $name_jeu_launcher = $_POST['name_jeu_launcher'];
            $nom_launcher =$_POST['nom_launcher'];

            $modif->updateLauncher($name_jeu_launcher, $nom_launcher);

        // Note
        } elseif ($_POST['action'] === 'updateNote' && isset($_POST['name_jeu_note'])){
            $name_jeu_note = $_POST['name_jeu_note'];
            $note = $_POST['note'];

            $modif->updateNote($name_jeu_note, $note);

        // Plateforme
        } elseif ($_POST['action'] === 'updatePlateforme' && isset($_POST['name_jeu_plateforme'])){
            $name_jeu_plateforme = $_POST['name_jeu_plateforme'];
            $plateforme = $_POST['plateforme'];

            $modif->updatePlateforme($name_jeu_plateforme, $plateforme);

        // Style
        } elseif ($_POST['action'] === 'updateStyle' && isset($_POST['name_jeu_style'])){
            $name_jeu_style = $_POST['name_jeu_style'];
            $style = $_POST['style'];

            $modif->updateStyle($name_jeu_style, $style);

        // Supprimer
        } elseif ($_POST['action'] === 'updateSupprimer' && isset($_POST['id_jeu'])){
            $id_jeu = $_POST['id_jeu'];

            $modif->updateSupprimer($id_jeu);
        }
    }
}
?>