<?php
require_once ('../php/stat.php');
require_once ('../php/Config/Config.php');
require_once ('../php/BDD/Database.php');

$config = new Config();
$database = new Database($config->getServername(), $config->getUsername(), $config->getPassword(), $config->getDBName());
$stat = new Stat($database);

$nbrJeuxVr = $stat->getVr();

$nbrJeuxPlateformePC = $stat->getNbrJeuxPlateforme('PC');
$nbrJeuxPlateformeSwitch = $stat->getNbrJeuxPlateforme('Switch');
$nbrJeuxPlateformePlay = $stat->getNbrJeuxPlateforme('Play');
$nbrJeuxPlateformeXbox = $stat->getNbrJeuxPlateforme('Xbox');
$nbrJeuxPlateforme3DS = $stat->getNbrJeuxPlateforme('3DS');
$nbrJeuxPlateformeDS = $stat->getNbrJeuxPlateforme('DS');
$nbrJeuxPlateformeGBA = $stat->getNbrJeuxPlateforme('GBA');
$nbrJeuxPlateformeGameboy = $stat->getNbrJeuxPlateforme('Gameboy');
$nbrJeuxPlateformeSNes = $stat->getNbrJeuxPlateforme('SNes');
$nbrJeuxPlateformeNes = $stat->getNbrJeuxPlateforme('Nes');
$nbrJeuxPlateformeWii = $stat->getNbrJeuxPlateforme('Wii');
$nbrJeuxPlateformeWiiu = $stat->getNbrJeuxPlateforme('Wiiu');

$nbrJeuxLauncherSteam = $stat->getNbrJeuxLauncher('Steam');
$nbrJeuxLauncherEpic = $stat->getNbrJeuxLauncher('Epic');
$nbrJeuxLauncherAmazon = $stat->getNbrJeuxLauncher('Amazon');
$nbrJeuxLauncherOrigin = $stat->getNbrJeuxLauncher('Battle.net');
$nbrJeuxLauncherUplay = $stat->getNbrJeuxLauncher('Uplay');

$nbrJeuxStyleAction_Aventure = $stat->getNbrJeuxStyle('Action_Aventure');
$nbrJeuxStyleAutomatisation = $stat->getNbrJeuxStyle('Automatisation');
$nbrJeuxStyleBac_a_sable = $stat->getNbrJeuxStyle('Bac_a_sable');
$nbrJeuxStyleBR = $stat->getNbrJeuxStyle('BR');
$nbrJeuxStyleCombat = $stat->getNbrJeuxStyle('Combat');
$nbrJeuxStyleDie_and_retry = $stat->getNbrJeuxStyle('Die_and_retry');
$nbrJeuxStyleHorreur = $stat->getNbrJeuxStyle('Horreur');
$nbrJeuxStyleIdle = $stat->getNbrJeuxStyle('Idle');
$nbrJeuxStyleLego = $stat->getNbrJeuxStyle('Lego');
$nbrJeuxStyleMetroidvania = $stat->getNbrJeuxStyle('Metroidvania');
$nbrJeuxStyleMMO = $stat->getNbrJeuxStyle('MMO');
$nbrJeuxStylePlateforme = $stat->getNbrJeuxStyle('Plateforme');
$nbrJeuxStyleMulti = $stat->getNbrJeuxStyle('Multi');
$nbrJeuxStylePokemon_Like = $stat->getNbrJeuxStyle('Pokemon_Like');
$nbrJeuxStyleRogue_Like = $stat->getNbrJeuxStyle('Rogue_Like');
$nbrJeuxStyleSimulation = $stat->getNbrJeuxStyle('Simulation');
$nbrJeuxStyleStratégie = $stat->getNbrJeuxStyle('Stratégie');
$nbrJeuxStyleDeck_Building = $stat->getNbrJeuxStyle('Deck_Building');
$nbrJeuxStyleSurvie = $stat->getNbrJeuxStyle('Survie');
$nbrJeuxStyleTir = $stat->getNbrJeuxStyle('Tir');
$nbrJeuxStyleTour = $stat->getNbrJeuxStyle('Tour');
$nbrJeuxStyleVN = $stat->getNbrJeuxStyle('VN');
$nbrJeuxStyleEgnime = $stat->getNbrJeuxStyle('Egnime');
$nbrJeuxStyleRythme = $stat->getNbrJeuxStyle('Rythme');
$nbrJeuxStyleAutre = $stat->getNbrJeuxStyle('Autre');

