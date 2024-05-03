<?php
// Connexion à la base de données et récupération des données sur les formations et le nombre de participants
// Remplacez les détails de connexion à la base de données par les vôtres
$servername = "localhost";
$username = "votre_nom_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Requête pour récupérer le nom de la formation et le nombre de participants pour chaque formation
$sql = "SELECT formation_nom AS nom, COUNT(*) AS participants FROM participants_table GROUP BY formation_nom";
$result = $conn->query($sql);

$formationsData = array();

if ($result->num_rows > 0) {
    // Ajouter les données dans un tableau associatif
    while($row = $result->fetch_assoc()) {
        $formationsData[] = $row;
    }
} else {
    echo "Aucune formation trouvée.";
}

// Fermer la connexion
$conn->close();

// Retourner les données au format JSON
echo json_encode($formationsData);
?>
