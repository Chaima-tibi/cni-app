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

// Requête SQL pour récupérer l'état des formations
$sql = "SELECT nomf, etat FROM administrateur";
$resultat = $connexion->query($sql);

// Tableau pour stocker les données de l'état des formations
$formationState = array();

if ($resultat->num_rows > 0) {
    while ($ligne = $resultat->fetch_assoc()) {
        $formation = array(
            'nomf' => $ligne['nomf'],
            'etat' => $ligne['etat']
        );
        $formationState[] = $formation;
    }
}

// Fermeture de la connexion à la base de données
$connexion->close();

// Conversion du tableau en format JSON et envoi au script JavaScript
header('Content-Type: application/json');
echo json_encode($formationState);
?>
