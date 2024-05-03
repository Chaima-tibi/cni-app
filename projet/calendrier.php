

<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>page d'admini</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css" />
  <style>
    /* CSS pour que la partie main occupe tout l'écran */
    main {
      height: 100vh; /* La partie main prendra 100% de la hauteur de l'écran */
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
  height: 70%; /* Réduire davantage la hauteur */
  width: 100%; /* Conserver ou ajuster la largeur selon vos besoins */
}
.links .link:active,
.links .link:focus {
  background-color: #333; /* couleur de fond gris foncé lorsque le bouton est activé ou sélectionné */
  color: #fff; /* couleur du texte blanc lorsque le bouton est activé ou sélectionné */
}

  </style>
</head>
<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Détermination du mois et de l'année actuels
$mois = isset($_GET['mois']) ? $_GET['mois'] : date('n');
$annee = isset($_GET['annee']) ? $_GET['annee'] : date('Y');

// Calcul du mois précédent
$mois_precedent = $mois - 1;
$annee_precedente = $annee;
if ($mois_precedent < 1) {
    $mois_precedent = 12;
    $annee_precedente--;
}

// Calcul du mois suivant
$mois_suivant = $mois + 1;
$annee_suivante = $annee;
if ($mois_suivant > 12) {
    $mois_suivant = 1;
    $annee_suivante++;
}

// Tableau contenant les noms des mois
$mois_fr = array(
    1 => 'Janvier',
    2 => 'Février',
    3 => 'Mars',
    4 => 'Avril',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juillet',
    8 => 'Août',
    9 => 'Septembre',
    10 => 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
);

echo "<h2>Calendrier des formations - " . $mois_fr[$mois] . " $annee</h2>";

// Déclaration du style CSS pour le calendrier
echo "<style>
/* Style général du calendrier */
.calendar {
    font-family: Arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
}

/* Style de l'en-tête du calendrier */
.calendar th {
    background-color: #3498db;
    color: white;
    font-size: 18px;
    font-weight: bold;
    padding: 10px;
    text-align: center;
}

/* Style des cellules du calendrier */
.calendar td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

/* Style des cellules contenant le numéro du jour */
.calendar .day {
    font-size: 16px;
}

/* Style des flèches de navigation */
.navigation {
    text-align: center;
}

.navigation a {
    text-decoration: none;
    color: #333;
    font-size: 20px;
    margin: 0 10px;
}

/* Style des jours de formation */
.training-day {
    background-color: lightgreen; /* Couleur différente */
}

/* Style des noms de formation */
.formation-name {
    font-size: 16px;
    color: red; /* Couleur différente */
}

/* Style de la boîte modale */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>";

// Affichage de la flèche de navigation pour le mois précédent
echo "<div class='navigation'>";
echo "<a href='?mois=$mois_precedent&annee=$annee_precedente'>&#10094;</a>";

// Affichage du nom du mois en cours
echo $mois_fr[$mois];

// Affichage de la flèche de navigation pour le mois suivant
echo "<a href='?mois=$mois_suivant&annee=$annee_suivante'>&#10095;</a>";
echo "</div>";

// Boucle sur les 12 mois de l'année
$mois_en_cours = date('F', mktime(0, 0, 0, $mois, 1, $annee)); // Nom du mois
echo "<table class='calendar'>";
echo "<tr><th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th></tr>";

// Nombre de jours dans le mois et premier jour de la semaine
$nombre_jours = cal_days_in_month(CAL_GREGORIAN, $mois, $annee);
$premier_jour_semaine = date('N', mktime(0, 0, 0, $mois, 1, $annee));

echo "<tr>";

// Affichage des jours vides avant le premier jour du mois
for ($j = 1; $j < $premier_jour_semaine; $j++) {
    echo "<td></td>";
}

// Boucle pour afficher les jours du mois
for ($j = 1; $j <= $nombre_jours; $j++) {
    $date_en_cours = "$annee-$mois-$j"; // Format de la date YYYY-MM-DD

    // Récupération des formations pour cette date
    $sql = "SELECT  nomf , plan FROM administrateur WHERE '$date_en_cours' BETWEEN du AND au";
    $result = $conn->query($sql);
    
    // Vérifier s'il y a des formations pour cette date
    $is_training_day = $result->num_rows > 0;

    // Affichage de la date
    echo "<td>";
    echo "<span class='day'>$j</span><br>";
    if ($is_training_day) {
        while ($row = $result->fetch_assoc()) {
            // Ajoutez un attribut data-plan pour stocker le plan associé et une classe pour ouvrir la modale
            echo "<a href='#' class='formation-link' data-plan='" . $row['plan'] . "'>" . $row['nomf'] . "</a><br>";
        }
    }
    echo "</td>";

    // Passage à la prochaine ligne chaque fin de semaine (samedi)
    if (($j + $premier_jour_semaine - 1) % 7 == 0) {
        echo "</tr>";
        // Si ce n'est pas la dernière semaine, commencez une nouvelle ligne
        if ($j != $nombre_jours) {
            echo "<tr>";
        }
    }
}

// Compléter la dernière semaine avec des cellules vides si nécessaire
while (($j + $premier_jour_semaine - 1) % 7 != 0) {
    echo "<td></td>";
    $j++;
}

echo "</table>";

$conn->close();
?>

<!-- Ajoutez ce code juste avant la balise de fermeture </body> -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="planContent"></div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Récupérer tous les liens de formation
    var formationLinks = document.querySelectorAll('.formation-link');

    // Ajouter un gestionnaire d'événements de clic à chaque lien
    formationLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Empêcher le lien de suivre son URL
            
            // Récupérer le plan à partir de l'attribut data-plan du lien
            var plan = link.getAttribute('data-plan');

            // Afficher la boîte modale avec le plan correspondant
            var modal = document.getElementById("myModal");
            var planContent = document.getElementById("planContent");
            planContent.innerHTML = "<h2>Plan de formation</h2><p>" + plan + "</p>";
            modal.style.display = "block";
        });
    });

    // Fermer la boîte modale lorsque l'utilisateur clique sur la croix
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    };

    // Fermer la boîte modale lorsque l'utilisateur clique en dehors de celle-ci
    window.onclick = function(event) {
        var modal = document.getElementById("myModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});

    // Sélectionnez tous les liens de la classe .link
    const links = document.querySelectorAll('.links .link');

    // Parcourez chaque lien et ajoutez un écouteur d'événements click
    links.forEach(link => {
      link.addEventListener('click', () => {
        // Supprimez la classe 'highlighted' de tous les liens
        links.forEach(link => {
          link.classList.remove('highlighted');
        });

        // Ajoutez la classe 'highlighted' au lien actuellement cliqué
        link.classList.add('highlighted');
      });
    });
  
</script>
<style>* {
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
main {
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
  font-weight: 600;
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
  background: white;
  margin: 51px;
  width: 75%;
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
  flex: 0;
  display: flex;
  flex-direction: column;
  /*align-items: center;
  justify-content: space-evenly;
  */
  text-align: center;
  background: linear-gradient(
    to right bottom,
    rgba(255, 255, 255, 0.7),
    rgba(255, 255, 255, 0.3)
  );
  border-radius: 2rem;
}
.link {
  display: flex;
  margin: 1rem 0rem;
  padding: 1rem 3rem;
  /*align-items: center;*/
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
  flex: 2;
}

/* CARD Items */
.carditems {
  margin: 5rem;
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
}</style>