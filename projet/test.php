<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des clients inscrits</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.2);
          
        }

      
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.1);
            transition: 0.3s;
            border-radius: 10px;
        }

        .close {
            color: red;
            float: right;
            font-size: 40px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }
        h1{
 
    font-size: 40px; /* Taille de la police */
    font-weight: bold; /* Poids de la police */
    color: black; /* Couleur du texte */
    margin-top: 20px; /* Marge supérieure */
    margin-bottom: 10px; /* Marge inférieure */
}

        
    </style>
</head>
<body>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php
        // Assurez-vous que le nom de la formation est passé en tant que paramètre GET
        if(isset($_GET['formation'])) {
            // Récupérer le nom de la formation depuis le paramètre GET
            $nomFormation = $_GET['formation'];

            // Remplacez les valeurs suivantes par vos propres informations de connexion à la base de données
            $serveur = "localhost";
            $utilisateur = "root";
            $motdepasse = "";
            $basededonnees = "inscription";

            // Connexion à la base de données
            $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

            // Vérifier la connexion
            if ($connexion->connect_error) {
                die("Connexion échouée: " . $connexion->connect_error);
            }

            // Requête SQL pour récupérer les informations des clients inscrits à cette formation
            $sql = "SELECT nom, cin FROM client WHERE choix = ?";
            $stmt = $connexion->prepare($sql);
            $stmt->bind_param("s", $nomFormation);
            $stmt->execute();
            $resultat = $stmt->get_result();

            // Afficher les résultats
            if ($resultat->num_rows > 0) {
                echo "<h1>Clients inscrits à la formation : $nomFormation</h1>";
                echo "<table>";
                echo "<tr><th>Nom</th><th>CIN</th></tr>";
                while ($ligne = $resultat->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $ligne['nom'] . "</td>";
                    echo "<td>" . $ligne['cin'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<h2>Aucun client inscrit à cette formation.</h>";
            }

            // Fermer la connexion
            $stmt->close();
            $connexion->close();
        } else {
            echo "";
        }
        ?>
    </div>
</div>

<script>
// Afficher le modal lorsque la page est chargée
window.onload = function() {
    document.getElementById('myModal').style.display = 'block';
};

// Fermer le modal et revenir à la page formation.php lorsque l'utilisateur clique sur la croix
document.getElementsByClassName('close')[0].onclick = function() {
    document.getElementById('myModal').style.display = 'none';
    window.location.href = 'formation.php';
};
</script>

</body>
</html>
