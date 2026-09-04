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

// Récupération du jeu
if (isset($_GET['gameName'])) {
  $gameName = htmlspecialchars($_GET['gameName']);
  $games = $get->GetJeu($gameName);
  $steamDetails = $get->GetSteamGameDetails($gameName);
} else {
  $games = [];
  $steamDetails = [];
}

// Informations Steam
$metacritic_score = isset($steamDetails['metacritic']['score']) ? $steamDetails['metacritic']['score'] : 'N/A';
$recommendations = isset($steamDetails['recommendations']['total']) ? $steamDetails['recommendations']['total'] : 'N/A';
$release_date = isset($steamDetails['release_date']['date']) ? $steamDetails['release_date']['date'] : 'N/A';
$developer = isset($steamDetails['developers'][0]) ? $steamDetails['developers'][0] : 'N/A';
$publisher = isset($steamDetails['publishers'][0]) ? $steamDetails['publishers'][0] : 'N/A';
$price = isset($steamDetails['price_overview']['final_formatted']) ? $steamDetails['price_overview']['final_formatted'] : 'N/A';
$is_free = isset($steamDetails['is_free']) && $steamDetails['is_free'] ? 'Oui' : 'Non';
$steam_appid = isset($steamDetails['steam_appid']) ? $steamDetails['steam_appid'] : 'N/A';

// Catégories et genres Steam
$categories = isset($steamDetails['categories'])
  ? array_map(function ($cat) {
    return $cat['description'];
  }, $steamDetails['categories'])
  : ['N/A'];

