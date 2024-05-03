<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/script.js"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300&display=swap');

*{
    margin: 0; padding: 0;
    box-sizing: border-box;
    outline: none; border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: all 0.2s linear;
    font-family: 'Fira Sans', sans-serif;
}
:root{
    --min-color: #fff;
    --sc-color: #3ec1d5;
    --th-color: #333;
}
html{
    scroll-behavior: smooth;
    scroll-padding-top: 0.5rem;
    font-size: 66%;
}
.btn{
    display: inline-block;
    padding: 0.8rem 3.8rem;
    font-size: 1.8rem;
    border: 0.1rem solid var(--sc-color);
    outline: 0;
    background: var(--sc-color);
    border-radius: 1rem;
    cursor: pointer;
    text-align: center;
    color: var(--min-color);
}
.btn:hover{
    background: none;
    color: var(--sc-color);
}
.heading{
    margin: 5rem auto;
    font-size: 3.5rem;
    text-align: center;
    color: var(--th-color);
}
.heading div{
    display: inline-block;
    border-bottom: 0.2rem solid var(--th-color);
    width: 15rem;
}
.heading div:hover{
    width: 25rem;
}
section{
    padding: 3rem 9%;
}
header{
    position: fixed;
    top: 0; right: 0; left: 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1rem 3%;
    background: rgba(10, 10, 9, 0.6);
    z-index: 1001;
}
header .logo{
    font-size: 3.5rem;
    color: var(--min-color);
    padding: 0.4rem;
}
header .navbar a{
    margin: 0 0.8rem;
    font-size: 1.9rem;
    color: var(--min-color);
    padding: 0.4rem ;
}
header .navbar a:hover,
header .fa-bars:hover{
    color: var(--sc-color);
}
header .fa-bars{
    font-size: 2.8rem;
    color: var(--min-color);
    cursor: pointer;
    display: none;

}
.home .home-slid .box{
    position: relative;

}
.home .home-slid .box::before{
    content: "";
    background: rgba(0, 0, 0, 0.5);
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
}  
.home .home-slid .box .content{
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50% , -50%);
    color: var(--min-color);
    text-align: center;
}
.home .home-slid .box .content h3{
    font-size: 4rem;
}
.home .home-slid .box .content p{
    font-size: 2.5rem;
    margin: 1rem 0;
}
.about{
    background: #eee;
}
.about .box{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
    margin-top: 7rem;
}
.about .box .image img{
    width: 60rem;
    height: 100%;
    object-fit: cover;
}
.about .box .content h3{
    color: var(--th-color);
    font-size: 3.5rem;
}
.about .box .content p{
    color: var(--th-color);
    font-size: 2rem;
    margin: 2rem 0;
}
.about .box .content div{
    color: var(--th-color);
    font-size: 2.2rem;
}
.services .row{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(30%,1fr));
    gap: 0.8rem;
    margin-top: 5rem;
}
.services .row .box{
    text-align: center;
    color: var(--th-color);
    padding: 4rem;
    border-radius: 0.8rem;
}
.services .row .box:hover{
    box-shadow: 0.5rem 0.5rem 0.5rem rgba(0, 0, 0, 0.2);
    background: #eee;
}
.services .row .box i{
    font-size: 5rem;
}
.services .row .box h3{
    font-size: 2.5rem;
    margin: 1.5rem 0;
}
.services .row .box p{
    font-size: 2rem;
}
.portfolio .row{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(25%,1fr));
    gap: 1rem;
    margin: 6rem auto;
    width: 90%;
}
.portfolio .row .box{
    position: relative;
    overflow: hidden;
}
.portfolio .row .box:hover img{
    transform: translateY(-100%);
}
.portfolio .row .box img{
    height: 100%;
    width: 100%;
    object-fit: cover;
}
.portfolio .row .box:hover .content{
    transform: translateY(0);
}
.portfolio .row .box .content{
    position: absolute;
    top: 0; left: 0;
    background: rgba(0, 0, 0, 0.7);
    text-align: center;
    padding: 3rem 2rem;
    height: 100%; width: 100%;
    transform: translateY(100%);
    padding-top: 2.5rem;
}
.portfolio .row .box .content h3{
    font-size: 2.5rem;
    color: var(--sc-color);
    margin-top: 4rem;
}
.portfolio .row .box .content p{
    padding: 1rem 0;
    font-size: 1.8rem;
    line-height: 1;
    color: var(--min-color);
    margin-bottom: 0;
    color: var(--min-color);
}

