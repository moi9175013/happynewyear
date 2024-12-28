<?php
// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si les données de géolocalisation sont reçues
if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Stocker les données dans localisation.txt
    $file = 'localisation.txt';
    $data = "Latitude: $latitude, Longitude: $longitude\n";

    // Ajouter les données au fichier localisation.txt
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) === false) {
        echo "Erreur : impossible de créer ou de modifier le fichier localisation.txt";
    } else {
        echo "Les données de géolocalisation ont été enregistrées avec succès.";
    }
} else {
    echo "Aucune donnée de géolocalisation reçue.";
}
?>
