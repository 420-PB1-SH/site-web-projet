<?php

include_once('./baseDonnees.php');

function sendResponse($code, $body = null, $exception = null) {
    $statusCodes = array(
        200 => "200 OK",
        400 => "400 Bad Request",
        401 => "401 Unauthorized",
        403 => "403 Forbidden",
        404 => "404 Not found",
        405 => "405 Method Not Allowed",
        500 => "500 Internal Server Error"
    );

    header('HTTP/1.1 '. $statusCodes[$code]);
    header('Content-Type: application/json; charset=utf-8');

    echo $body;

    if ($exception) {
        throw $exception;
    }
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method !== 'POST') {
    sendResponse(500);
    exit();
}

if (!isset($_POST['nom_gagnant'])) {
    sendResponse(400, 'La requête doit contenir le champ de formulaire "nom_gagnant".');
    exit();
}
if (!isset($_POST['nom_perdant'])) {
    sendResponse(400, 'La requête doit contenir le champ de formulaire "nom_perdant".');
    exit();
}

$nomGagnant = trim($_POST['nom_gagnant']);
$nomPerdant = trim($_POST['nom_perdant']);

if (empty($nomGagnant)) {
    sendResponse(400, 'Le champ "nom_gagnant" doit être non vide.');
    exit();
}
if (empty($nomPerdant)) {
    sendResponse(400, 'Le champ "nom_perdant" doit être non vide.');
    exit();
}

$requete = $bd->prepare("INSERT INTO stats (nom, nombre_victoires, nombre_defaites) VALUES (?, 1, 0)
                            ON DUPLICATE KEY UPDATE nom = ?, nombre_victoires = nombre_victoires + 1");
$requete->execute([$nomGagnant, $nomGagnant]);

$requete = $bd->prepare("INSERT INTO stats (nom, nombre_victoires, nombre_defaites) VALUES (?, 0, 1)
                            ON DUPLICATE KEY UPDATE nom = ?, nombre_defaites = nombre_defaites + 1");
$requete->execute([$nomPerdant, $nomPerdant]);

sendResponse(200, 'Combat enregistré avec succès.');
