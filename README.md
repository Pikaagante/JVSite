# Projet de bibliothèque

## Présentation

C'est un ancien projet réalisé en 1ère année d'étude pour apprendre et pratiquer le PHP, le SQL et la manipulation d'une base de données MySQL.
Le projet permet de gérer une bibliothèque personnelle de jeux vidéo en ajoutant des jeux, en modifiant leurs informations, en les supprimant, en effectuant des recherches et en filtrant la bibliothèque selon différents critères.
Le projet utilise également l'API publique de Steam afin de récupérer automatiquement certaines informations supplémentaires sur les jeux.

## Technologies utilisées

- PHP
- MySQL
- HTML / CSS
- Bootstrap 5
- API Steam
- WAMP / Apache
- Git

## Fonctionnalités

### Accueil

La page principale permet de consulter l'ensemble des jeux présents dans la base de données.

Pour chaque jeu, on retrouve notamment :

- Son nom
- Sa note
- Son image
- Un accès à sa page de détails

### Recherche et filtres

La bibliothèque possède plusieurs filtres :

- Recherche par nom
- Jeux VR ou non
- Jeux terminés ou non
- Style de jeu
- Launcher
- Plateforme
- Note

Un bouton permet également de sélectionner un jeu aléatoire.

### Page de détails

Chaque jeu possède une page dédiée permettant d'afficher les informations enregistrées dans la base de données.

Des informations supplémentaires peuvent être récupérées depuis Steam :

- Note Metacritic
- Nombre de recommandations
- Date de sortie
- Développeur
- Éditeur
- Prix
- Gratuit ou payant
- Catégories
- Genres
- Description
- Image principale
- Screenshots

Lorsqu'un AppID Steam est trouvé, un bouton permet également de lancer le jeu avec le protocole `steam://`.

### Ajout de jeux

Une page permet d'ajouter un nouveau jeu dans la bibliothèque.

Les informations disponibles sont notamment :

- Nom
- Note
- Image
- Plateforme
- Launcher
- Style
- Description
- Jeu terminé
- Jeu non terminé
- Jeu sans fin
- Succès terminé
- VR

### Modification

Une page permet de modifier différentes informations d'un jeu existant :

- Nom
- Statut terminé
- Succès terminé
- Image
- Launcher
- Note
- Plateforme
- Style

Il est également possible de supprimer un jeu.

### Analyse

La page d'analyse permet d'obtenir différentes statistiques sur la bibliothèque.

Les statistiques sont réparties selon :

- Plateformes
- Launchers
- Styles
- Dossiers
- Jeux VR

Les dossiers permettent notamment de compter les jeux associés à différentes catégories de la bibliothèque.
