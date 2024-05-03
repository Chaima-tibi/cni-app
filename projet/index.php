<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>page d'admini</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css" />
  <style>
    /* CSS pour que la partie main occupe tout l'écran */
    main {
      height: 100vh; /* La partie main prendra 100% de la hauteur de l'écran */
      display: flex; /* Utilise le modèle de boîte flexible pour aligner le contenu */
      flex-direction: column; /* Aligne le contenu en colonne */
    }

    /* Style supplémentaire pour le contenu dans la partie main */
    .glass {
      flex: 1; /* Le contenu prendra toute la hauteur disponible */
      overflow-y: auto; /* Ajoute une barre de défilement verticale si nécessaire */
    }
  </style>
</head>

<body>
  <main>
    <section class="glass">
      <div class="dashboard">
        <div>
          <a href="index.php">
            <img src="admin.jpeg" alt="" width="130px"
              style="border-radius: 50%; margin-top: 25px; margin-bottom: 10px;" />
            <h3>Page d'administrateur</h3>
          </a>
        </div>
        <div class="links">
          <a href="education.php">
            <div class="link">
              <img src="./images/education.png" width="40px" alt="" />
              <h2>Demande d'inscription </h2>
            </div>
          </a>
          <a href="skill.php">
            <div class="link">
              <img src="./images/skills.png" width="40px" alt="" />
              <h2>Les formations</h2>
            </div>
          </a>
          <a href="experience.php">
            <div class="link">
              <img src="./images/experience.png" width="37px" alt="" />
              <h2>ajouter une formation</h2>
            </div>
          </a>
          <a href="projects.php">
            <div class="link">
              <img src="./images/projects.png" width="37px" alt="" />
              <h2>calendrier</h2>
            </div>
          </a>
        </div>

      </div>
      <div class="carditems">
        <br>

        <img src="w.webp" alt="" width="990px" />
        <br>
        <a href="template.php" target="_blank">

          <div class="glassbutton">
            <p>consulter la template</p>
          </div>
        </a>
      </div>
    </section>
  </main>
  <div class="circle1"></div>
  <div class="circle2"></div>
</body>

</html>
