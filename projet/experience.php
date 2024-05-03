
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>&#x1F4BB Choubari - Glassmorphism Portfolio</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <main>
  <style>  main {
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
.card{
  flex-grow: 3; /* Réduire encore plus le facteur de flex-grow */
  height: 100%; /* Réduire davantage la hauteur */
  width: 50%; /* Conserver ou ajuster la largeur selon vos besoins */
}
.card-info{
  flex-grow: 3; /* Réduire encore plus le facteur de flex-grow */
  height: 100%; /* Réduire davantage la hauteur */
  width: 50%; /* Conserver ou ajuster la largeur selon vos besoins */
}
</style>
    <section class="glass">
      <div class="dashboard">
        <div>
        <a href="index.php">
            <img src="admin.jpeg" alt="" width="130px"
              style="border-radius: 50%; margin-top: 25px; margin-bottom: 10px;" />
           
        </div>
        <div class="links">
          <a href="education.php">
            <div class="link">
              <img src="./images/education.png" width="40px" alt="" />
              <h2>Demande d'inscription</h2>
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
              <h2>calendrier</h2>
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
        </div>
          
              <div>

              </div>
              <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une nouvelle formation</title>
    
    <style>
/* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Style du corps de la page */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

/* Style de l'en-tête */
h2 {
    color: #333;
    text-align: center;
    margin-top: 10px;
}

/* Style du formulaire */

/* Style du formulaire */
/* Style du formulaire */
form {
    max-width: 12000px; /* Augmenter la largeur maximale */
    margin: 10px auto 100px; /* Marge : 20px en haut, centré horizontalement, 100px en bas */
    padding: 50px;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}



/* Style des étiquettes */
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

/* Style des champs de saisie */
input[type="text"],
input[type="date"],
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Style du champ de saisie de texte multiligne */
textarea {
    height: 100px;
}

/* Style du bouton de soumission */
input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

/* Style du bouton de soumission au survol */
input[type="submit"]:hover {
    background-color: #45a049;
}
    </style>

</head>
<body>
    <form id="ajoutForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nom">Nom de la formation:</label>
        <input type="text" id="nomf" name="nomf">
        <label for="nom_formateur">Nom du formateur:</label>
        <input type="text" id="nom_formateur" name="nom_formateur">
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <label for="prix">Prix:</label>
        <input type="text" id="prix" name="prix">
        <label for="du">Date de début:</label>
        <input type="date" id="du" name="du">
        <label for="au">Date de fin:</label>
        <input type="date" id="au" name="au">
        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
        <label for="plan">Plan:</label>
        <textarea id="plan" name="plan"></textarea>
       
        <input type="submit" value="Ajouter">
    </form>

    <?php
    // Processus d'ajout d'une nouvelle formation
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si toutes les données nécessaires sont présentes dans $_POST
        if (isset($_POST['nomf']) && isset($_POST['nom_formateur']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['du']) && isset($_POST['au']) && isset($_POST['image']) && isset($_POST['plan'])) {
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

            // Récupérer les données envoyées par le formulaire
            $nom = $_POST['nomf'];
            $nom_formateur = $_POST['nom_formateur'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $du = $_POST['du'];
            $au = $_POST['au'];
            $image = $_POST['image'];
            $plan = $_POST['plan'];

            // Préparer la requête SQL pour ajouter une nouvelle formation
            $sql = "INSERT INTO administrateur (nomf, nom_formateur, description, prix, du, au, image, plan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            // Préparer la déclaration
            $stmt = $conn->prepare($sql);

            // Vérifier la préparation de la déclaration
            if ($stmt === false) {
                echo "<script>alert('Erreur de préparation de la requête: " . $conn->error . "');</script>";
            } else {
                // Lier les paramètres et exécuter la déclaration
                $stmt->bind_param("ssssssss", $nom, $nom_formateur, $description, $prix, $du, $au, $image, $plan);
                if ($stmt->execute()) {
                    echo "<script>alert('La nouvelle formation a été ajoutée avec succès.');</script>";
                    // Redirection vers la page initiale après avoir ajouté la nouvelle formation
                    echo "<script>window.location.href = 'skill.php';</script>";
                } else {
                    echo "<script>alert('Erreur lors de l'ajout de la nouvelle formation: " . $conn->error . "');</script>";
                }
                // Fermer la déclaration
                $stmt->close();
            }

            // Fermer la connexion
            $conn->close();
        } else {
            echo "<script>alert('Toutes les données nécessaires n'ont pas été fournies.');</script>";
        }
    }
    ?>


    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            });
        ClassicEditor
            .create( document.querySelector( '#plan' ) )
            .catch( error => {
                console.error( error );
            });
    </script>

</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Metadonnées et styles -->
</head>
<body>
    

    <!-- Scripts -->
    <script>
        function goBack() {
            window.history.back();
            return false; // Pour empêcher la soumission du formulaire
        }
    </script>
</body>
</html>

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <div class="circle1"></div>
  <div class="circle2"></div>
</body>

</html>

<script>
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
          margin: 1rem 21rem;
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