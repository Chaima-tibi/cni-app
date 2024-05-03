<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "inscription";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    if (isset($_POST['id']) && isset($_POST['col']) && isset($_POST['value'])) {
        // Modification d'enregistrement
        $id = $_POST['id'];
        $col = $_POST['col'];
        $value = $_POST['value'];

        $sqlUpdate = "UPDATE administrateur SET $col = ? WHERE nomf = ?";
        $stmtUpdate = $connexion->prepare($sqlUpdate);
        $stmtUpdate->bind_param('ss', $value, $id);

        if ($stmtUpdate->execute()) {
            echo "Mise à jour réussie.";
        } else {
            echo "Erreur lors de la mise à jour : " . $stmtUpdate->error;
        }

        $stmtUpdate->close();
    } else {
        // Ajout d'enregistrement
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            // Process image upload
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;

            // ... (votre code d'upload)

            if ($uploadOk == 1) {
                // Si tout est OK, essayez de télécharger le fichier
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    $nom = $_POST["nom"];
                    $description = $_POST["description"];
                    $prix = $_POST["prix"];
                    $du = $_POST["du"];
                    $au = $_POST["au"];
                    $image = $targetFile;

                    $sql = "INSERT INTO administrateur (nomf, description, prix, du, au, image) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $connexion->prepare($sql);
                    $stmt->bind_param("ssssss", $nom, $description, $prix, $du, $au, $image);

                    if ($stmt->execute()) {
                        echo "Enregistrement ajouté avec succès.";
                    } else {
                        echo "Erreur lors de l'ajout de l'enregistrement: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
            } else {
                echo "Désolé, votre fichier n'a pas été téléchargé.";
            }
        } else {
            echo "Erreur de téléchargement d'image.";
        }
    }

    $connexion->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des formations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

<h2>Liste des formations</h2>

<table border='1'>
    <?php
    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    $sql = "SELECT nomf, description, prix, du, au, image FROM administrateur";
    $resultat = $connexion->query($sql);

    if ($resultat->num_rows > 0) {
        echo "<tr>
                <th>Nom de la formation</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Image</th>
              </tr>";
        while ($ligne = $resultat->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $ligne['nomf'] . "</td>";
            echo "<td class='editable' data-nomf='" . $ligne['nomf'] . "' data-col='description'>" . $ligne['description'] . "</td>";
            echo "<td class='editable' data-nomf='" . $ligne['nomf'] . "' data-col='prix'>" . $ligne['prix'] . "</td>";
            echo "<td class='editable' data-nomf='" . $ligne['nomf'] . "' data-col='du'>" . $ligne['du'] . "</td>";
            echo "<td class='editable' data-nomf='" . $ligne['nomf'] . "' data-col='au'>" . $ligne['au'] . "</td>";
            echo "<td><img src='" . $ligne['image'] . "' alt='Image'></td>";
            echo "</tr>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    $connexion->close();
    ?>
</table>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une formation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
            margin: 20px auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="date"],
        textarea,
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: skyblue;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: black;
        }
    </style>
</head>
<body>

<h2>Ajouter une formation</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
    Nom: <input type="text" name="nom"><br>
    Description: <textarea name="description"></textarea><br>
    Prix: <input type="text" name="prix"><br>
    Date début: <input type="date" name="du"><br>
    Date fin: <input type="date" name="au"><br>
    Image: <input type="file" name="image"><br>
    <input type="submit" value="Ajouter">
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editableCells = document.querySelectorAll('.editable');

        editableCells.forEach(function (cell) {
            cell.addEventListener('click', function () {
                if (!this.classList.contains('editing')) {
                    var oldValue = this.innerText;

                    this.classList.add('editing');

                    var input = document.createElement('textarea');

                    if (cell.getAttribute('data-col') === 'du' || cell.getAttribute('data-col') === 'au') {
                        input.type = 'date';
                        input.value = oldValue;
                    } else {
                        input.value = oldValue;
                    }

                    this.innerHTML = '';
                    this.appendChild(input);

                    input.focus();

                    input.addEventListener('change', function () {
                        var newValue = this.value;

                        cell.classList.remove('editing');
                        cell.innerHTML = newValue;

                        var id = cell.getAttribute('data-nomf');
                        var col = cell.getAttribute('data-col');

                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                console.log(xhr.responseText);
                            }
                        };

                        xhr.send('id=' + id + '&col=' + col + '&value=' + newValue);
                    });

                    input.addEventListener('keyup', function (event) {
                        if (event.key === 'Enter') {
                            var newValue = this.value;

                            cell.classList.remove('editing');
                            cell.innerHTML = newValue;

                            var id = cell.getAttribute('data-nomf');
                            var col = cell.getAttribute('data-col');

                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    console.log(xhr.responseText);
                                }
                            };

                            xhr.send('id=' + id + '&col=' + col + '&value=' + newValue);
                        } else if (event.key === 'Escape') {
                            cell.classList.remove('editing');
                            cell.innerHTML = oldValue;
                        }
                    });
                }
            });
        });
    });
