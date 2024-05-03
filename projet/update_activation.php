<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "inscription";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ID_f"]) && isset($_POST["etat"])) {
    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    $id = $_POST["ID_f"];
    $etat = $_POST["etat"];

    // Mettre à jour l'état d'activation de la formation dans la base de données
    $sql = "UPDATE administrateur SET active = ? WHERE ID_f = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ss", $etat, $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $connexion->close();
} else {
    echo "Méthode non autorisée ou paramètres manquants.";
}
?>
