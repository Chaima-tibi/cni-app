<?php
// Vérifier si l'ID de la demande est défini
if (isset($_POST['id_demande'])) {
    $id_demande = $_POST['id_demande'];
    
    // Récupérer l'action à effectuer (accepter ou rejeter)
    if(isset($_POST['accepter'])) {
        $action = 'accepter';
    } elseif(isset($_POST['rejeter'])) {
        $action = 'rejeter';
    }

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

    // Mettre à jour le statut de la demande dans la base de données
    if ($action == 'accepter') {
        $sql_update_demande = "UPDATE client SET status = 'acceptee' WHERE id = $id_demande";
    } elseif ($action == 'rejeter') {
        $sql_update_demande = "UPDATE client SET status = 'rejetee' WHERE id = $id_demande";
    }

    // Exécuter la requête de mise à jour
    if ($conn->query($sql_update_demande) === TRUE) {
        echo "Mise à jour effectuée avec succès";
    } else {
        echo "Erreur lors de la mise à jour: " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}

// Redirection vers la page d'administration
header("Location: adminstrateur.php");
exit();
?>
