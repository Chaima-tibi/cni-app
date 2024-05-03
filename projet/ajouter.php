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
    margin-top: 20px;
}

/* Style du formulaire */
form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
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
    <h2>Ajouter une nouvelle formation</h2>
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
        <label for="image">image:</label>
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
