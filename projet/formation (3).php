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

        $allowedColumns = ['description', 'prix', 'du', 'au']; // Add other columns here

        if (in_array($col, $allowedColumns)) {
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
            echo "Modification de colonne non autorisée.";
        }
    } elseif (isset($_POST["id"]) && isset($_POST["delete"])) {
        // Suppression d'enregistrement
        $id = $_POST["id"];

        $sqlDelete = "DELETE FROM administrateur WHERE nomf = ?";
        $stmtDelete = $connexion->prepare($sqlDelete);
        $stmtDelete->bind_param('s', $id);

        if ($stmtDelete->execute()) {
            echo "Suppression réussie.";
        } else {
            echo "Erreur lors de la suppression : " . $stmtDelete->error;
        }

        $stmtDelete->close();
    } else {
        // Ajout d'enregistrement
        if (isset($_POST["nom"]) && isset($_POST["description"]) && isset($_POST["prix"]) && isset($_POST["du"]) && isset($_POST["au"]) && isset($_FILES["image"])) {
            // Process image upload
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;

            // ... (votre code d'upload)

            if ($uploadOk == 1) {
                // Si tout est OK, essayez de télécharger le fichier
                $uploadDir = 'formation';
                $targetFile = $uploadDir . basename($_FILES["image"]["name"]);
                
                // Créer le répertoire "uploads" s'il n'existe pas
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Crée le répertoire récursivement avec les permissions 0777
                }
                
                // Vérifier si le fichier a été téléchargé avec succès
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    echo "Le fichier ". basename($_FILES["image"]["name"]). " a été téléchargé avec succès.";
                } else {
                    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
                                    $nom = $_POST["nom"];
                    $description = $_POST["description"];
                    $prix = $_POST["prix"];
                    $du = $_POST["du"];
                    $au = $_POST["au"];
                    $image = $targetFile;

                    $sql = "INSERT INTO administrateur (nomf, description, prix, du, au, image) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $connexion->prepare($sql);
                    $stmt->bind_param('ssssss', $nom, $description, $prix, $du, $au, $image);

                    if ($stmt->execute()) {
                        echo "Enregistrement ajouté avec succès.";
                    } else {
                        echo "Erreur lors de l'ajout de l'enregistrement: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
            }
       
    }

    $connexion->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.0/classic/ckeditor.js"></script>

    <title>Liste des formations</title>
    <style>
        
        .editable {
            cursor: pointer;
        }

        .editing {
            background-color: #ffffcc;
        }

        textarea {
            min-height: 100px;
            width: 100%;
        }

        /* Style pour le modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
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

        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .editable {
            cursor: pointer;
        }

        .editing {
            background-color: #ffffcc;
        }

        textarea {
            min-height: 100px;
            width: 100%;
        }

        #myModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
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

        /* Add your existing CSS styles here */

        .delete-button {
            cursor: pointer;
            color: red;
            margin-left: 10px;
        }

        .delete-button:hover {
            text-decoration: underline;
        }

body {
    background-color: #f2f2f2;
}

h2 {
    color: #333;
    text-align: center;
}

#showFormButton {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#showFormButton:hover {
    background-color: #45a049;
}

.modal-content form {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.modal-content input,
.modal-content textarea {
    margin-bottom: 10px;
    padding: 8px;
}

.modal-content input[type="file"] {
    margin-bottom: 20px;
}

table {
    margin-top: 20px;
    border: 2px solid #333;
}

table th, table td {
    padding: 12px;
}

table th {
    background-color: #4CAF50;
    color: white;
}

.delete-button {
    cursor: pointer;
    color: red;
    margin-left: 10px;
}

.delete-button:hover {
    text-decoration: underline;
    color: darkred;
}

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: skyblue;
            color: black;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: gray;
        }

        form[action=""] {
            margin-bottom: 20px;
        }

        form[action=""] input[type="submit"] {
            margin-top: 10px;
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        form[action=""] input[type="submit"]:hover {
            background-color: #0056b3;
        }
   

    </style>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Formations</title>
    <!-- Include necessary stylesheets and scripts (e.g., Bootstrap, jQuery) if needed -->
</head>
<body>

<h2> Les formations</h2>

<!-- Ajout du bouton "Ajouter Plan" -->

<!-- Ajout du bouton "Ajouter" -->
<button id="showFormButton">Ajouter</button>

<!-- Modal pour afficher le formulaire -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Ajouter un enregistrement</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
            Nom: <input type="text" name="nom" required><br>
            Description: <textarea name="description" required></textarea><br>
            Prix: <input type="text" name="prix" required><br>
            Date début: <input type="date" name="du" required><br>
            Date fin: <input type="date" name="au" required><br>
            Image: <input type="file" name="image" required><br>
            <input type="submit" value="Ajouter">
        </form>
    </div>
</div>

<script>
// Fonction pour fermer le modal
function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}
</script>


   
<style>
    .blue-background {
        background-color: skyblue;
    }
</style>
<style>
    .toggle-button {
        border: none;
        cursor: pointer;
    }
    .toggle-button.active {
        background-color: green;
        color: white;
    }
    .toggle-button.desactive {
        background-color: red;
        color: white;
    }
