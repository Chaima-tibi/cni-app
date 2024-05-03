<?php
// Connexion à la base de données
 // Connexion à la base de données
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "inscription";
 $conn = new mysqli($servername, $username, $password, $dbname);
 
 // Vérification de la connexion
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 // Récupération des commentaires depuis la base de données
 $sql = "SELECT email, commentaire FROM commentaires";
 $result = $conn->query($sql);
 
 $commentaires = array();
 
 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $commentaires[] = array(
             'email' => $row["email"],
             'commentaire' => $row["commentaire"]
         );
     }
 }
 
 // Fermeture de la connexion à la base de données
 $conn->close();
 
 // Envoi des commentaires sous forme de JSON
 header('Content-Type: application/json');
 echo json_encode($commentaires);
 ?>