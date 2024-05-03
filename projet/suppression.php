<?php
// Connexion à la base de données (à adapter avec vos propres informations de connexion)
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "inscription";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

// Vérification de la présence du paramètre "id" dans l'URL
if (isset($_GET['id'])) {
    // Récupération du nom de la formation à supprimer depuis le paramètre "id"
    $nomFormation = $_GET['id'];

    // Requête SQL pour supprimer la formation de la base de données
    $sql = "DELETE FROM administrateur WHERE nomf = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param('s', $nomFormation);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Suppression réussie.";
    } else {
        echo "Erreur lors de la suppression : " . $stmt->error;
    }

    // Fermeture du statement et de la connexion
    $stmt->close();
    $connexion->close();
} else {
    echo "L'identifiant de la formation à supprimer n'a pas été fourni.";
}
?>
<?php
// Votre code de suppression ici...

// Après avoir traité la suppression avec succès
echo "<script>";
echo "alert('Suppression réussie.');";
echo "window.history.back();"; // Redirection vers la page précédente
echo "</script>";
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var deleteIcons = document.querySelectorAll('.delete-icon');

    deleteIcons.forEach(function(icon) {
        icon.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le lien de se comporter normalement

            var row = this.closest('tr'); // Trouve la ligne parente
            var id = row.getAttribute('id'); // Récupère l'identifiant unique de la ligne

            // Envoie une requête AJAX à suppression.php pour supprimer la ligne
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'suppression.php?id=' + id, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Supprime visuellement la ligne du tableau
                        row.parentNode.removeChild(row);
                    } else {
                        alert('Erreur lors de la suppression de la ligne.');
                    }
                }
            };
            xhr.send();
        });
    });
});
</script>