.team{
    width: 100%;
}
.team .row{

   background: url(../Nombre-de-participants-team-building.jpeg);
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   background-attachment: fixed;
   position: relative;
   display: flex;
   align-items: center;
   min-height: 70vh;
} 
.row::before{
    content: "";
    background: rgba(0, 0, 0, 0.5);
    position: absolute;
    bottom: 0;
    top: 0;
    left: 0;
    right: 0;
}
.team .row .team-slider  .box{
    padding: 0 3%;
}
.team .team-slider .box .content{
    background: #222;
    box-shadow: 0 0.5 0.5 rgba(0, 0, 0, 0.6);
    text-align: center;
    padding: 4rem;
    border-radius: 1rem;
    height:30rem;
}
.team .team-slider .box .image img{
    width: 10rem;
    height: 7rem;
    border-radius: 50%;
    position: absolute;
    top: 22rem; left: 1rem;
    border: 0.3rem solid var(--sc-color);
    
}
.team .team-slider .box .content h3{
    font-size: 3.5rem;
    color: var(--sc-color);
    margin: 1rem;

}
.team .team-slider .box .content p{
    color: #fff;
    font-size: 2.2rem;
}
.blog .row{
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(25%,1fr));
    gap: 2rem;
    margin: 6rem 0;
}
.blog .row img{
    width: 100%;
    object-fit: cover;
}
.blog .row h3{
    color: var(--th-color);
    font-size: 3rem;
    margin: 1.5rem 0;
}
.blog .row p{
    color: var(--th-color);
    font-size: 1.9rem;
    margin: 1rem 0;
}


