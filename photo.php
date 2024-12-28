<?php
// Récupérer les données envoyées en POST
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Sauvegarder les données dans un fichier (par exemple)
$file = 'localisations.txt';
$current = file_get_contents($file);
$current .= "Latitude: $latitude, Longitude: $longitude\n";
file_put_contents($file, $current);

// Optionnel : réponse à retourner au client
echo "Position enregistrée : Latitude = $latitude, Longitude = $longitude";
?>