$genres = isset($steamDetails['genres'])
  ? array_map(function ($gen) {
    return $gen['description'];
  }, $steamDetails['genres'])
  : ['N/A'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($games['nom_jeu']) ? htmlspecialchars($games['nom_jeu']) : 'Détails du jeu'; ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .screenshots {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
      margin-top: 20px;
    }

    .screenshot {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      transition: transform 0.2s ease;
    }

    .screenshot:hover {
      transform: scale(1.03);
    }

    .steam-header {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 15px;
      display: block;
    }

    .steam-launch {
      margin-bottom: 25px;
    }

    .launch-button {
      display: block;
      width: 100%;
      padding: 12px;
      text-align: center;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.2s;
    }

    .launch-button:hover {
      transform: translateY(-2px);
    }

    .database-image {
      width: 100%;
      margin-top: 15px;
      border-radius: 10px;
      display: block;
    }

    .info-list {
      list-style: none;
      padding: 0;
    }

    .info-list li {
      margin-bottom: 10px;
    }

    .steam-description {
      line-height: 1.6;
    }

    @media (max-width: 768px) {
      .screenshots {
        grid-template-columns: 1fr;
      }

      .screenshot {
        height: auto;
      }
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <a href="accueil.php" class="navbar-brand mb-0 h1">Ma bibliothèque</a>
    <a href="updateSql/ajout.php" class="navbar-brand mb-0 h1">Modification</a>
    <a href="analyse.php" class="navbar-brand mb-0 h1">Analyse</a>
  </nav>

  <div class="container my-5">

    <!-- TITRE -->
    <div class="text-center mb-5">
      <h1>
        <?php
        if (isset($games['nom_jeu'])) {
          echo htmlspecialchars($games['nom_jeu']);
        } else {
          echo 'Jeu introuvable';
        }
        ?>
      </h1>
    </div>

    <!-- CONTENU PRINCIPAL -->
    <div class="row g-5">

      <!-- INFORMATIONS -->
      <div class="col-md-8">
        <h2 class="mb-4">Informations</h2>

        <?php if (!empty($games)): ?>
          <ul class="info-list">
            <li>
              <strong>Note :</strong>
              <?php echo isset($games['note']) ? htmlspecialchars($games['note']) : 'N/A'; ?>
            </li>
            <li>
              <strong>Plateforme :</strong>
              <?php echo isset($games['plateforme']) ? htmlspecialchars($games['plateforme']) : 'N/A'; ?>
            </li>
            <li>
              <strong>Launcher :</strong>
              <?php echo isset($games['launcher']) ? htmlspecialchars($games['launcher']) : 'N/A'; ?>
            </li>
            <li>
              <strong>Style :</strong>
              <?php echo isset($games['style']) ? htmlspecialchars($games['style']) : 'N/A'; ?>
            </li>
            <li>
              <strong>VR :</strong>
              <?php echo isset($games['VR']) ? htmlspecialchars($games['VR']) : 'N/A'; ?>
            </li>
            <li>
              <strong>Terminé :</strong>
              <?php echo isset($games['fini']) ? htmlspecialchars($games['fini']) : 'N/A'; ?>
            </li>
          </ul>

          <?php if (!empty($games['description'])): ?>
            <div class="mt-4">
              <h3>Description</h3>
              <p>
                <?php echo nl2br(htmlspecialchars($games['description'])); ?>
              </p>
            </div>
          <?php endif; ?>
        <?php endif; ?>

        <!-- INFORMATIONS STEAM -->
        <?php if (!empty($steamDetails)): ?>
          <hr class="my-5">

          <h2 class="mb-4">Informations Steam</h2>

          <ul class="info-list">
            <li>
              <strong>Date de sortie :</strong>
              <?php echo htmlspecialchars($release_date); ?>
            </li>
            <li>
              <strong>Développeur :</strong>
              <?php echo htmlspecialchars($developer); ?>
            </li>
            <li>
              <strong>Éditeur :</strong>
              <?php echo htmlspecialchars($publisher); ?>
            </li>
            <li>
              <strong>Prix :</strong>
              <?php echo htmlspecialchars($price); ?>
            </li>
            <li>
              <strong>Jeu gratuit :</strong>
              <?php echo htmlspecialchars($is_free); ?>
            </li>
            <li>
              <strong>Score Metacritic :</strong>
              <?php echo htmlspecialchars($metacritic_score); ?>
            </li>
            <li>
              <strong>Recommandations :</strong>
              <?php echo htmlspecialchars($recommendations); ?>
            </li>
            <li>
              <strong>Steam AppID :</strong>
              <?php echo htmlspecialchars($steam_appid); ?>
            </li>
          </ul>

          <!-- GENRES -->
          <div class="mt-4">
            <h4>Genres</h4>
            <p><?php echo htmlspecialchars(implode(', ', $genres)); ?></p>
          </div>

          <!-- CATÉGORIES -->
          <div class="mt-4">
            <h4>Catégories</h4>
            <p><?php echo htmlspecialchars(implode(', ', $categories)); ?></p>
          </div>

          <!-- DESCRIPTION STEAM -->
          <?php if (!empty($steamDetails['additionalDetails']['description'])): ?>
            <div class="mt-4">
              <h3>Description Steam</h3>
              <div class="steam-description">
                <?php echo $steamDetails['additionalDetails']['description']; ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>

      <!-- IMAGES -->
      <div class="col-md-4">
        <h3 class="mb-3">Images</h3>

        <?php if (!empty($steamDetails['additionalDetails']['images']['header_image'])): ?>
          <img
            src="<?php echo htmlspecialchars($steamDetails['additionalDetails']['images']['header_image']); ?>"
            alt="Header Image"
            class="steam-header"
          >
        <?php endif; ?>

        <!-- BOUTON LANCER LE JEU -->
        <?php if ($steam_appid !== 'N/A'): ?>
          <div class="steam-launch">
            <a
              href="steam://rungameid/<?php echo htmlspecialchars($steam_appid); ?>"
              class="btn btn-dark launch-button"
            >
              Lancer le jeu
            </a>
          </div>
        <?php endif; ?>

        <!-- SCREENSHOTS -->
        <h4 class="mt-3">Screenshots</h4>

        <?php if (!empty($steamDetails['additionalDetails']['images']['screenshots'])): ?>
          <div class="screenshots">
            <?php foreach ($steamDetails['additionalDetails']['images']['screenshots'] as $screenshot): ?>
              <img
                src="<?php echo htmlspecialchars($screenshot); ?>"
                alt="Screenshot du jeu"
                class="screenshot"
              >
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <p class="text-muted">Aucune screenshot disponible.</p>
        <?php endif; ?>

        <!-- IMAGE DE LA BDD -->
        <?php if (!empty($games['image_url'])): ?>
          <h4 class="mt-5">Image du jeu</h4>
          <img
            src="<?php echo htmlspecialchars($games['image_url']); ?>"
            alt="<?php echo htmlspecialchars($games['nom_jeu']); ?>"
            class="database-image"
          >
        <?php endif; ?>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>