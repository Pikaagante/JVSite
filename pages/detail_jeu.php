<?php
require_once ('../php/get.php');
require_once ('../php/Config/Config.php');
require_once ('../php/BDD/Database.php');

$config = new Config();
$database = new Database($config->getServername(), $config->getUsername(), $config->getPassword(), $config->getDBName());
$get = new Get($database);

if (isset($_GET['gameName'])) {
  $gameName = htmlspecialchars($_GET['gameName']);
  $games = $get->GetJeu($gameName);

  $steamDetails = $get->GetSteamGameDetails($gameName);
} else {
  $steamDetails = [];
}

// Extracting Steam information
$metacritic_score = isset($steamDetails['metacritic']['score']) ? $steamDetails['metacritic']['score'] : 'N/A';
$recommendations = isset($steamDetails['recommendations']['total']) ? $steamDetails['recommendations']['total'] : 'N/A';
$release_date = isset($steamDetails['release_date']['date']) ? $steamDetails['release_date']['date'] : 'N/A';
$developer = isset($steamDetails['developers'][0]) ? $steamDetails['developers'][0] : 'N/A';
$publisher = isset($steamDetails['publishers'][0]) ? $steamDetails['publishers'][0] : 'N/A';
$price = isset($steamDetails['price_overview']['final_formatted']) ? $steamDetails['price_overview']['final_formatted'] : 'N/A';
$is_free = isset($steamDetails['is_free']) && $steamDetails['is_free'] ? 'Yes' : 'No';
$steam_appid = isset($steamDetails['steam_appid']) ? $steamDetails['steam_appid'] : 'N/A';
$categories = isset($steamDetails['categories']) ? array_map(function ($cat) {
  return $cat['description'];
}, $steamDetails['categories']) : ['N/A'];
$genres = isset($steamDetails['genres']) ? array_map(function ($gen) {
  return $gen['description'];
}, $steamDetails['genres']) : ['N/A'];
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
    <div class="row">
      <div class="col-md-8">
        <h1 class="display-4"><?php echo htmlspecialchars($games['nom_jeu']); ?></h1>
        <p><strong>Note:</strong> <?php echo htmlspecialchars($games['note']); ?></p>
        <p><strong>Plateforme:</strong> <?php echo htmlspecialchars($games['plateforme']); ?></p>
        <p><strong>Launcher:</strong> <?php echo htmlspecialchars($games['launcher']); ?></p>
        <p><strong>Style:</strong> <?php echo htmlspecialchars($games['style']); ?></p>
        <p><strong>VR:</strong> <?php echo $games['VR'] ? 'Yes' : 'No'; ?></p>
        <p><strong>Fini:</strong> <?php echo $games['fini'] ? 'Yes' : 'No'; ?></p>
        <p><strong>Description :</strong> <?php echo htmlspecialchars($games['description']); ?></p>
        <!-- Steam Information -->
        <h2>Steam</h2>
        <p><strong>Metacritic Score :</strong> <?php echo $metacritic_score; ?></p>
        <p><strong>Recommendations :</strong> <?php echo $recommendations; ?></p>
        <p><strong>Release Date :</strong> <?php echo $release_date; ?></p>
        <p><strong>Developer :</strong> <?php echo $developer; ?></p>
        <p><strong>Publisher :</strong> <?php echo $publisher; ?></p>
        <p><strong>Price :</strong> <?php echo $price; ?></p>
        <p><strong>Is Free :</strong> <?php echo $is_free; ?></p>
        <p><strong>Steam AppID :</strong> <?php echo $steam_appid; ?></p>
        <p><strong>Categories :</strong> <?php echo implode(', ', $categories); ?></p>
        <p><strong>Genres :</strong> <?php echo implode(', ', $genres); ?></p>


        <p><strong>Description
            :</strong><?php echo htmlspecialchars(strip_tags($steamDetails['additionalDetails']['description'] ?? 'Description not available')); ?>
        </p>


      </div>
      <div class="col-md-4">
        <h3>Images</h3>
        <img src="<?php echo htmlspecialchars($steamDetails['additionalDetails']['images']['header_image'] ?? ''); ?>"
          alt="Header Image" class="img-fluid">
          <?php if ($steam_appid !== 'N/A'): ?>
          <a href="steam://rungameid/<?php echo $steam_appid; ?>" class="btn btn-dark w-100">Lancer le jeu</a>
        <?php endif; ?>
        <?php if (!empty($steamDetails['additionalDetails']['images']['screenshots'])): ?>
          <?php foreach ($steamDetails['additionalDetails']['images']['screenshots'] as $screenshot): ?>
            <img src="<?php echo htmlspecialchars($screenshot); ?>" alt="Game Screenshot" class="img-fluid">
          <?php endforeach; ?>
        <?php else: ?>
          <p>No screenshots available.</p>
        <?php endif; ?>
        <img src="<?php echo htmlspecialchars($games['image_url']); ?>" alt="Game Image"
          class="img-fluid rounded-start">
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>