.contact .box{
    display: grid; 
    grid-template-columns: repeat(auto-fit,minmax(30%,1fr));
    gap: 2rem;
    text-align: center;
}
.contact .box i{
    font-size: 3.5rem;
    color: var(--sc-color);
}
.contact .box div{
    font-size: 2rem;
    color: var(--th-color);
    margin: 1rem 0;
}
.contact .row{
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
    margin: 8rem 0;
}
.contact .row .form-c input,textarea{
    background: var(--min-color);
    border: 0.1rem solid rgb(160, 160, 160);
    padding: 1rem;
    height: 4.5rem; width: 100%;
    margin: 0.7rem 0;
    color: var(--th-color);
    font-size: 1.9rem;
}
.contact .row .form-c input[type="submit"]{
    background: var(--sc-color);
    cursor: pointer;
    margin-bottom: 2rem;
    color: var(--min-color);
    border: 0.1rem solid var(--sc-color);

}
.contact .row .form-c input[type="submit"]:hover{
    background: none;
    color: var(--sc-color);
}
.contact .row .form-c textarea{
    height: 15rem;
    padding: 1rem;
}
.footer{
    background: #030b1f;
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(20%,1fr));
    gap: 2rem;
    text-align: center;
    padding: 4rem;
}
.footer h3{
    font-size: 3.5rem;
    margin: 2rem 0;
    color: var(--min-color);
}
.footer p{
    font-size: 1.6rem;
    margin: 1rem 0;
    color: var(--min-color);
}
.footer i{
    font-size: 2.6rem;
    margin: 1rem 0.5rem;
    color: var(--min-color);
}
.footer i:hover,
.footer a:hover{
    color: var(--sc-color);
}
.footer a{
    display: block;
    font-size: 2rem;
    margin: 0.5rem;
    color: var(--min-color);
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
    border-radius: 30px 0px 50px 50px;
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
































/* media query  */

@media(max-width:850px){

    header .fa-bars{
        display: block;
    }
    header .navbar{
        position: fixed;
        /* */ top: 1000rem; left: 0; 
        text-align: center;
        background: rgba(10, 10, 9, 0.6);
        width: 100%;
    }
    header .navbar.active{
        top: 7.5rem;
    }
    header .navbar a{
        display: block;
        margin: 0.3rem 0;
        padding: 1rem;
        font-size: 2.6rem;
        color: var(--min-color);
    }
    header .navbar a:hover{
        background: var(--min-color);
    }
    .about .box{
        flex-wrap: wrap;
        text-align: center;
    }
    .about .box .image img{
        width: 90%;
    }
    .services .row{
    
        grid-template-columns: repeat(auto-fit,minmax(80%,1fr));
    }
    .blog .row{
        grid-template-columns: repeat(auto-fit,minmax(80%,1fr));
    }
    .contact .row{
        flex-flow: column;
    }
    .contact .row iframe{
        width: 100%;
    }
    .footer{

        grid-template-columns: repeat(auto-fit,minmax(40%,1fr));
    }
}
@media(max-width:550px){
    .portfolio .row{
        
        grid-template-columns: repeat(auto-fit,minmax(40%,1fr));
    }
}</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn fonawsam  -->
    <script src="https://kit.fontawesome.com/3477ae541c.js" crossorigin="anonymous"></script>
    <!-- swipper cdn  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="css/style.css">
    <title>CNI</title>
</head>
<body>
    <!-- header  -->
    <header class="header">
        <div class="box">
            <img src="cni.jpg" width="80" height="50" alt="image">
            
           
        </div> 
           
          </a>
        <a href="#home" class="logo">Centre National D'informatique</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">A PROPOS DU CNI</a>
            <a href="#portfolio">Les Formations </a>
            <a href="#team">team</a>
            <a href="#contact">contact</a>

            <a href="#blog">Nos Derniers Projets</a>
        </nav>
        <i class="fa-solid fa-bars"></i>
    </header>
    <!-- /header  -->
    <!-- home  -->
    <div class="home" id="home">
        <div class="swiper home-slid">
            <div class="swiper-wrapper">

                <div class="swiper-slide box">
                    <div class="image">
                        <img src="pic.png" width="2000" height="1000" alt="image">
                       

                    </div>
                    <div class="content">
                        <h3>FORMATION</h3>
                        <div> <P> Rejoignez notre communauté pour découvrir les dernières tendances et astuces dans le monde des langages de programmation. Ensemble, explorons les opportunités infinies offertes par la technologie et développons nos compétences pour façonner l'avenir numérique!</P></div>
                       
                    </div>
                </div>

                    
            </div>
             <!-- /flech  -->
           
          </div>
    </div>
    <!-- /home  -->
    <!-- about  -->
    <section class="about" id="about">
        <div class="heading">
            <h2>A PROPOS DU CNI</h2>
            <div></div>
        </div>

        <div class="box">
            <div class="image">
                <img src="ii.JPG" alt="image">
            </div>
            <div class="content">
                <h3>Le Centre National de l’Informatique </h3>
                
                <p>La décision de s'inscrire à une formation en programmation est une étape cruciale pour ceux qui aspirent à réussir dans le domaine technologique. En acquérant ces compétences, non seulement vous augmentez vos chances d'obtenir un emploi dans un marché du travail concurrentiel, mais vous ouvrez également la porte à des possibilités d'innovation et de création infinies.  En vous inscrivant à une formation en programmation, vous investissez dans votre avenir en acquérant une compétence précieuse qui continuera à vous servir tout au long de votre carrière. </p>
              
            </div>
        </div>
    </section>
    <!-- /about  -->
                   
    <!-- portfolio  -->
    <!-- portfolio  -->
    <script>

let Navbar = document.querySelector('.navbar');
let Fabars = document.querySelector('.fa-bars');

Fabars.onclick = () =>{
    Navbar.classList.toggle("active")
};



var swiper = new Swiper(".home-slid", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});



