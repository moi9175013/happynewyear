<?php
if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    
    $file = 'localisation.txt';

    // Essayer d'ouvrir le fichier en mode append
    if (!$handle = fopen($file, 'a')) {
        echo json_encode(['status' => 'error', 'message' => 'Impossible d\'ouvrir le fichier localisation.txt.']);
        exit;
    }

    // Préparer les données à écrire
    $data = "Latitude: $latitude, Longitude: $longitude\n";

    // Essayer d'écrire dans le fichier
    if (fwrite($handle, $data) === FALSE) {
        echo json_encode(['status' => 'error', 'message' => 'Impossible d\'écrire dans le fichier localisation.txt.']);
        exit;
    }

    fclose($handle);
    echo json_encode(['status' => 'success', 'message' => 'Position enregistrée dans le fichier localisation.txt.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Les données de géolocalisation ne sont pas valides.']);
}
?>
