<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajout de Jeu Vidéo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/modif.css">
</head>
<body>

<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">

  <a 
  href="#" class="navbar-brand mb-0 h1">
  Navbar
  </a>

  <a 
  href="modif.php" class="navbar-brand mb-0 h1">
  modif
  </a>

  <a 
  href="ajout.php" class="navbar-brand mb-0 h1">
  ajout
  </a>

</nav>



    <!-- Changer le nom d'un jeu -->
    <form class="container" action="../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateName">

        <h3>Changer nom</h3>
    
        <label for="nom_jeu">Nom du jeu</label><br>
        <input type="text" id="nom_jeu" name="nom_jeu"><br>
    
        <label for="nouveau_nom">Nouveau nom</label> <!-- Modifiez l'attribut "for" pour correspondre à l'id -->
        <input type="text" name="nouveau_nom_jeu" id="nouveau_nom" required> <!-- Modifiez le "name" pour correspondre au script PHP -->
    
        <input type="submit" value="Changer">
    </form>

    <!-- Fini jeu -->
    <form class="container" action="../../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateFini">

        <h3>Finir</h3>
        
        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_fini" name="name_jeu_fini" required>

        <label for="fini">Fini</label>
        <input type="checkbox" name="fini" id="fini">

        <input type="submit" value="Modifier">
    </form>
    

    <!-- Fini avec succes -->
    <form class="container" action="../../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateFiniSucces">

        <h3>Finir avec succès</h3>

        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_success" name="name_jeu_success" required>

        <label for="finiSucces">Fini avec succès</label>
        <input type="checkbox" name="fini_success" id="fini_success">

        <input type="submit" value="Modifier">
    </form>

    <!-- Changer une image -->
    <form class="container" action="../../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateImage">

        <h3>Changer image</h3>

        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_image" name="name_jeu_image" required>

        <label for="image">Nouvelle image</label>
        <input type="text" name="image_url" id="image_url" required>

        <input type="submit" value="Modifier">
    </form>

    <!-- Launcher -->
    <form class="container" action="../../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateLauncher">

        <h3>Changer le launcher</h3>

        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_launcher" name="name_jeu_launcher" required>

        <label for="image">Nouveau Launcher :</label>
        <select name="nom_launcher" id="nom_launcher" required>
            <option value="Steam">Steam</option>
            <option value="Epic">Epic</option>
            <option value="Amazon">Amazon</option>
            <option value="Origin">Origin</option>
            <option value="Uplay">Uplay</option>
            <option value="Gog">Gog</option>
            <option value="Autre">Autre</option>
        </select>

        <input type="submit" value="Modifier">
    </form>

    <!-- Note -->
     <form class="container" action="../../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateNote">

        <h3>Changer la note</h3>

        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_note" name="name_jeu_note" required>

        <label for="note">Nouvelle note :</label>
        <input type="number" name="note" id="note" required>

        <input type="submit" value="Modifier">
    </form>

    <!-- Plateforme -->
    <form class="container" action="../../php/modif.php" method="post">
        <input type="hidden" name="action" value="updatePlateforme">

        <h3>Changer la plateforme</h3>

        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_plateforme" name="name_jeu_plateforme" required>

        <label for="plateforme">Plateforme</label>
        <select name="plateforme" id="plateforme" required>
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

        <input type="submit" value="Modifier la plateforme">
    </form>

    <!-- Style -->
    <form class="container" action="../../php/modif.php" method="post">
    <input type="hidden" name="action" value="updateStyle">

    <h3>Changer le style</h3>

    <label for="name">Nom du jeu :</label>
    <input type="text" id="name_jeu_style" name="name_jeu_style" required>

    <label for="style">Style</label>
    <select name="style" id="style" required>
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

        <input type="submit" value="Modifier le style">
    </form>

    <!-- Supprimer -->
    <form class="container" action="../../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateSupprimer">

        <h3>Supprimer</h3>

        <label for="name">Id :</label>
        <input type="text" id="id_jeu" name="id_jeu" required>

        <input type="submit" value="Supprimer">

    </form>

    <!-- Ajout Dossier -->
    

</body>

</html>