<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td.action {
            text-align: center;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn.accept {
            background-color: #4CAF50;
        }
        .btn.reject {
            background-color: #f44336;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Demandes d'inscription en attente</h1>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Profession</th>
            <th>Choix de formation</th>
            <th>Action</th>
        </tr>
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

        // Récupérer les demandes d'inscription en attente
        $sql_select_demandes = "SELECT * FROM client WHERE status = 'en_attente'";
        $result_demandes = $conn->query($sql_select_demandes);

        if ($result_demandes->num_rows > 0) {
            // Afficher les demandes en attente dans un tableau avec des boutons d'acceptation et de rejet
            while ($row_demande = $result_demandes->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_demande['nom'] . "</td>";
                echo "<td>" . $row_demande['email'] . "</td>";
                echo "<td>" . $row_demande['prof'] . "</td>"; // Afficher la profession
                echo "<td>" . $row_demande['choix'] . "</td>"; // Afficher le choix de formation
                echo "<td>";
                echo "<form method='post' action='traitement_demande.php'>";
                echo "<input type='hidden' name='id_demande' value='" . $row_demande['id'] . "'>"; // Ajouter l'ID de la demande
                echo "<input type='hidden' name='action' value='accepter'>";
                echo "<input type='submit' name='accepter' value='Accepter'>";
                echo "<input type='hidden' name='action' value='rejeter'>";
                echo "<input type='submit' name='rejeter' value='Rejeter'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Aucune demande d'inscription en attente.</td></tr>";
        }
        $conn->close();
        ?>
        
    </table>
</body>
</html>