var swiper = new Swiper(".team-slider", {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    breakpoints: {
      "0": {
        slidesPerView: 1,
        autoplay:{
            delay:700,
            disableOnInteraction:false,
        },
      },
      "768": {
        slidesPerView: 2,
          
      },
      "1020": {
        slidesPerView: 3,
          
      },
    },
  });

</script>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Formations</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 20px; /* Augmentation de la marge interne pour une meilleure lisibilité */
            text-align: left;
            font-size: 16px; /* Augmentation de la taille de la police */
        }

        th {
            background-color: #3498db;
            color: #fff;
            font-weight: bold;
        }

        tr:hover {
            background-color: #ecf0f1;
        }

        .button-encours {
            background-color: #27ae60;
            color: white;
        }

        .button-enattente {
            background-color: #e74c3c;
            color: white;
        }

        button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="portfolio" id="portfolio">
        <div class="heading">
            <h2>Les Formations</h2>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                
                <th>Nom de la formation</th>
                <th>nom du formateur</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Image</th>
                <th>voir le plan</th>
                <th>action</th>
                <th>état</th>,
            </tr>
        </thead>
        <tbody>
        <?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "inscription";
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

// Requête SQL pour sélectionner les formations
$sql = "SELECT ID_f, nomf, nom_formateur, description, prix, du, au, image, etat FROM administrateur";
$resultat = $connexion->query($sql);

// Affichage des enregistrements dans le tableau
if ($resultat->num_rows > 0) {
    while ($ligne = $resultat->fetch_assoc()) {
        echo "<tr>";

        echo "<td>" . $ligne['nomf'] . "</td>";
        echo "<td>" . $ligne['nom_formateur'] . "</td>";
        echo "<td>" . $ligne['description'] . "</td>";
        echo "<td>" . $ligne['prix'] . "</td>";
        echo "<td>" . $ligne['du'] . "</td>";
        echo "<td>" . $ligne['au'] . "</td>";
        echo "<td><img src='" . $ligne['image'] . "' alt='Image'></td>";
        echo "<td><button onclick='redirectToPlanDetails(\"" . $ligne['ID_f'] . "\")'>Voir le plan</button></td>";

        // Vérifier si la formation est en cours
        if ($ligne['etat'] == "encours") {
            echo "<td><button class='button-enattente' disabled>Désolé, la formation a déjà commencé</button></td>";
        } else {
            echo "<td><button onclick='redirigerVersClient(\"" . $ligne['nomf'] . "\", \"" . $ligne['ID_f'] . "\")'>Inscrire</button></td>";
        }

        // Affichage des boutons en fonction de l'état
        if ($ligne['etat'] == "encours") {
            echo "<td><button class='button-encours'>En cours</button></td>";
        } else {
            echo "<td><button class='button-enattente'>" . $ligne['etat'] . "</button></td>";
        }

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Aucun résultat trouvé.</td></tr>";
}

// Fermeture de la connexion
$connexion->close();
?>
            
        </tbody>
    </table>
    <script>
   function redirectToPlanDetails(id) {
        // Redirige vers la page plan_details.php en passant l'ID du plan en tant que paramètre GET
        window.location.href = 'plan_details.php?id=' + id;
    }
    // Redirect to client.php when the "Inscrire" button is clicked
    function redirigerVersClient(nomf, ID_f) {
        window.location.href = 'client.php?nomf=' + encodeURIComponent(nomf) + '&ID_f=' + encodeURIComponent(ID_f);
    }
    function redirigerVersClient(nomFormation, idFormation) {
    window.location.href = "client.php?idFormation=" + idFormation + "&nomFormation=" + encodeURIComponent(nomFormation);
}
</script>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Évaluation de la formation</title>
<link rel="stylesheet" href="styles.css">
<style>
  .container {
    max-width: 800px;
    margin: 100px auto;
    text-align: center;
}

.rating {
    display: inline-block;
}

.rating input {
    display: none;
}

.rating label {
    cursor: pointer;
    font-size: 32px; /* Taille de la police augmentée */
    color: #ccc;
}

.rating label:before {
    content: '★';
    font-size: 100px; /* Taille de l'icône étoile augmentée */
}

.rating input:checked ~ label {
    color: #ffcc00;
}

</style>
</head>
<?php
// Récupération de la note
if(isset($_POST['rating'])) {
    $rating = $_POST['rating'];

    // Enregistrement de la note dans une base de données par exemple
    // Ici vous pouvez ajouter le code pour enregistrer la note dans votre base de données

    // Redirection vers une page de confirmation ou de remerciement
    header("Location: thank_you.php");
    exit();
} else {
    // Gestion du cas où aucune note n'est sélectionnée
    echo "Veuillez sélectionner une note.";
}
?>
<body>

<div class="container">
    <h2>Évaluez cette formation</h2>
    <form id="ratingForm" action="submit_rating.php" method="post">
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
            <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
            <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
            <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
            <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingForm = document.getElementById('ratingForm');
    const ratingInputs = document.querySelectorAll('input[name="rating"]');

    ratingInputs.forEach(input => {
        input.addEventListener('change', function() {
            ratingForm.submit();
        });
    });
});
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Commentaire Participant</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 20px;
}

