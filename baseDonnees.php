<?php

$hoteBD = 'localhost';
$portBD = 5432;
$nomBD = 'combats';
$utilisateurBD = 'root';
$motDePasseBD = null;

$optionsBD = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$bd = new PDO("mysql:host=$hoteBD;port=$portBD;dbname=$nomBD", $utilisateurBD, $motDePasseBD, $optionsBD);
$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

?>