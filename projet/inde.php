<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_db = mysqli_select_db($connection, $dbname);
if (!$select_db) {
    echo("Erreur lors de la sélection de la base de données : " . mysqli_error($connection));
}

$msg = ""; // Initialisation du message d'erreur ou de succès
?>

<html>  
<head>  
    <title>Ajouter plan</title>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>

<body>
<div class="container">
  <h3 align="center">Ajouter plan</h3>
  <br>
  <div class="box">
  <form method="post">
  <div class="form-group">
  <textarea id="content" name="content" class="form-control"></textarea>
  </div>
  <div class="form-group">
  <input type="submit" name="submit" value="Save" class="btn btn-primary">
  </div>
  </form>
  <div class="error"><?php if(!empty($msg)){ echo $msg; } ?></div>
  </div>
</div> 

<?php 
if(isset($_POST['submit'])){
  $content = $_POST['content'];
  
  $insert_query = mysqli_query($connection, "INSERT INTO administrateur (plan) VALUES ('$content')");
  if($insert_query)
  {
    $msg = "Data Inserted";
  }
  else
  {
    $msg = "Error: " . mysqli_error($connection);
  }
}
?>
</body>  
</html>
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
      });
</script>