h2 {
    color: #333;
}

.commentaire {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.commentaire .email {
    font-weight: bold;
    color: #2a8ccf;
    margin-bottom: 5px;
}

.commentaire .contenu {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
}

.commentaire .date {
    font-size: 12px;
    color: #777;
    margin-bottom: 5px;
}

.commentaire .action-buttons {
    margin-top: 10px;
}

.commentaire .action-buttons img {
    width: 24px;
    height: 24px;
    cursor: pointer;
    margin-right: 10px;
}

.commentaire .action-buttons img:hover {
    opacity: 0.7;
}

.like-count, .dislike-count {
    margin-right: 5px;
    font-weight: bold;
}

.button-container {
    display: flex;
    align-items: center;
}

#commentaire, #email, #reponse {
    width: calc(100% - 20px);
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
}

#commentaire {
    resize: vertical;
}

button {
    background-color: #2a8ccf;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #1e6a8d;
}

#form-commentaire {
    display: none;
}
</style>
</head>
<body>

<h2>Zone de commentaire</h2>

<div id="form-commentaire">
    <textarea id="commentaire" rows="4" placeholder="Ajoutez votre commentaire ici..."></textarea>
    <input type="email" id="email" placeholder="Votre adresse e-mail"><br>
    <button onclick="ajouterCommentaire()">Ajouter Commentaire</button>
</div>

<button onclick="toggleForm()">Ajouter un Commentaire</button>

<div id="commentaires">
    <!-- Les commentaires seront affichés ici -->
</div>

<script>
// Fonction pour récupérer et afficher les commentaires depuis la base de données
window.onload = function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "recuperer_commentaires.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var commentaires = JSON.parse(xhr.responseText);
            var commentairesDiv = document.getElementById("commentaires");
            commentaires.forEach(function(commentaire) {
                var divCommentaire = document.createElement("div");
                divCommentaire.classList.add("commentaire");
                divCommentaire.innerHTML = "<p class='email'><strong>Email:</strong> " + commentaire.email + "</p><p class='contenu'><strong>Commentaire:</strong> " + commentaire.commentaire + "</p><p class='date'>Date du commentaire: 2024-05-05</p><div class='action-buttons'><img src='s.jpeg' alt='Like' class='like-button' onclick='likeComment(this)'><span class='like-count'>0</span> Likes <img src='l.png' alt='Dislike' class='dislike-button' onclick='dislikeComment(this)'><span class='dislike-count'>0</span> Dislikes</div><textarea id='reponse' rows='2' placeholder='Votre réponse...'></textarea><button onclick='repondreCommentaire(this)'>Répondre</button>";
                commentairesDiv.appendChild(divCommentaire);
            });
        }
    };
    xhr.send();
};

