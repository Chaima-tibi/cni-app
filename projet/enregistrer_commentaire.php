<?php
 // Connexion à la base de données
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "inscription";
// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des données du formulaire
$commentaire = $_POST['commentaire'];
$email = $_POST['email'];
$reponse = $_POST['reponse'];

// Requête SQL pour insérer le commentaire dans la base de données
$sql = "INSERT INTO commentaires (email, commentaire, likes, dislikes, reponse)
VALUES ('$email', '$commentaire', 0, 0, '$reponse')";

if ($conn->query($sql) === TRUE) {
    echo "Commentaire ajouté avec succès";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermeture de la connexion
$conn->close();
?>