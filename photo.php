<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Recuperer les donnees envoyees en POST
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Sauvegarder les donnees dans un fichier (par exemple)
$file = 'localisations.txt';
$current = file_get_contents($file);
$current .= "Latitude: $latitude, Longitude: $longitude\n";
file_put_contents($file, $current);

// Optionnel : reponse et retourner au client

?>
