<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajout de Jeu Vidéo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/modif.css">
</head>

<body>
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <a href="../accueil.php" class="navbar-brand mb-0 h1">
            Navbar
        </a>

        <a href="modif.php" class="navbar-brand mb-0 h1">
            modif
        </a>

        <a href="ajout.php" class="navbar-brand mb-0 h1">
            ajout
        </a>
    </nav>

    <form class="container" action="../../php/modif.php" method="post">
        <input type="hidden" name="action" value="addGame">

        <h3>Ajouter un jeu</h3>

        <label for="name_add">Nom du jeu :</label>
        <input type="text" id="name_add" name="name_add" required>

        <label for="note_add">Note</label>
        <input type="number" name="note_add" id="note_add" min="0" max="10">

        <label for="fini_add">Fini</label>
        <input type="checkbox" name="fini_add" id="fini_add">

        <label for="finiN_add">Non fini</label>
        <input type="checkbox" name="finiN_add" id="finiN_add">

        <label for="finP_add">Fini mais pas de fin</label>
        <input type="checkbox" name="finP_add" id="finP_add">

        <label for="success_add">Fini 100% succès</label>
        <input type="checkbox" name="success_add" id="success_add">

        <label for="VR_add">Si c'est VR</label>
        <input type="checkbox" name="VR_add" id="VR_add">

        <label for="image_add">Lien image</label>
        <input type="text" name="image_add" id="image_add">

        <label for="plateforme_add">Plateforme</label>
        <select name="plateforme_add" id="plateforme_add" required>
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

        <label for="launcher_add">Launcher</label>
        <select name="launcher_add" id="launcher_add" required>
            <option value="Epic">Epic</option>
            <option value="Steam">Steam</option>
            <option value="Amazon">Amazon</option>
            <option value="Origin">Origin</option>
            <option value="Uplay">Uplay</option>
            <option value="Gog">Gog</option>
            <option value="Battle.net">Battle.net</option>
            <option value="Autre">Autre</option>
        </select>

        <label for="style_add">Style</label>
        <select name="style_add" id="style_add" required>
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

        <label for="description_add">Description</label>
        <textarea name="description_add" id="description_add"></textarea>

        <input type="submit" value="Ajouter">
    </form>
</body>

</html>