<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier un jeu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
        }

        .page-container {
            max-width: 900px;
            margin: 40px auto;
        }

        .modif-card {
            background-color: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .modif-card h3 {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control,
        .form-select {
            margin-bottom: 15px;
        }

        .checkbox-container {
            background-color: #f5f5f5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .danger-card {
            border-left: 5px solid #dc3545;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="../accueil.php" class="navbar-brand fw-bold">Ma bibliothèque</a>
        <div>
            <a href="modif.php" class="btn btn-light">Modifier</a>
            <a href="ajout.php" class="btn btn-outline-light">Ajouter</a>
        </div>
    </div>
</nav>

<!-- CONTENU -->
<div class="container page-container">
    <h1 class="text-center mb-5">Modifier un jeu</h1>

    <!-- CHANGER LE NOM -->
    <div class="modif-card">
        <h3>Changer le nom</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updateName">

            <label for="nom_jeu" class="form-label">Nom actuel</label>
            <input type="text" id="nom_jeu" name="nom_jeu" class="form-control" placeholder="Nom actuel du jeu" required>

            <label for="nouveau_nom" class="form-label">Nouveau nom</label>
            <input type="text" name="nouveau_nom_jeu" id="nouveau_nom" class="form-control" placeholder="Nouveau nom" required>

            <button type="submit" class="btn btn-primary">Modifier le nom</button>
        </form>
    </div>

    <!-- FINI -->
    <div class="modif-card">
        <h3>Modifier l'état terminé</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updateFini">

            <label for="name_jeu_fini" class="form-label">Nom du jeu</label>
            <input type="text" id="name_jeu_fini" name="name_jeu_fini" class="form-control" required>

            <div class="checkbox-container">
                <input type="checkbox" name="fini" id="fini" class="form-check-input">
                <label for="fini" class="form-check-label">Jeu terminé</label>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <!-- FINI AVEC SUCCÈS -->
    <div class="modif-card">
        <h3>Fini avec succès</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updateFiniSucces">

            <label for="name_jeu_success" class="form-label">Nom du jeu</label>
            <input type="text" id="name_jeu_success" name="name_jeu_success" class="form-control" required>

            <div class="checkbox-container">
                <input type="checkbox" name="fini_success" id="fini_success" class="form-check-input">
                <label for="fini_success" class="form-check-label">Fini avec succès à 100 %</label>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <!-- IMAGE -->
    <div class="modif-card">
        <h3>Changer l'image</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updateImage">

            <label for="name_jeu_image" class="form-label">Nom du jeu</label>
            <input type="text" id="name_jeu_image" name="name_jeu_image" class="form-control" required>

            <label for="image_url" class="form-label">Nouvelle image</label>
            <input type="url" name="image_url" id="image_url" class="form-control" placeholder="https://..." required>

            <button type="submit" class="btn btn-primary">Modifier l'image</button>
        </form>
    </div>

    <!-- LAUNCHER -->
    <div class="modif-card">
        <h3>Changer le launcher</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updateLauncher">

            <label for="name_jeu_launcher" class="form-label">Nom du jeu</label>
            <input type="text" id="name_jeu_launcher" name="name_jeu_launcher" class="form-control" required>

            <label for="nom_launcher" class="form-label">Nouveau launcher</label>
            <select name="nom_launcher" id="nom_launcher" class="form-select" required>
                <option value="Steam">Steam</option>
                <option value="Epic">Epic</option>
                <option value="Amazon">Amazon</option>
                <option value="Origin">Origin</option>
                <option value="Uplay">Uplay</option>
                <option value="Gog">GOG</option>
                <option value="Autre">Autre</option>
            </select>

            <button type="submit" class="btn btn-primary">Modifier le launcher</button>
        </form>
    </div>

    <!-- NOTE -->
    <div class="modif-card">
        <h3>Changer la note</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updateNote">

            <label for="name_jeu_note" class="form-label">Nom du jeu</label>
            <input type="text" id="name_jeu_note" name="name_jeu_note" class="form-control" required>

            <label for="note" class="form-label">Nouvelle note</label>
            <input type="number" name="note" id="note" class="form-control" min="0" max="10" step="0.1" required>

            <button type="submit" class="btn btn-primary">Modifier la note</button>
        </form>
    </div>

    <!-- PLATEFORME -->
    <div class="modif-card">
        <h3>Changer la plateforme</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updatePlateforme">

            <label for="name_jeu_plateforme" class="form-label">Nom du jeu</label>
            <input type="text" id="name_jeu_plateforme" name="name_jeu_plateforme" class="form-control" required>

            <label for="plateforme" class="form-label">Nouvelle plateforme</label>
            <select name="plateforme" id="plateforme" class="form-select" required>
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

            <button type="submit" class="btn btn-primary">Modifier la plateforme</button>
        </form>
    </div>

    <!-- STYLE -->
    <div class="modif-card">
        <h3>Changer le style</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updateStyle">

            <label for="name_jeu_style" class="form-label">Nom du jeu</label>
            <input type="text" id="name_jeu_style" name="name_jeu_style" class="form-control" required>

            <label for="style" class="form-label">Nouveau style</label>
            <select name="style" id="style" class="form-select" required>
                <option value="Action_Aventure">Action/Aventure</option>
                <option value="Automatisation">Automatisation</option>
                <option value="Bac_a_sable">Bac à sable</option>
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
                <option value="Egnime">Énigme</option>
                <option value="Rythme">Rythme</option>
                <option value="Point & Click">Point & Click</option>
                <option value="Hack'n'Slash">Hack'n'Slash</option>
                <option value="Arcade">Arcade</option>
                <option value="Récit">Récit</option>
                <option value="Gestion">Gestion</option>
                <option value="Autre">Autre</option>
            </select>

            <button type="submit" class="btn btn-primary">Modifier le style</button>
        </form>
    </div>

    <!-- SUPPRIMER -->
    <div class="modif-card danger-card">
        <h3 class="text-danger">Supprimer un jeu</h3>
        <form action="../../php/modif.php" method="post">
            <input type="hidden" name="action" value="updateSupprimer">

            <label for="id_jeu" class="form-label">ID du jeu</label>
            <input type="text" id="id_jeu" name="id_jeu" class="form-control" required>

            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>