$nbrJeuxDossier2023 = $stat->getNbrJeuxDossier(1);
$nbrJeuxDossier2024 = $stat->getNbrJeuxDossier(2);
$nbrJeuxDossierFinir = $stat->getNbrJeuxDossier(3);
$nbrJeuxDossierWishlist = $stat->getNbrJeuxDossier(4);
$nbrJeuxDossier20xx = $stat->getNbrJeuxDossier(5);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-img {
      height: 200px;
      width: 100%;
      object-fit: cover;
    }
  </style>
</head>

<body>

  <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <a href="accueil.php" class="navbar-brand mb-0 h1">Ma bibliothèque</a>
    <a href="updateSql/ajout.php" class="navbar-brand mb-0 h1">Modification</a>
    <a href="analyse.php" class="navbar-brand mb-0 h1">Analyse</a>
  </nav>


  <div class="container mt-4">
    <div class="row">
      <!-- Exemple de carte pour une variable -->
      <h3>Nombre de jeux par plateforme</h3>
      <div class="container mt-4">
        <div class="row">
          <div class="col-md-3 mb-4"> <!-- Réduction de la taille des blocs et augmentation de l'espace en bas -->
            <div class="card h-100"> <!-- Utilisation de h-100 pour que toutes les cartes aient la même hauteur -->
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur Switch :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeSwitch; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur Play :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformePlay; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur Xbox :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeXbox; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur 3DS :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateforme3DS; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur DS :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeDS; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur GBA :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeGBA; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur GameBoy :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeGameboy; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur SNes :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeSNes; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur Nes :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeNes; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur Wii :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeWii; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux sur WiiU :</h5>
                <p class="card-text"><?php echo $nbrJeuxPlateformeWiiu; ?></p>
              </div>
            </div>
          </div>

          <h3>Nombre de jeux par Launcher</h3>
          <div class="container mt-4">
            <div class="row">
              <div class="col-md-3 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title">Nombre de jeux sur Steam :</h5>
                    <p class="card-text"><?php echo $nbrJeuxLauncherSteam; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title">Nombre de jeux sur Epic :</h5>
                    <p class="card-text"><?php echo $nbrJeuxLauncherEpic; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title">Nombre de jeux sur Amazon :</h5>
                    <p class="card-text"><?php echo $nbrJeuxLauncherAmazon; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title">Nombre de jeux sur Origin :</h5>
                    <p class="card-text"><?php echo $nbrJeuxLauncherOrigin; ?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-4">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title">Nombre de jeux sur Uplay :</h5>
                    <p class="card-text"><?php echo $nbrJeuxLauncherUplay; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <h3>Nombre de jeux par Style</h3>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Action/Aventure :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleAction_Aventure; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Automatisation :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleAutomatisation; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Bac à sable :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleBac_a_sable; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Battle Royale :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleBR; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Combat :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleCombat; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Die and Retry :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleDie_and_retry; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Horreur :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleHorreur; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Idle :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleIdle; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Lego :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleLego; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Metroidvania :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleMetroidvania; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux MMO :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleMMO; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Plateforme :</h5>
                <p class="card-text"><?php echo $nbrJeuxStylePlateforme; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Pokemon Like :</h5>
                <p class="card-text"><?php echo $nbrJeuxStylePokemon_Like; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Rogue Like :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleRogue_Like; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Simulation :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleSimulation; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Stratégie :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleStratégie; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Deck Building :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleDeck_Building; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Survie :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleSurvie; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Tir :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleTir; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Tour :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleTour; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux VN :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleVN; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Deck Egnime :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleEgnime; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Rythm :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleRythme; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux Deck Autre :</h5>
                <p class="card-text"><?php echo $nbrJeuxStyleAutre; ?></p>
              </div>
            </div>
          </div>

          <h3>Nombre de jeux par dossier</h3>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux dans 2023 :</h5>
                <p class="card-text"><?php echo $nbrJeuxDossier2023; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux dans 2024 :</h5>
                <p class="card-text"><?php echo $nbrJeuxDossier2024; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux dans Finir :</h5>
                <p class="card-text"><?php echo $nbrJeuxDossierFinir; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux dans Wishlist :</h5>
                <p class="card-text"><?php echo $nbrJeuxDossierWishlist; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title">Nombre de jeux dans 20xx :</h5>
                <p class="card-text"><?php echo $nbrJeuxDossier20xx; ?></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    
</body>

</html>