</style>

<table border='1'>
    <tr>
        <td class="blue-background">nom de formation</td>
        <td class="blue-background">description</td>
        <td class="blue-background">Prix</td>
        <td class="blue-background">du</td>
        <td class="blue-background">au</td>
        <td class="blue-background">logo de formation</td>
        <td class="blue-background">Ajouter Plan</td>
        <td class="blue-background" >Désactiver/activer</td>

        <td class="blue-background">suppression</td>
    </tr>

    <?php
    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    $sql = "SELECT nomf, description, prix, du, au, image FROM administrateur";
    $resultat = $connexion->query($sql);

    if ($resultat->num_rows > 0) {
        while ($ligne = $resultat->fetch_assoc()) {
            echo "<tr>";
            echo "<td><a href='test.php?formation=" . urlencode($ligne['nomf']) . "'>" . $ligne['nomf'] . "</a></td>";
            echo "<td class='editable' data-nomf='" . $ligne['nomf'] . "' data-col='description'>" . $ligne['description'] . "</td>";
            echo "<td class='editable' data-nomf='" . $ligne['nomf'] . "' data-col='prix'>" . $ligne['prix'] . "</td>";
            echo "<td class='editable' data-nomf='" . $ligne['nomf'] . "' data-col='du'>" . $ligne['du'] . "</td>";
            echo "<td class='editable' data-nomf='" . $ligne['nomf'] . "' data-col='au'>" . $ligne['au'] . "</td>";
            echo "<td><img src='" . $ligne['image'] . "' width='100' alt='Image'></td>";
            echo "<td><button class='ajouter-plan-button' data-nomf='" . $ligne['nomf'] . "'>Voir le plan de " . $ligne['nomf'] . "</button></td>"; // Bouton "Ajouter Plan" avec le texte spécifié
            echo "<td><button class='toggle-button' data-nomf='" . $ligne['nomf'] . "' data-etat='desactive'>Désactiver</button></td>";

            echo "<td><span class='delete-button' data-id='" . $ligne['nomf'] . "'>Supprimer</span></td>";
            
            echo "</tr>";
        }
    } else {
        echo "Aucun résultat trouvé.";
    }

    $connexion->close();
    ?>
</table>

</table>
<?php
// Assurez-vous que le nom de la formation est passé en tant que paramètre GET
if(isset($_GET['formation'])) {
    // Récupérer le nom de la formation depuis le paramètre GET
    $nomFormation = $_GET['formation'];
    
    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    // Requête SQL pour récupérer les informations des clients inscrits à cette formation
    $sql = "SELECT nom, cin FROM inscription.client WHERE formation = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("s", $nomFormation);
    $stmt->execute();
    $resultat = $stmt->get_result();

    // Afficher les résultats
    if ($resultat->num_rows > 0) {
        echo "<h1>Clients inscrits à la formation : $nomFormation</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Nom</th><th>CIN</th></tr>";
        while ($ligne = $resultat->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $ligne['nom'] . "</td>";
            echo "<td>" . $ligne['cin'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun client inscrit à cette formation.";
    }

    // Fermer la connexion
    $stmt->close();
    $connexion->close();
} else {
    echo "";
}

?>











<script>
 
    document.addEventListener('DOMContentLoaded', function () {
        var toggleButtons = document.querySelectorAll('.toggle-button');
        toggleButtons.forEach(function (button) {
            var nomFormation = button.getAttribute('data-nomf');
            var etat = localStorage.getItem(nomFormation) || 'desactive'; // Récupère l'état du localStorage ou défaut 'desactive'
            
            if (etat === 'active') {
                button.textContent = 'Activer';
                button.classList.add('active');
            } else {
                button.textContent = 'Désactiver';
                button.classList.add('desactive');
            }

            button.addEventListener('click', function () {
                if (etat === 'active') {
                    etat = 'desactive';
                    button.textContent = 'Désactiver';
                    button.classList.remove('active');
                    button.classList.add('desactive');
                } else {
                    etat = 'active';
                    button.textContent = 'Activer';
                    button.classList.remove('desactive');
                    button.classList.add('active');
                }
                localStorage.setItem(nomFormation, etat); // Enregistre l'état dans le stockage local
            });
        });
    });


      document.addEventListener('DOMContentLoaded', function () {
        var toggleButtons = document.querySelectorAll('.toggle-button');
        toggleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var etat = this.getAttribute('data-etat');
                if (etat === 'active') {
                    this.setAttribute('data-etat', 'desactive');
                    this.textContent = 'Désactiver';
                    this.classList.remove('active');
                    this.classList.add('desactive');
                } else {
                    this.setAttribute('data-etat', 'active');
                    this.textContent = 'Activer';
                    this.classList.remove('desactive');
                    this.classList.add('active');
                }
            });
        });
    });
    
    
    document.addEventListener('DOMContentLoaded', function () {
        var showFormButton = document.getElementById('showFormButton');
        var ajouterPlanButton = document.getElementById('ajouterPlanButton');
        var modal = document.getElementById('myModal');

        showFormButton.addEventListener('click', function () {
            modal.style.display = 'block';
        });

        ajouterPlanButton.addEventListener('click', function () {
            window.location.href = 'admin.php'; // Redirect to admin.php
        });
        var deleteButtons = document.querySelectorAll('.delete-button');

deleteButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        var id = this.getAttribute('data-id');

        var confirmDelete = confirm("Voulez-vous vraiment supprimer cet enregistrement ?");
        if (!confirmDelete) {
            return; // User canceled the deletion
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
                location.reload(); // Reload the page after deletion
            }
        };

        xhr.send('id=' + id + '&delete=true');
    });
});

