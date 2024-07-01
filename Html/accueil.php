<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajout de Jeu Vidéo</title>
    <link rel="stylesheet" href="../css/modif.css">
</head>
<body>

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
    <form class="container" action="../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateFini">

        <h3>Finir</h3>
        
        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_fini" name="name_jeu_fini" required>

        <label for="fini">Fini</label>
        <input type="checkbox" name="fini" id="fini">

        <input type="submit" value="Modifier">
    </form>
    

    <!-- Fini avec succes -->
    <form class="container" action="../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateFiniSucces">

        <h3>Finir avec succès</h3>

        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_success" name="name_jeu_success" required>

        <label for="finiSucces">Fini avec succès</label>
        <input type="checkbox" name="fini_success" id="fini_success">

        <input type="submit" value="Modifier">
    </form>

    <!-- Changer une image -->
    <form class="container" action="../php/modif.php" method="post">
        <input type="hidden" name="action" value="updateImage">

        <h3>Changer image</h3>

        <label for="name">Nom du jeu :</label>
        <input type="text" id="name_jeu_image" name="name_jeu_image" required>

        <label for="image">Nouvelle image</label>
        <input type="text" name="image_url" id="image_url" required>

        <input type="submit" value="Modifier">
    </form>

    <!-- Launcher -->
    <form class="container" action="../php/modif.php" method="post">
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


</body>

</html>