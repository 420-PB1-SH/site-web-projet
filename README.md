# Page Web et API pour le projet

Ce dépôt contient l'application Web dont vous avez besoin pour implémenter la fonctionnalité *F09 Compilation des résultats des combats à l'aide d'une API Web* du projet.

## Prérequis

Un serveur de développement incluant Apache, PHP, MySQL et phpMyAdmin (par exemple avec XAMPP).

## Mise en place

* Créer une base de données au nom de votre choix (ex: "combats")
* Exécuter le code contenu dans `combats.sql` sur votre base de données
* Adapter le contenu du fichier `baseDonnees.php` selon la configuration de votre base de données
* Copier les fichiers PHP vers un sous-dossier de votre choix de votre répertoire *htdocs*

Accédez à la page *index.php* à l'aide d'un navigateur Web. Si
le déploiement a fonctionné, vous devriez voir une page avec
un titre "Statistiques de combats" suivi d'un tableau vide.

## Page Web

La page *index.php* affiche un tableau indiquant le nombre de
victoires et le nombre de défaites de chaque personnage.

## API

Pour envoyer des nouvelles données à l'API, il faut faire 
une requête **POST** à *api.php*. Le corps de la requête
doit contenir un champ `nom_gagnant` et un champ `nom_perdant`.
Les données doivent être transmises au format `application/x-www-form-urlencoded`.

## Utilisation

Vous devez utiliser le code fourni tel quel. Vous ne devez PAS
modifier les fichiers PHP (à part *baseDonnees.php*).
