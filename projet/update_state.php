<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "inscription";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

// Vérifiez si les données nécessaires ont été envoyées via la méthode POST
if (isset($_POST['nomf']) && isset($_POST['etat'])) {
    $nomf = $_POST['nomf'];
    $nouvelEtat = $_POST['etat'];

    // Mettre à jour l'état dans la base de données
    $sqlUpdate = "UPDATE administrateur SET etat = ? WHERE nomf = ?";
    $stmtUpdate = $connexion->prepare($sqlUpdate);
    $stmtUpdate->bind_param('ss', $nouvelEtat, $nomf);

    if ($stmtUpdate->execute()) {
        // Réussite de la mise à jour
        echo "L'état de la formation a été mis à jour avec succès.";
    } else {
        // Échec de la mise à jour
        echo "Erreur lors de la mise à jour de l'état de la formation: " . $stmtUpdate->error;
    }

    $stmtUpdate->close();
} else {
    // Les données requises n'ont pas été envoyées
    echo "Erreur: Données manquantes.";
}

// Fermer la connexion à la base de données
$connexion->close();
?>
