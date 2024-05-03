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

// Vérifier si l'identifiant du plan est passé dans l'URL
if (isset($_GET['id'])) {
    // Échapper les données de l'identifiant pour éviter les injections SQL
    $id = $conn->real_escape_string($_GET['id']);

    // Requête pour récupérer les détails du plan en fonction de l'identifiant
    $sql = "SELECT plan FROM administrateur WHERE id_administrateur = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Afficher les détails du plan dans un formulaire
        ?>
        <h2><span style="color: red;">Détails du plan de cette formation :</span></h2>
        <form method="post">
            <?php echo $row['plan']; ?>
        </form>
        <?php

        // Si le formulaire est soumis, mettre à jour les données du plan dans la base de données
        if (isset($_POST['submit'])) {
            $newPlan = $conn->real_escape_string($_POST['plan']);
            $updateSql = "UPDATE administrateur SET plan = '$newPlan' WHERE id_administrateur = '$id'";
            if ($conn->query($updateSql) === TRUE) {
                echo "Détails du plan mis à jour avec succès.";
            } else {
                echo "Erreur lors de la mise à jour des détails du plan : " . $conn->error;
            }
        }
    } else {
        echo "Plan non trouvé.";
    }
} else {
    echo "Identifiant du plan non fourni.";
}

$conn->close();
?>