</script>

</body>
</html>


<p></p>
<p></p>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Les coordonnées des clients</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }

        th {
            background-color: #3498db;
            color: white;
            font-size: 18px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
        }

        button {
            padding: 8px 12px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: black;
        }
    </style>
</head>
<body>
<h2>Les coordonnées des clients</h2>

<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "inscription";

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Validation des modifications si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valider'])) {
    $noms = $_POST['nom'];
    $ages = $_POST['age'];
    $emails = $_POST['email'];
    $genres = $_POST['genre'];
    $teles = $_POST['tele'];
    $profs = $_POST['prof'];
    $choixs = $_POST['choix'];
    $cins = $_POST['cin']; // Utilisation de cin comme identifiant

    // Parcourir chaque ligne pour mettre à jour les données
    for ($i = 0; $i < count($cins); $i++) {
        $cin = $cins[$i]; // Utilisation de cin comme identifiant
        $nom = $noms[$i];
        $age = $ages[$i];
        $email = $emails[$i];
        $genre = $genres[$i];
        $tele = $teles[$i];
        $prof = $profs[$i];
        $choix = $choixs[$i];

        // Exécuter la requête de mise à jour pour chaque ligne
        $query_update = "UPDATE client SET nom='$nom', age='$age', email='$email', genre='$genre', tele='$tele', prof='$prof', choix='$choix' WHERE cin='$cin'";
        mysqli_query($connexion, $query_update);
    }
}

// Suppression d'une entrée si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer'])) {
    $cin = $_POST['cin']; // Utilisation de cin comme identifiant

    if (is_array($cin)) {
        foreach ($cin as $id) {
            $query_delete = "DELETE FROM client WHERE cin='$id'";
            mysqli_query($connexion, $query_delete);
        }
    } else {
        $query_delete = "DELETE FROM client WHERE cin='$cin'";
        mysqli_query($connexion, $query_delete);
    }
}

// Récupérer les données de la table client
$query_client = "SELECT * FROM client";
$result_client = mysqli_query($connexion, $query_client);

// Affichage des données dans un formulaire pour la modification
echo "<form method='post' action=''>";
echo "<table>";
echo "<tr><th>Nom</th><th>Age</th><th>Email</th><th>Genre</th><th>Téléphone</th><th>Profession</th><th>Choix</th><th>CIN</th><th>Supprimer</th></tr>";
while ($row = mysqli_fetch_assoc($result_client)) {
    echo "<tr>";
    echo "<td><input type='text' name='nom[]' value='{$row['nom']}'></td>";
    echo "<td><input type='text' name='age[]' value='{$row['age']}'></td>";
    echo "<td><input type='text' name='email[]' value='{$row['email']}'></td>";
    echo "<td><input type='text' name='genre[]' value='{$row['genre']}'></td>";
    echo "<td><input type='text' name='tele[]' value='{$row['tele']}'></td>";
    echo "<td><input type='text' name='prof[]' value='{$row['prof']}'></td>";
    echo "<td><input type='text' name='choix[]' value='{$row['choix']}'></td>";
    echo "<td>{$row['cin']}</td>";
    echo "<td><button type='submit' name='supprimer' value='{$row['cin']}'>Supprimer</button></td>";
    echo "<input type='hidden' name='cin[]' value='{$row['cin']}'>"; // Ajout du champ caché pour l'identifiant
    echo "</tr>";
}
echo "</table>";

echo "</form>";

// Fermer la connexion
mysqli_close($connexion);
?>

</body>
</html>