var editableCells = document.querySelectorAll('.editable');

editableCells.forEach(function (cell) {
    cell.addEventListener('click', function () {
        if (!this.classList.contains('editing')) {
            var oldValue = this.innerText;

            this.classList.add('editing');

            var input = document.createElement('input');

            if (cell.getAttribute('data-col') === 'du' || cell.getAttribute('data-col') === 'au') {
                input.type = 'date';
                input.value = oldValue;
            } else {
                input.type = 'text';
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
document.addEventListener('DOMContentLoaded', function () {
        var showFormButton = document.getElementById('showFormButton');
        var ajouterPlanButton = document.getElementById('ajouterPlanButton');
        var modal = document.getElementById('myModal');

        showFormButton.addEventListener('click', function () {
            modal.style.display = 'block';
        });

        ajouterPlanButton.addEventListener('click', function () {
            window.location.href = 'admin.php'; // Redirect to admin.php
        });

        var formationNames = document.querySelectorAll('.formation-name');

        formationNames.forEach(function (name) {
            name.addEventListener('click', function () {
                var id = this.innerText; // Formation name

                var xhrClient = new XMLHttpRequest();
                xhrClient.open('GET', 'get_client_info.php?id=' + id, true);
                xhrClient.onreadystatechange = function () {
                    if (xhrClient.readyState == 4 && xhrClient.status == 200) {
                        var clientInfo = JSON.parse(xhrClient.responseText);

                        // Display the client information under the clicked formation
                        var clientInfoCell = document.querySelector('.client-info[data-nomf="' + id + '"]');
                        clientInfoCell.innerHTML = 'Client Name: ' + clientInfo.nom + '<br>Client ID: ' + clientInfo.cin;
                    }
                };
                xhrClient.send();
            });
        });

        var deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.getAttribute('data-id');

                var confirmDelete = confirm("Voulez-vous vraiment supprimer cet enregistrement ?");
                if (!confirmDelete) {
                    return; // User canceled the deletion
                }

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log(xhr.responseText);
                        location.reload(); // Reload the page after deletion
                    }
                };

                xhr.send('id=' + id + '&delete=true');
            });
        });

        var editableCells = document.querySelectorAll('.editable');

        editableCells.forEach(function (cell) {
            cell.addEventListener('click', function () {
                if (!this.classList.contains('editing')) {
                    var oldValue = this.innerText;

                    this.classList.add('editing');

                    var input = document.createElement('input');

                    if (cell.getAttribute('data-col') === 'du' || cell.getAttribute('data-col') === 'au') {
                        input.type = 'date';
                        input.value = oldValue;
                    } else {
                        input.type = 'text';
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
document.addEventListener('DOMContentLoaded', function () {
        var editableCells = document.querySelectorAll('.editable');

        editableCells.forEach(function (cell) {
            cell.addEventListener('click', function () {
                if (!this.classList.contains('editing')) {
                    var oldValue = this.innerText;

                    this.classList.add('editing');

                    var input = document.createElement('input');

                    if (cell.getAttribute('data-col') === 'du' || cell.getAttribute('data-col') === 'au') {
                        input.type = 'date';
                        input.value = oldValue;
                    } else {
                        input.type = 'text';
                        input.value = oldValue;
                    }

                    this.innerHTML = '';
                    this.appendChild(input);

                    input.focus();

                    input.addEventListener('change', function () {
                        var newValue = this.value;

                        cell.classList.remove('editing');
                        cell.innerHTML = newValue;

                        var nomf = cell.getAttribute('data-nomf');
                        var col = cell.getAttribute('data-col');

                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'update.php', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                console.log(xhr.responseText);
                            }
                        };

                        xhr.send('nomf=' + nomf + '&col=' + col + '&value=' + newValue);
                    });

                    input.addEventListener('keyup', function (event) {
                        if (event.key === 'Enter') {
                            var newValue = this.value;

                            cell.classList.remove('editing');
                            cell.innerHTML = newValue;

                            var nomf = cell.getAttribute('data-nomf');
                            var col = cell.getAttribute('data-col');

                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'update.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    console.log(xhr.responseText);
                                }
                            };

                            xhr.send('nomf=' + nomf + '&col=' + col + '&value=' + newValue);
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



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

</head>







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

// Récupérer les données de la table inscription
$sql_inscription = "SELECT * FROM administrateur";
$result_inscription = $conn->query($sql_inscription);

// Récupérer les données de la table administrateur
$sql_administrateur = "SELECT * FROM administrateur";
$result_administrateur = $conn->query($sql_administrateur);
?>


</body>
</html>