// Fonction pour ajouter un commentaire
function ajouterCommentaire() {
    var commentaire = document.getElementById("commentaire").value;
    var email = document.getElementById("email").value;
    if (commentaire.trim() !== "" && email.trim() !== "") {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "enregistrer_commentaire.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var divCommentaires = document.getElementById("commentaires");
                var divCommentaire = document.createElement("div");
                divCommentaire.classList.add("commentaire");
                divCommentaire.innerHTML = "<p class='email'><strong>Email:</strong> " + email + "</p><p class='contenu'><strong>Commentaire:</strong> " + commentaire + "</p><p class='date'>Date du commentaire: 2024-05-05</p><div class='action-buttons'><img src='s.jpeg' alt='Like' class='like-button' onclick='likeComment(this)'><span class='like-count'>0</span> Likes <img src='l.png' alt='Dislike' class='dislike-button' onclick='dislikeComment(this)'><span class='dislike-count'>0</span> Dislikes</div><textarea id='reponse' rows='2' placeholder='Votre réponse...'></textarea><button onclick='repondreCommentaire(this)'>Répondre</button>";
                divCommentaires.insertBefore(divCommentaire, divCommentaires.firstChild);
            }
        };
        xhr.send("commentaire=" + encodeURIComponent(commentaire) + "&email=" + encodeURIComponent(email));
    } else {
        alert("Veuillez remplir tous les champs.");
    }
}

// Fonction pour gérer le clic sur le bouton "Like"
function likeComment(button) {
    var commentaire = button.parentNode.parentNode;
    var likeCount = commentaire.querySelector('.like-count');
    likeCount.textContent = parseInt(likeCount.textContent) + 1;
}

// Fonction pour gérer le clic sur le bouton "Dislike"
function dislikeComment(button) {
    var commentaire = button.parentNode.parentNode;
    var dislikeCount = commentaire.querySelector('.dislike-count');
    dislikeCount.textContent = parseInt(dislikeCount.textContent) + 1;
}

// Fonction pour répondre à un commentaire
function repondreCommentaire(button) {
    var commentaire = button.parentNode;
    var reponse = commentaire.querySelector('#reponse').value;
    // Vous pouvez maintenant envoyer la réponse à votre backend pour l'enregistrer dans la base de données, par exemple, en utilisant une requête AJAX
    alert("Réponse au commentaire : " + reponse);
}

// Fonction pour afficher ou cacher le formulaire de commentaire
function toggleForm() {
    var form = document.getElementById("form-commentaire");
    form.style.display = (form.style.display === "none") ? "block" : "none";
}
</script>

