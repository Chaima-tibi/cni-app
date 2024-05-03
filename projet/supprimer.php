<?php
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

// Vérifier si l'identifiant est passé dans l'URL
if (isset($_GET['ID_f'])) {
    $ID_f = $_GET['ID_f'];

    // Supprimer la ligne correspondante dans la base de données
    $delete_query = "DELETE FROM administrateur WHERE ID_f = $ID_f";

    if ($conn->query($delete_query) === TRUE) {
        echo "Enregistrement supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'enregistrement: " . $conn->error;
    }
}

// Rediriger vers la page d'origine ou une autre page après la suppression
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();

?>
