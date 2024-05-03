<?php
// Vérifie si l'ID à supprimer a été fourni
if(isset($_POST['id'])) {
    // Connexion à la base de données (veuillez remplacer les valeurs par vos propres paramètres de connexion)
   // Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    // Échapper les données d'entrée pour éviter les attaques par injection SQL
    $id = $connexion->real_escape_string($_POST['id']);

    // Requête SQL pour supprimer la ligne avec l'ID spécifié
    $sql = "DELETE FROM administrateur WHERE ID_f = '$id'";

    // Exécute la requête SQL
    if ($connexion->query($sql) === TRUE) {
        // Envoie une réponse indiquant que la suppression a réussi
        echo "La ligne avec l'ID $id a été supprimée avec succès.";
    } else {
        // Envoie une réponse indiquant que la suppression a échoué avec le message d'erreur de la base de données
        echo "Erreur lors de la suppression de la ligne: " . $connexion->error;
    }

    // Ferme la connexion à la base de données
    $connexion->close();
} else {
    // Si aucun ID n'est fourni, envoie un message d'erreur
    echo "Aucun ID de ligne à supprimer n'a été fourni.";
}
?>
