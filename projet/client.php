<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Intégration de SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
          
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ecf0f1; /* gris */
            border-radius: 5px;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0);
            width: 90%; /* Plus grand */
            max-width: 800px; /* Maximum */
            margin: 20px auto 0; /* Centrer horizontalement et déplacer vers le bas */
            overflow: hidden;
            padding: 10px; /* Espace intérieur pour tout le formulaire */
        }

        .form-header {
            background-color: skyblue;
            padding: 1px;
            text-align: center;
            border-radius: 50px 50px 50px 50px;
            margin-bottom: 8px;
        }

        .form {
            padding: 15px 10px; /* Espace intérieur plus grand */
        }

        .form-control {
            margin-bottom: 2px; /* Espace entre les contrôles de formulaire */
            position: relative;
        }

        .form-control label {
            display: block;
            margin-bottom: 10px;
        }

        .form-control input,
        .form-control select {
            border: 2px solid #e3dee3;
            border-radius: 4px;
            display: block;
            width: 100%; /* Ajusté */
            padding: 10px;
            font-size: 16px; /* Légèrement plus grand */
        }

        .form-control.success input,
        .form-control.success select {
            border-color: #50ed84; /* Vert */
        }

        .form-control.error input,
        .form-control.error select {
            border-color: #eb1b1b; /* Rouge */
        }

        .form-control i {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

        .form-control.error small {
            visibility: visible;
            color: #eb1b1b; /* Rouge */
        }

        .form-control small {
            position: absolute;
            visibility: hidden;
            left: 0;
        }

        .form button {
            background-color: grey; /* Gris */
            border: 2px solid gainsboro; /* Blanc */
            color: #fff;
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 20px;
            border-radius: 4px;
            margin-top: 30px;
        }

        .form button:hover {
            background-color: black; /* Gris clair */
            
        }
        
    </style>
</head>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<a href="template.php">Aller à la page de template</a>
<div class="container">
    <div class="form-header">
        <h2>Inscription</h2>
    </div>
    <form class="form" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-control">
            <label for="cin">CIN</label>
            <input type="text" id="cin" name="cin" placeholder="Entrez votre CIN (8 chiffres)">
            <small></small>
        </div>
        <div class="form-control">
            <label for="fullName">Nom complet</label>
            <input type="text" id="fullName" name="fullName" placeholder="Entrez votre nom complet">
            <small></small>
        </div>
        <div class="form-control">
            <label for="age">Âge</label>
            <input type="number" id="age" name="age" placeholder="Entrez votre âge">
            <small></small>
        </div>
        <div class="form-control">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Entrez votre adresse e-mail">
            <small></small>
        </div>
        <div class="form-control">
            <label for="gender">Votre genre</label>
            <select name="gender" id="gender">
                <option value="default" selected>-- Sélectionnez une option --</option>
                <option value="male">Homme</option>
                <option value="female">Femme</option>
            </select>
            <small></small>
        </div>
        <div class="form-control">
            <label for="phoneNumber">Numéro de téléphone</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Entrez votre numéro de téléphone">
            <small></small>
        </div>
        <div class="form-control">
            <label for="profession">Profession</label>
            <input type="text" id="profession" name="profession" placeholder="Entrez votre profession">
            <small></small>
        </div>
      
<!-- Champ caché pour stocker la formation choisie -->
<?php
if(isset($_GET['nomFormation'])) {
    $nom_formation = $_GET['nomFormation'];
    echo "<input type='hidden' id='formationChoice' name='formationChoice' value='" . htmlspecialchars($nom_formation) . "'>";
    echo "<div class='form-control'>";
    echo "<label>Formation choisie:</label>";
    echo "<input type='text' value='" . htmlspecialchars($nom_formation) . "' disabled>";
    echo "</div>";
}
?>

        <button type="submit">Confirmer</button>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inscription";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $cin = $_POST['cin'];
    $nom = $_POST['fullName'];
    $email = $_POST['email'];
    $prof = mysqli_real_escape_string($conn, $_POST['profession']); // Échapper la valeur de la profession
    $choix = $_POST['formationChoice']; // Utilisation de la valeur de la formation choisie

    // Insérez les données du client dans la table demande_inscription
    $sql_insert_demande = "INSERT INTO client(cin, nom, email, prof, choix) 
                          VALUES ('$cin', '$nom', '$email', '$prof', '$choix')";

    if ($conn->query($sql_insert_demande) === TRUE) {
        // Afficher un message de succès pour le client
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Succès!',
                    text: 'Votre demande d\'inscription a été envoyée avec succès.'
                });
              </script>";
    } else {
        // Afficher un message d'erreur pour le client
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur!',
                    text: 'Une erreur s\'est produite lors de l\'envoi de votre demande d\'inscription.'
                });
              </script>";
    }

    $conn->close();
}
?>


<script>
    const form = document.getElementById('form');

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        checkInput();
    });

    function checkInput() {
        const cin = document.getElementById('cin').value.trim();
        const fullName = document.getElementById('fullName').value.trim();
        const age = document.getElementById('age').value.trim();
        const email = document.getElementById('email').value.trim();
        const phoneNumber = document.getElementById('phoneNumber').value.trim();
        const profession = document.getElementById('profession').value.trim();
        const gender = document.getElementById('gender').value;

        if (cin === "" || fullName === "" || age === "" || email === "" || phoneNumber === "" || profession === "" || gender === "default") {
            showErrorMessage("Tous les champs doivent être remplis.");
            return;
        }

        if (!/^\d{8}$/.test(cin)) {
            showErrorMessage("Le champ CIN doit contenir 8 chiffres.");
            return;
        }

        if (isNaN(age) || age < 18) {
            showErrorMessage("L'âge doit être un nombre valide et au moins 18 ans.");
            return;
        }
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

// Vérifier si la date de début est déjà utilisée pour ce client
$client= $_POST['client']; // Supposons que vous avez le client_id dans votre formulaire
$du = $_POST['du']; // Supposons que vous avez la date de début dans votre formulaire

$sql = "SELECT * FROM administrateur WHERE client= '$administrateur ' AND du = '$du'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Le client est déjà inscrit à une formation qui commence à cette date.";
    // Ajoutez ici le code pour afficher un message d'erreur approprié ou prendre une autre action
} else {
    // Le client n'est pas déjà inscrit à une formation qui commence à cette date
    // Vous pouvez procéder à l'inscription du client à la formation
    // Ajoutez ici le code pour l'inscription du client
}

$conn->close();
?>


        // Ajoutez d'autres vérifications selon vos besoins

        submitForm();
    }

    function showErrorMessage(message) {
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: message
        });
    }

    function submitForm() {
        form.submit();
    }
</script>
</body>
</html>