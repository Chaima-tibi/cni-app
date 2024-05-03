

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333; /* Couleur texte plus foncée */
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="time"],
        select {
            width: calc(100% - 20px); /* Largeur ajustée */
            padding: 10px;
            border: 2px solid blue; 
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px; /* Taille de police réduite */
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: green; 
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px; /* Taille de police augmentée */
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: black; /* Rose plus foncé au survol */
        }

        button:focus {
            outline: none;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        h2{
          
            
          font-weight: bold;
          text-align: center;

      }  
    </style>
</head>
<?php
session_start();

// Vérifie si les données du formulaire ont été envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "inscription";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    // Requête SQL pour vérifier les informations de connexion
    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // L'utilisateur est authentifié avec succès
        $_SESSION['username'] = $username;
        header("Location: formation.php"); // Redirection vers le tableau de bord
    }

    // Informations de connexion incorrectes, afficher une alerte
    echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect.");</script>';

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <style>
        /* Styles CSS */
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Nom et Prénom :</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Se Connecter</button>
        </form>
    </div>

    <!-- Script JavaScript pour jouer un son lorsque les informations de connexion sont incorrectes -->
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username === "" || password === "") {
                return; // Si les champs sont vides, ne rien faire
            }
           
        });
    </script>
</body>
</html>
