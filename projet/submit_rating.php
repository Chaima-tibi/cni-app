<?php
// Connexion à la base de données
 // Connexion à la base de données
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération de la note
if(isset($_POST['rating'])) {
    // Supposons que l'utilisateur soit déjà authentifié, vous pouvez récupérer le nom d'utilisateur de la session ou d'autres méthodes d'authentification
    $nom_utilisateur = "utilisateur_test"; // Remplacez par la méthode de récupération du nom d'utilisateur

    $note = $_POST['rating'];

    // Préparation de la requête SQL
    $sql = "INSERT INTO avis (nom_utilisateur, note) VALUES ('$nom_utilisateur', $note)";

    // Exécution de la requête
    if ($conn->query($sql) === TRUE) {
        echo "Evaluation enregistrée avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement de l'évaluation: " . $conn->error;
    }
} else {
    // Gestion du cas où aucune note n'est sélectionnée
    echo "Veuillez sélectionner une note.";
}

// Fermeture de la connexion
$conn->close();
?>
