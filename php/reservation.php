<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL </title>
  <link rel="stylesheet" href="../css/reservation.css">
  <script src="../js/reservation.js"></script>
</head>
<body>
<nav class="containerBar">
    <div class="fondBar">
      <div class="logo">
        <a href="#top">
          <img src="../img/logo.png"></img>
        </a>
      </div>

      <div class="containerBoutons">

        <div class="bouton" class="petitBouton">
          <a href="./main.php">
            <p>
              ACCUEIL
            </p>
          </a>
        </div>

        <div class="bouton" class="petitBouton">
          <a href="./pays.php">
            <p>
              PAYS
            </p>
          </a>
        </div>

        <div class="bouton">
          <a href="./reservation.php">
            <p id="reservation">
              RESERVER
            </p>
          </a>
        </div>

      </div>
    </div>
</nav>

<div class="container">
    <div class="img_text_top">
      <div class="left_img">
        <img src="../img/img_reservation.jpg" class="img_top">
      </div>
      <div class="right_text">
        <h1>Réservez vos places</h1><br>
      <span>
        Découvrez 5 cultures à travers 5 pays grâce à des activités<br>
        telles que la Holi, l'escape game situé dans la pyramide de<br>
        Khéops, le carnaval ou le musée. D'autres activités comme<br>
        la poterie, la sculpture, spectacle de capoeira, ou tapisserie<br>
        vous permettront d'en apprendre d'avantage sur chaque culture.<br>
      </span>
      </div>
    </div>

    <div class="choose_pays">
        <label for="pays"><h2>Quel pays voulez-vous découvrir ?</h2></label>
        <select class="select_pays" name="pays">
          <option value="0">Pays</option>
          
            <?php
              /* AFFICHER LISTE PAYS */
            ?>

        </select>
    </div>

    <div class="afficher_pays">
        <span class="container_in">

          <div class="title_activity">
            <li>Activités proposées :</li>
            <li>Nos tarifs ?</li>
          </div>

          <div class="informations">    
            <div class="activity_main">
              <div class="activity1">
                <li>"ACTIVITÉ 1"</li>
                <p>
                  "DESCRIPTION ACTIVITÉ"              
                </p>
                <p>
                  Date : "AFFICHER DATE ACTIVITÉ"<br><br>
                  Horaires : "AFFICHER HORAIRES ACTIVITÉ"
                </p>
                <p>
                  Localisation : "AFFICHER LIEU ACTIVITÉ"
                </p>
              </div> 
              <div class="activity2"> 
                <li>"ACTIVITÉ 2"</li>
                <p>
                  "DESCRIPTION ACTIVITÉ"                
                </p>
                <p>
                  Date : "AFFICHER DATE ACTIVITÉ"<br><br>
                  Horaires : "AFFICHER HORAIRES ACTIVITÉ"
                </p>
                <p>
                  Localisation : "AFFICHER LIEU ACTIVITÉ"
                </p>
              </div>   
            </div>

            <div class="tarifs">
              <p>Prix enfant : "AFFICHER PRIX"</p>
              <p>Prix adulte : "AFFICHER PRIX"</p>
            </div>
          </div>
        </span>
    </div>

    <div class="bouton_reserver">
      <a href="#" class="bn3">Réserver votre place</a>
    </div>

  <footer>
      <div class="gauche">
        <p> © Copyrights </p>
      </div>
      <div class="centre">
        <img src="../img/gros_blanc.png" alt="logo">
      </div>
      <div class="droite">
        <p> All Rights Reserved </p>
    </div>
  </footer>
</div>  
</body>

</html>