</body>
</html>




    <!-- team  -->
    <div class="team" id="team">

        <div class="heading">
            <h2> team </h2>
            <div></div>
        </div>
        <div class="row">
            <div class="swiper team-slider">
                <div class="swiper-wrapper">
            
                   

                    <div class="swiper-slide box">
                        <div class="content">
                            <h3>Karim Hmadi</h3>
                            <p>devloppeur </p>
                            
                        </div>
                        <div class="image">
                            <img src="./12998621_10209005964728100_4183495328770651389_n.jpg" alt="image">
                        </div>
                    </div>




                    <div class="swiper-slide box">
                        <div class="content">
                            <h3>mohamed</h3>
                            <p>dev</p>
                            
                        </div>
                        <div class="image">
                            <img src="img/" alt="image">
                        </div>
                    </div>



                    <div class="swiper-slide box">
                        <div class="content">
                            <h3>mohamed ali</h3>
                            <p>devloppeur</p>
                            
                        </div>
                        <div class="image">
                            <img src="img" alt="image">
                        </div>
                    </div>





                    <div class="swiper-slide box">
                        <div class="content">
                            <h3>noura zarouk</h3>
                            <p>dev</p>
                            
                        </div>
                        <div class="image">
                            <img src="img" alt="image">
                        </div>
                    </div>
            
                  
            
                    

                    
            
                </div>

             
            </div>
           
        </div>
       
    </div>
    

    <!-- team  -->
   





    <!-- blog  -->
    <div class="welcam"> </div>


    <!-- .contact  -->
    <section class="contact" id="contact">


        


    </div>
        <div class="heading">
            <h2>Notre adresse </h2>
            
        </div>

        <div class="row">
            <div class="ifarm">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3194.2430022942463!2d10.165850499999996!3d36.812696500000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3386aae7a5f9%3A0x48d6f4f6afb7d57!2zQ2VudHJlIE5hdGlvbmFsIGRlIGwnSW5mb3JtYXRpcXVlIChDTkkpIC0g2KfZhNmF2LHZg9iyINin2YTZiNi32YbZiiDZhNmE2KXYudmE2KfZhdmK2Kk!5e0!3m2!1sfr!2stn!4v1707742279281!5m2!1sfr!2stn" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
            <div class="form-c">



            
            

            
        </div>
      
    </section>















    <!-- Nos derniers projets -->
    <section class="blog" id="blog">
        <div class="heading">
            <h2>Nos derniers projets</h2>
        </div>
        <div class="row">
            

            <div class="box">
                <img src="02.jpg" alt="image">
                <h3>TUNEPS</h3>
                <p>TUNEPS
                    Système d’achat public en ligne Appartenant à la Présidence du Gouvernement (HAICOP).</p>
            </div>

            <div class="box">
                <img src="03.jpg" alt="image">
                <h3>Intranet pour l'administration</h3>
                <p>Mise en place de services INTRANET avec des produits opensource : 

                     Services de base
                    
                     Services à valeurs ajoutés
                    
                      Offrir un socle d’intégration de services.</p>
            </div>


            <div class="box">
                <img src="04.jpg" alt="image">
                <h3>solutions Interpérabilité</h3>
                <p>Solutions Interopérabilité entre les systèmes d’information: une plateforme d’interopérabilité nationale garantissant l’échange sécurisé des données.

                </p>
            </div>
        </div>


        
    </section>




    



    <!-- /contact  -->
 

    <!-- footer  -->

    <footer class="footer">
        <div class="content">
            <h3>découvrir plus en détail</h3>
            
            <div class="shar">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>

        
        <div class="content">
            <h3>Contact</h3> 
            <div class="box">
                <div class="content">
                    <i class="fa-solid fa-mobile-screen"></i>
                    <a>71783055</a>
    
                    <a> L-V (8:30-12:30 / 13:30-17:30)</a>
                    <a> S-D fermé</a>
                    
                </div>
    
                <div class="content">
                    <i class="fa-solid fa-location-dot"></i>
                    <a>l17, 1005 Av. Belhassen Ben Chaabane, Tunis</a>
                    
                </div>
                
                <div class="content">
                    <i class="fa-solid fa-envelope"></i>
                    <a>mail:webcni@cni.tn</a>
                </div>
                
              
    
    
            </div>
        </div>

        <div class="link">
            <h3>links</h3>
            <a href="#home">home</a>
            <a href="#about">a propos du cni</a>
            <a href="#formation">Formations</a>
            <a href="#team">team</a>
            <a href="#contact">contact</a>

            <a href="#blog">derniers projets</a>
        </div>

        

        



        

    
    


        
           
    </footer>
   
