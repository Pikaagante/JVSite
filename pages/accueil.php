<?php
require_once('../php/get.php');
require_once('../php/Config/Config.php');
require_once('../php/BDD/Database.php');

$config = new Config();
$database = new Database(
    $config->getServername(),
    $config->getUsername(),
    $config->getPassword(),
    $config->getDBName()
);
$get = new Get($database);

// Récupération des jeux selon la recherche ou le mode aléatoire
if (isset($_GET['random']) && $_GET['random'] == 'true') {
    $games = $get->GetRandom();
} else {
    if (
        isset($_POST['search']) ||
        isset($_POST['vr']) ||
        isset($_POST['fini']) ||
        isset($_POST['style']) ||
        isset($_POST['launcher']) ||
        isset($_POST['plateforme']) ||
        isset($_POST['note']) ||
        isset($_POST['order'])
    ) {
        $games = $get->GetFiltre(
            $_POST['search'] ?? '',
            $_POST['vr'] ?? '',
            $_POST['fini'] ?? '',
            $_POST['style'] ?? '',
            $_POST['launcher'] ?? '',
            $_POST['plateforme'] ?? '',
            $_POST['note'] ?? ''
        );
    } else {
        $games = $get->GetAccueil();
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ma bibliothèque de jeux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .filter-box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }

        .filter-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .search-input,
        .filter-select {
            height: 45px;
            border-radius: 8px;
        }

        .search-input:focus,
        .filter-select:focus {
            border-color: #212529;
            box-shadow: 0 0 0 0.15rem rgba(33, 37, 41, 0.15);
        }

        .filter-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .filter-buttons .btn {
            height: 45px;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-search,
        .btn-random {
            flex: 1;
        }

        @media (max-width: 768px) {
            .filter-box {
                padding: 15px;
            }

            .filter-buttons {
                flex-direction: column;
            }

            .filter-buttons .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container">
        <a href="accueil.php" class="navbar-brand mb-0 h1">Ma bibliothèque</a>
        <div>
            <a href="updateSql/ajout.php" class="navbar-brand mb-0 h1">Modification</a>
            <a href="analyse.php" class="navbar-brand mb-0 h1">Analyse</a>
        </div>
    </div>
</nav>

<!-- RECHERCHE ET FILTRES -->
<div class="container mt-4">
    <div class="filter-box">
        <div class="filter-title">Rechercher et filtrer</div>

        <form action="" method="post">
            <div class="mb-3">
                <input type="text" name="search" class="form-control search-input" placeholder="Rechercher un jeu...">
            </div>

            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <select name="vr" class="form-select filter-select">
                        <option value="">VR</option>
                        <option value="1">VR</option>
                        <option value="0">Non VR</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <select name="fini" class="form-select filter-select">
                        <option value="">État du jeu</option>
                        <option value="1">Fini</option>
                        <option value="0">Non fini</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <select name="style" class="form-select filter-select">
                        <option value="">Style</option>
                        <option value="Action_Aventure">Action/Aventure</option>
                        <option value="Automatisation">Automatisation</option>
                        <option value="Bac_a_sable">Bac a sable</option>
                        <option value="BR">Battle royale</option>
                        <option value="Combat">Combat</option>
                        <option value="Die_and_retry">Die and retry</option>
                        <option value="Horreur">Horreur</option>
                        <option value="Idle">Idle</option>
                        <option value="Lego">Lego</option>
                        <option value="Metroidvania">Metroidvania</option>
                        <option value="MMO">MMO</option>
                        <option value="Plateforme">Plateforme</option>
                        <option value="Multi">Multi/Party games</option>
                        <option value="Pokemon_Like">Pokemon like</option>
                        <option value="Rogue_Like">Rogue like</option>
                        <option value="Simulation">Simulation</option>
                        <option value="Stratégie">Stratégie</option>
                        <option value="Deck_Building">Deck Building</option>
                        <option value="Survie">Survie</option>
                        <option value="Tir">Tir</option>
                        <option value="Tour">Tour par tour</option>
                        <option value="VN">VN</option>
                        <option value="Egnime">Egnime</option>
                        <option value="Rythme">Rythme</option>
                        <option value="Point & Click">Point & Click</option>
                        <option value="Hack'n'Slash">Hack'n'Slash</option>
                        <option value="Arcade">Arcade</option>
                        <option value="Récit">Récit</option>
                        <option value="Gestion">Gestion</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <select name="launcher" class="form-select filter-select">
                        <option value="">Launcher</option>
                        <option value="Steam">Steam</option>
                        <option value="Epic">Epic</option>
                        <option value="Amazon">Amazon</option>
                        <option value="Origin">Origin</option>
                        <option value="Uplay">Uplay</option>
                        <option value="Gog">Gog</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <select name="plateforme" class="form-select filter-select">
                        <option value="">Plateforme</option>
                        <option value="PC">PC</option>
                        <option value="Switch">Switch</option>
                        <option value="Play">Play</option>
                        <option value="Xbox">Xbox</option>
                        <option value="3DS">3DS</option>
                        <option value="DS">DS</option>
                        <option value="GBA">GBA</option>
                        <option value="Gameboy">Gameboy</option>
                        <option value="SNes">SNes</option>
                        <option value="Nes">Nes</option>
                        <option value="Wii">Wii</option>
                        <option value="Wiiu">WiiU</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <select name="note" class="form-select filter-select">
                        <option value="">Note</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>

            <div class="filter-buttons">
                <button type="submit" class="btn btn-dark btn-search">Rechercher</button>
                <a href="accueil.php?random=true" class="btn btn-outline-dark btn-random">Jeu aléatoire</a>
            </div>
        </form>
    </div>
</div>

<!-- LISTE DES JEUX -->
<div class="container mt-5">
    <div class="row">
        <?php foreach ($games as $game): ?>
            <div class="col-md-3 mb-3">
                <div class="card">
                    <a href="detail_jeu.php?gameName=<?= urlencode($game['nom_jeu']) ?>" class="stretched-link"></a>

                    <div class="row g-0">
                        <div class="col-md-12">
                            <img
                                src="<?= htmlspecialchars($game['image_url']) ?>"
                                class="img-fluid rounded-start card-img"
                                alt="<?= htmlspecialchars($game['nom_jeu']) ?>"
                            >
                        </div>

                        <div class="col-md-12">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($game['nom_jeu']) ?></h5>
                                <p class="card-text">Note : <?= htmlspecialchars($game['note']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>