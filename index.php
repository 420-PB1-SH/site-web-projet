<?php

include_once('./baseDonnees.php');

$requete = $bd->prepare('SELECT * FROM stats ORDER BY nom ASC');
$requete->execute();
$victoires = $requete->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des combats</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
</head>
<body>
    <h1>Statistiques des combats</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Nombre de victoires</th>
                <th>Nombre de défaites</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($victoires as $victoire) {
            ?>
                <tr>
                    <td><?= $victoire['nom'] ?></td>
                    <td><?= $victoire['nombre_victoires'] ?></td>
                    <td><?= $victoire['nombre_defaites'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>