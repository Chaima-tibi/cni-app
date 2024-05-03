<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de Formation</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

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

        textarea {
            height: 100px;
        }

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

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

</head>
<body>
    <h2>Modifier une formation</h2>
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

    // Vérifier si un ID de formation est passé via GET
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
      

        // Récupérer les données de la formation à partir de la base de données
        $sql = "SELECT * FROM administrateur WHERE ID_f = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Afficher les données dans les champs du formulaire
            echo '<form id="modificationForm" method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '<input type="hidden" name="id" value="' . $row['ID_f'] . '">';
            echo '<label for="nom">Nom de la formation:</label>';
            echo '<input type="text" id="nom" name="nom" value="' . $row['nomf'] . '">';
            echo '<label for="nom_formateur">Nom du formateur:</label>';
            echo '<input type="text" id="nom_formateur" name="nom_formateur" value="' . $row['nom_formateur'] . '">';
            echo '<label for="description">Description:</label>';
            echo '<textarea id="description" name="description">' . $row['description'] . '</textarea>';
            echo '<label for="prix">Prix:</label>';
            echo '<input type="text" id="prix" name="prix" value="' . $row['prix'] . '">';
            echo '<label for="du">Date de début:</label>';
            echo '<input type="date" id="du" name="du" value="' . $row['du'] . '">';
            echo '<label for="au">Date de fin:</label>';
            echo '<input type="date" id="au" name="au" value="' . $row['au'] . '">';
            echo '<label for="image">Image:</label>            ';
            echo '<input type="file" id="image" name="image" accept="image/*">            ';
            echo '<label for="plan">Plan:</label>';
            echo '<textarea id="plan" name="plan">' . $row['plan'] . '</textarea>'; // Champ plan avec CKEditor
            echo '<input type="submit" value="Modifier">';
            echo '</form>';
        } else {
            echo "Aucune formation trouvée avec cet identifiant.";
        }
    } else {
        echo "Identifiant de formation non spécifié.";
    }

    // Traitement du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assurez-vous que les données nécessaires sont présentes dans $_POST
        if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['nom_formateur']) && isset($_POST['description']) && isset($_POST['prix']) && isset($_POST['du']) && isset($_POST['au']) && isset($_POST['image']) && isset($_POST['plan'])) {
           // Récupérer les données envoyées par le formulaire
              // Récupérer les données envoyées par le formulaire
$id = $_POST['id'];
$nom = $_POST['nom'];
$nom_formateur = $_POST['nom_formateur'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$du = $_POST['du'];
$au = $_POST['au'];
$image = $_POST['image']; // Récupérer le nom du fichier de l'image
$plan = $_POST['plan']; // Récupération du champ plan



            // Préparer la requête SQL pour mettre à jour les données de la formation
            $sql = "UPDATE administrateur SET nomf=?, nom_formateur=?, description=?, prix=?, du=?, au=?, image=?, plan=? WHERE ID_f=?";

            // Préparer la déclaration
            $stmt = $conn->prepare($sql);

            // Lier les paramètres et exécuter la déclaration
            $stmt->bind_param("ssssssssi", $nom, $nom_formateur, $description, $prix, $du, $au, $image, $plan, $id);

            $stmt->execute();

            // Vérifier si la mise à jour a réussi
            if ($stmt->affected_rows > 0) {
                echo "<script>alert('Les données de la formation ont été mises à jour avec succès.');</script>";
            } else {
                echo "<script>alert('Erreur lors de la mise à jour des données de la formation: " . $conn->error . "');</script>";
            }

            // Fermer la déclaration
            $stmt->close();
        } else {
            echo "<script>alert('Toutes les données nécessaires n'ont pas été fournies.');</script>";
        }
    }

    $conn->close();
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
