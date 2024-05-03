<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css" />
</head>
<style>   main {
      height: 100vh; /* La partie main prendra 100% de la hauteur de l'écran */
     width: 100%;
      display: flex; /* Utilise le modèle de boîte flexible pour aligner le contenu */
      flex-direction: column; /* Aligne le contenu en colonne */
    }

    .glass {
      flex-grow: 10; /* La classe glass s'étendra pour remplir l'espace disponible */
      height: 100%;
      width: 100%;
    }

    .dashboard {
      height: 100%; /* La classe dashboard occupera 100% de la hauteur de la partie main */
    }
    .links {
  flex-grow: 3; /* Réduire encore plus le facteur de flex-grow */
  height: 20%; /* Réduire davantage la hauteur */
  width: 100%; /* Conserver ou ajuster la largeur selon vos besoins */
}
.links .link:active,
.links .link:focus {
  background-color: #333; /* couleur de fond gris foncé lorsque le bouton est activé ou sélectionné */
  color: #fff; /* couleur du texte blanc lorsque le bouton est activé ou sélectionné */
}
.links .link.highlighted {
      border: 2px solid #333; /* bordure noire lorsque le bouton est activé ou sélectionné */
    }

</style>
<body>
  <main>
    <section class="glass">
      <div class="dashboard">
        <div>
          <a href="index.php">
            <img src="admin.jpeg" alt="" width="130px"
              style="border-radius: 50%; margin-top: 25px; margin-bottom: 10px;" />
            
         
          </a>
        </div>
        <div class="links">
          <a href="education.php">
            <div class="link">
              <img src="./images/education.png" width="40px" alt="" />
              <h2>Demande d'inscription </h2>
            </div>
          </a>
          <a href="skill.php">
            <div class="link">
              <img src="./images/skills.png" width="40px" alt="" />
              <h2>Les formations</h2>
            </div>
          </a>
          <a href="experience.php">
            <div class="link">
              <img src="./images/experience.png" width="37px" alt="" />
              <h2>ajouter une formation</h2>
            </div>
          </a>
          <a href="projects.php">
            <div class="link">
              <img src="./images/projects.png" width="37px" alt="" />
              <h2>Calendrier</h2>
            </div>
          </a>
        </div>
        <div class="social">
          <a href="https://facebook.com/k.choubari/">
            <img src="./images/facebook.png" alt="" width="20px" />
          </a>
          <a href="https://instagram.com/choubari_/">
            <img src="./images/instagram.png" alt="" width="20px" />
          </a>
          <a href="https://twitter.com/choubari_">
            <img src="./images/twitter.png" alt="" width="20px" />
          </a>
          <a href="https://github.com/choubari/">
            <img src="./images/github.png" alt="" width="20px" />
          </a>
          <a href="https://www.linkedin.com/in/kawtar-choubari-2226b0150/">
            <img src="./images/linkedin.png" alt="" width="20px" />
          </a>
        </div>
      </div>
      <div class="carditems">
        <div class="status">
        <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'administration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
        }
        
/* Style de l'arrière-plan du tableau */
table {
  background-color: #F0F8FF		; /* Utilisation d'une couleur bleu claire semi-transparente */
    margin-top: 20px; /* Ajouter une marge supérieure pour l'écart */
}

/* Style des lignes impaires du tableau pour améliorer la lisibilité */
tr:nth-child(odd) {
    background-color: #E6E6FA			; /* Utilisation d'une couleur de fond semi-transparente pour les lignes impaires */
}

/* Style des cellules du tableau */
th, td {
    padding: 8px;
    text-align: left;
}

/* Style de l'arrière-plan du formulaire */
body {
    background-color: #f4f4f4; /* Couleur de fond du corps de la page */
}

        td.action {
            text-align: center;
        }
        .btn {
            padding: 18px 30px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn.accept {
            background-color: green;
        }
        .btn.reject {
            background-color: red;
        }
        .btn:hover {
            opacity: 0.8;
        }
        
    </style>
</head>
<body>

    <h1>Demandes d'inscription à confirmer</h1>
    <br>
    <br>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>N° Télephone</th>
            <th>Cin</th>

            <th>Choix de formation</th>
            <th>Profession</th>
            <th>Du</th>
            <th>Au</th>
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

        // Récupérer les données nécessaires de la table "client" avec les informations de la table "administrateur"
        $sql_select_demandes = "SELECT c.id, c.nom, c.email, c.choix, c.prof, c.status, c.tele , c.cin , a.du, a.au
                                FROM client c
                                JOIN administrateur a ON c.administrateur_id = a.nomf";

        $result_demandes = $conn->query($sql_select_demandes);

        if ($result_demandes->num_rows > 0) {
            // Afficher les données dans un tableau HTML
            while ($row_demande = $result_demandes->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_demande['nom'] . "</td>";
                echo "<td>" . $row_demande['email'] . "</td>";
                echo "<td>" . $row_demande['tele'] . "</td>";

                echo "<td>" . $row_demande['cin'] . "</td>";
                echo "<td>" . $row_demande['choix'] . "</td>";
                echo "<td>" . $row_demande['prof'] . "</td>";
                echo "<td>" . $row_demande['du'] . "</td>"; // Afficher la colonne "du" de la table "administrateur"
                echo "<td>" . $row_demande['au'] . "</td>"; // Afficher la colonne "au" de la table "administrateur"
                echo "<td>";
                echo "<form method='post' action='traitement_demande.php'>";
                echo "<input type='hidden' name='id_demande' value='" . $row_demande['id'] . "'>"; // Ajouter l'ID de la demande
                echo "<input type='hidden' name='action' value='accepter'>";
                echo "<input type='submit' name='accepter' class='btn accept' value='Accepter'>";
                echo "<input type='hidden' name='id_demande' value='" . $row_demande['id'] . "'>"; // Ajouter l'ID de la demande
                echo "<input type='hidden' name='action' value='rejeter'>";
                echo "<input type='submit' name='rejeter' class='btn reject' value='Rejeter'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Aucune donnée disponible.</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
<script>
    // JavaScript pour changer la couleur des boutons lorsque cliqués
    document.addEventListener("DOMContentLoaded", function() {
        var acceptButtons = document.querySelectorAll(".btn.accept");
        var rejectButtons = document.querySelectorAll(".btn.reject");

        acceptButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                button.classList.remove("reject");
                button.classList.add("accept");
            });
        });

        rejectButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                button.classList.remove("accept");
                button.classList.add("reject");
            });
        });
    });
