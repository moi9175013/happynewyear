<?php
// Créer un fichier de log pour déboguer
$logFile = 'debug_log.txt';

// Fonction pour écrire dans le log
function writeLog($message) {
    global $logFile;
    $handle = fopen($logFile, 'a');
    fwrite($handle, $message . "\n");
    fclose($handle);
}

// Écrire dans le log à chaque exécution du script
writeLog("Requête reçue à " . date('Y-m-d H:i:s'));

if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    writeLog("Données de localisation reçues : Latitude = $latitude, Longitude = $longitude");

    $file = 'localisation.txt';

    if (!$handle = fopen($file, 'a')) {
        writeLog("Erreur : Impossible d'ouvrir le fichier localisation.txt.");
        echo json_encode(['status' => 'error', 'message' => 'Impossible d\'ouvrir le fichier localisation.txt.']);
        exit;
    }

    $data = "Latitude: $latitude, Longitude: $longitude\n";

    if (fwrite($handle, $data) === FALSE) {
        writeLog("Erreur : Impossible d'écrire dans le fichier localisation.txt.");
        echo json_encode(['status' => 'error', 'message' => 'Impossible d\'écrire dans le fichier localisation.txt.']);
        exit;
    }

    fclose($handle);
    writeLog("Position enregistrée avec succès.");
    echo json_encode(['status' => 'success', 'message' => 'Position enregistrée dans le fichier localisation.txt.']);
} else {
    writeLog("Erreur : Données de géolocalisation non valides.");
    echo json_encode(['status' => 'error', 'message' => 'Les données de géolocalisation ne sont pas valides.']);
}
?>
