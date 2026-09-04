<?php

require_once('../../php/get.php');
require_once('../../php/Config/Config.php');
require_once('../../php/BDD/Database.php');

$config = new Config();

$database = new Database(
    $config->getServername(),
    $config->getUsername(),
    $config->getPassword(),
    $config->getDBName()
);

$get = new Get($database);

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ajouter un jeu</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background-color: #f5f5f5;
        }

        .form-container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }

        .form-container h1 {
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            margin-top: 10px;
        }

        .form-control,
        .form-select {
            margin-bottom: 10px;
        }

        .checkboxes {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin: 15px 0;
        }

        .checkboxes .form-check {
            background: #f5f5f5;
            padding: 10px;
            border-radius: 8px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a href="../accueil.php" class="navbar-brand">
            Ma bibliothèque
        </a>

        <div>

            <a href="modif.php" class="btn btn-outline-light">
                Modifier
            </a>

            <a href="ajout.php" class="btn btn-light">
                Ajouter
            </a>

        </div>

    </div>

</nav>



<!-- FORMULAIRE -->

<div class="container">

    <div class="form-container">

        <h1>
            Ajouter un jeu
        </h1>


        <form action="../../php/modif.php" method="post">

            <input
                type="hidden"
                name="action"
                value="addGame"
            >


            <!-- NOM -->

            <label for="name_add" class="form-label">
                Nom du jeu
            </label>

            <input
                type="text"
                id="name_add"
                name="name_add"
                class="form-control"
                placeholder="Ex : Cult of the Lamb"
                required
            >


            <!-- NOTE -->

            <label for="note_add" class="form-label">
                Note
            </label>

            <input
                type="number"
                name="note_add"
                id="note_add"
                class="form-control"
                min="0"
                max="10"
                step="0.1"
                placeholder="0 à 10"
            >


            <!-- IMAGE -->

            <label for="image_add" class="form-label">
                Lien de l'image
            </label>

            <input
                type="text"
                name="image_add"
                id="image_add"
                class="form-control"
                placeholder="https://..."
            >


            <!-- PLATEFORME -->

            <label for="plateforme_add" class="form-label">
                Plateforme
            </label>

            <select
                name="plateforme_add"
                id="plateforme_add"
                class="form-select"
                required
            >

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


            <!-- LAUNCHER -->

            <label for="launcher_add" class="form-label">
                Launcher
            </label>

            <select
                name="launcher_add"
                id="launcher_add"
                class="form-select"
                required
            >

                <option value="Steam">Steam</option>
                <option value="Epic">Epic</option>
                <option value="Amazon">Amazon</option>
                <option value="Origin">Origin</option>
                <option value="Uplay">Uplay</option>
                <option value="Gog">Gog</option>
                <option value="Battle.net">Battle.net</option>
                <option value="Autre">Autre</option>

            </select>


            <!-- STYLE -->

            <label for="style_add" class="form-label">
                Style
            </label>

            <select
                name="style_add"
                id="style_add"
                class="form-select"
                required
            >

                <option value="Action_Aventure">Action / Aventure</option>
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
                <option value="Multi">Multi / Party games</option>
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


            <!-- DESCRIPTION -->

            <label for="description_add" class="form-label">
                Description
            </label>

            <textarea
                name="description_add"
                id="description_add"
                class="form-control"
                rows="5"
                placeholder="Description du jeu..."
            ></textarea>


            <!-- CHECKBOXES -->

            <label class="form-label">
                Informations
            </label>

            <div class="checkboxes">

                <div class="form-check">

                    <input
                        type="checkbox"
                        name="fini_add"
                        id="fini_add"
                        class="form-check-input"
                    >

                    <label
                        for="fini_add"
                        class="form-check-label"
                    >
                        Fini
                    </label>

                </div>


                <div class="form-check">

                    <input
                        type="checkbox"
                        name="finiN_add"
                        id="finiN_add"
                        class="form-check-input"
                    >

                    <label
                        for="finiN_add"
                        class="form-check-label"
                    >
                        Non fini
                    </label>

                </div>


                <div class="form-check">

                    <input
                        type="checkbox"
                        name="finP_add"
                        id="finP_add"
                        class="form-check-input"
                    >

                    <label
                        for="finP_add"
                        class="form-check-label"
                    >
                        Fini mais pas de fin
                    </label>

                </div>


                <div class="form-check">

                    <input
                        type="checkbox"
                        name="success_add"
                        id="success_add"
                        class="form-check-input"
                    >

                    <label
                        for="success_add"
                        class="form-check-label"
                    >
                        Fini 100% succès
                    </label>

                </div>


                <div class="form-check">

                    <input
                        type="checkbox"
                        name="VR_add"
                        id="VR_add"
                        class="form-check-input"
                    >

                    <label
                        for="VR_add"
                        class="form-check-label"
                    >
                        Jeu VR
                    </label>

                </div>

            </div>


            <!-- BOUTONS -->

            <div class="buttons">

                <a
                    href="../accueil.php"
                    class="btn btn-secondary"
                >
                    Annuler
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Ajouter
                </button>

            </div>


        </form>

    </div>

</div>


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>