</script>

 <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1 {
            color: #426696;
            font-weight: 600;
            font-size: 2.5rem;
            opacity: 0.8;
        }

        h2,
        p {
            display: inline;
            vertical-align: middle;
            color: #658ec6;
            font-weight: 500;
            opacity: 0.8;
        }

        h3 {
            color: #426696;
            font-weight: 600;
            font-size: 20px;
            opacity: 0.8;
        }

        a {
            flex: 0;
            outline: 0;
            text-decoration: none;
        }

        html, body {
            font-family: "Poppins", sans-serif;
            min-height: 100vh;
            background: linear-gradient(to right top, #65dfc9, #6cdbeb);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .glassbutton {
            display: flex;
            justify-content: flex-end;
        }

        .glassbutton p {
            color: #1db69a;
            font-weight: 700;
            display: inline-block;
            clear: both;
            float: left;
            background: linear-gradient(
                to left bottom,
                rgba(255, 255, 255, 0.8),
                rgba(255, 255, 255, 0.3)
            );
            border-radius: 1rem;
            padding: 1rem;
        }

        .glass {
      flex-grow: 10; /* La classe glass s'étendra pour remplir l'espace disponible */
      height: 100%;
      width: 100%;
    


            background: linear-gradient(
                to right bottom,
                rgba(255, 255, 255, 0.7),
                rgba(255, 255, 255, 0.3)
            );
            border-radius: 2rem;
            z-index: 2;
            backdrop-filter: blur(2rem);
            display: flex;
        }

        .circle1,
        .circle2 {
            background: white;
            background: linear-gradient(
                to right bottom,
                rgba(255, 255, 255, 0.8),
                rgba(255, 255, 255, 0.3)
            );
            height: 11rem;
            width: 11rem;
            position: absolute;
            border-radius: 50%;
        }

        .circle1 {
            top: 5%;
            right: 5%;
        }

        .circle2 {
            top: 70%;
            left: 7%;
        }

        .dashboard {
          height: 100%; /* La classe dashboard occupera 100% de la hauteur de la partie main */

            flex: 0;
            display: flex;
            flex-direction: column;
            text-align: center;
            background: linear-gradient(
                to right bottom,
                rgba(255, 255, 255, 0.7),
                rgba(255, 255, 255, 0.3)
            );
            border-radius: 2rem;
        }

        .link{
            display: flex;
            margin: 4rem 2rem;
            padding: 1rem 2rem;
            justify-content: flex-start; /* Aligner les éléments à gauche */
        }

        .link h2 {
            padding: 0rem 2rem;
        }

        .social {
            margin-top: auto;
            position: relative;
            padding: 20px;
            font-size: 20px;
            text-align: center;
            text-decoration: none;
        }
        .carditems {
          margin: 7rem 12rem;
            padding: 3rem 2rem;
            flex: 2; /* Ajuster la valeur de flex pour agrandir la classe */
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .card {
            display: flex;
            background: linear-gradient(
                to left top,
                rgba(255, 255, 255, 0.8),
                rgba(255, 255, 255, 0.5)
            );
            border-radius: 1rem;
            margin: 2rem 0rem;
            padding: 1.2rem;
            box-shadow: 6px 6px 20px rgba(122, 122, 122, 0.212);
            justify-content: space-between;
        }

        .card img {
            top: 0;
            bottom: 0;
            margin: auto;
            width: 110px;
        }

        .card-info {
            margin-left: 20px;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .percentage {
            font-weight: bold;
            font-size: 18px;
            background: linear-gradient(to right top, #65dfc9, #6cdbeb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .gradient-par {
            font-weight: bold;
            background: linear-gradient(to right, #216bcc, #1db69a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>