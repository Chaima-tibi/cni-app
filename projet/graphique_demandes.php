<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphique des demandes d'inscription</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Importation de Chart.js -->
    
    <link rel="stylesheet" type="text/css" href="styles.css">
    
</head>
<body>
    <h1>Graphique des demandes d'inscription par formation</h1>


    <h1>Graphique des saisons</h1>

    <table>
        <tr>
            <td>
                <canvas id="demandesChart1" width="400" height="400"></canvas>
            </td>
            <td>
                <canvas id="demandesChart2" width="400" height="400"></canvas>
            </td>
           
            <td>
                <canvas id="seasonsChart" width="400" height="400"></canvas>
            </td>
            
        </tr>
    </table>

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

    // Récupérer les données pour le graphique des demandes d'inscription
    $sql_select_demandes = "SELECT choix, COUNT(*) AS nombre_demandes FROM client WHERE status = 'en_attente' GROUP BY choix";
    $result_demandes = $conn->query($sql_select_demandes);

    $formations = [];
    $demandes = [];

    if ($result_demandes->num_rows > 0) {
        // Récupérer les résultats de la requête
        while ($row_demande = $result_demandes->fetch_assoc()) {
            $formations[] = $row_demande['choix'];
            $demandes[] = $row_demande['nombre_demandes'];
        }
    }

    // Récupérer les données pour le graphique des participants
    $sql_select_participants = "SELECT choix, COUNT(*) AS nombre_participants FROM client WHERE status = 'acceptee' GROUP BY choix";
    $result_participants = $conn->query($sql_select_participants);

    $formations_participants = [];
    $participants = [];

    if ($result_participants->num_rows > 0) {
        // Récupérer les résultats de la requête
        while ($row_participant = $result_participants->fetch_assoc()) {
            $formations_participants[] = $row_participant['choix'];
            $participants[] = $row_participant['nombre_participants'];
        }
    }

    $conn->close();
    ?>
    
    <script>
        // Création du premier graphique avec Chart.js
        var ctx1 = document.getElementById('demandesChart1').getContext('2d');
        var myChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($formations); ?>,
                datasets: [{
                    label: 'Nombre de demandes',
                    data: <?php echo json_encode($demandes); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Création du deuxième graphique avec Chart.js
        var ctx2 = document.getElementById('demandesChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($formations_participants); ?>,
                datasets: [{
                    label: 'Nombre de participants',
                    data: <?php echo json_encode($participants); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
         // Données statiques pour le graphique des saisons
         var labelsSeasons = ['Printemps', 'Été', 'Automne', 'Hiver'];
        var dataSeasons = [100, 300, 125, 100]; // Vous pouvez modifier ces valeurs selon vos besoins

        var ctx3 = document.getElementById('seasonsChart').getContext('2d');
        var myChart3 = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: labelsSeasons,
                datasets: [{
                    label: 'Saisons de l\'année',
                    data: dataSeasons,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
