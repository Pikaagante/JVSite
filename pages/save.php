<?php
require_once ('../php/get.php');
require_once ('../php/Config/Config.php');
require_once ('../php/BDD/Database.php');

$config = new Config();
$database = new Database($config->getServername(), $config->getUsername(), $config->getPassword(), $config->getDBName());
$get = new Get($database);
$games = $get->GetJeu('Cult of the Lamb');

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Game Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <a href="accueil.php" class="navbar-brand mb-0 h1">Navbar</a>
  <a href="updateSql/ajout.php" class="navbar-brand mb-0 h1">ajout</a>
</nav>

<div class="container mt-5">
  <h1><?php echo htmlspecialchars($games['nom_jeu']); ?></h1>
  <p><strong>Note:</strong> <?php echo htmlspecialchars($games['note']); ?></p>
  <p><strong>Description:</strong> <?php echo htmlspecialchars($games['description']); ?></p>
  <p><strong>Plateforme:</strong> <?php echo htmlspecialchars($games['plateforme']); ?></p>
  <p><strong>Launcher:</strong> <?php echo htmlspecialchars($games['launcher']); ?></p>
  <p><strong>Style:</strong> <?php echo htmlspecialchars($games['style']); ?></p>
  <p><strong>VR:</strong> <?php echo $games['VR'] ? 'Yes' : 'No'; ?></p>
  <p><strong>Fini:</strong> <?php echo $games['fini'] ? 'Yes' : 'No'; ?></p>
  <!-- Add more fields as needed -->
  <img src="<?php echo htmlspecialchars($games['image_url']); ?>" alt="Game Image" class="img-fluid">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>