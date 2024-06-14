<?php
$hote = 'localhost';
$utilisateur = 'root';
$motdepasse = '';
$base_de_donnees = 'chat_app'; // Remplacez par le nom de votre base de données

$con = mysqli_connect($hote, $utilisateur, $motdepasse, $base_de_donnees);

if (mysqli_connect_errno()) {
    die("Échec de la connexion à MySQL : " . mysqli_connect_error());
}
