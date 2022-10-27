<?php 

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

// Nom et id pays
$pays = 'SELECT pays.id_pays, pays.nom_pays FROM pays';
$resulat = $connection -> query($pays);
$tab_pays = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_pays = count($tab_pays);

// Contenu activités (principale)
$activitesp = 'SELECT event.* FROM event WHERE event.id_pays = 2 AND event.main_activitee = 1';
$resulat = $connection -> query($activitesp);
$tab_event_pri = $resulat -> fetchAll();
$resulat -> closeCursor();

$activitess = 'SELECT event.* FROM event WHERE event.id_pays = 2 AND event.main_activitee = 0';
$resulat = $connection -> query($activitess);
$tab_event_sec = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_event_sec = count($tab_event_sec);

?>


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
          <option value="0" class="choose">- Pays -</option>

            <?php /*------ GOOD CA MARCHE ------*/
              for($i=0;$i<count($tab_pays);$i++){
                echo '<option>'.$tab_pays[$i]["nom_pays"].'</option>';
              }
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

              <!-- ACTIVITÉ PRINCIPALE -->
              <div class="activity1">
                <div class="col">
                  <li><?php echo $tab_event_pri[0]["nom_activitee"];?></li>
                  <p><?php echo $tab_event_pri[0]["descriptif"];?></p>
                  <p>
                    Date : <?php echo $tab_event_pri[0]["date_event"];?><br><br>
                    Horaires : <?php echo $tab_event_pri[0]["horraires"];?>
                  </p>
                  <p>
                    Localisation : <?php echo $tab_event_pri[0]["lieu"];?>
                  </p>
                </div>

                <div class="tarifs">
                  <span class="space">
                    <p>Prix adulte : <?php echo $tab_event_pri[0]["prix_adulte"];?>€</p>
                    <p>Prix enfant : <?php echo $tab_event_pri[0]["prix_enfant"];?>€</p>
                  </span>
                </div>
              </div> 

              <!-- ACTIVITÉ SECONDAIRE -->
              <?php 
                for($i = 0; $i < $nbr_event_sec; $i++){ ?>
                  <div class="activity2"> 
                    <div class="col">
                      <li>"ACTIVITÉ 2"</li>
                      <p>
                        "DESCRIPTION ACTIVITÉ"                
                      </p>
                      <p>
                        Date : <?php echo $tab_event_sec[$i]["date_event"];?><br><br>
                        Horaires : <?php echo $tab_event_sec[$i]["horraires"];?>
                      </p>
                      <p>
                        Localisation : <?php echo $tab_event_sec[$i]["lieu"];?>
                      </p>
                    </div>

                    <div class="tarifs">
                      <span class="space">
                        <p>Prix enfant : <?php echo $tab_event_sec[$i]["prix_adulte"];?>€</p>
                        <p>Prix adulte : <?php echo $tab_event_sec[$i]["prix_adulte"];?>€</p>
                      </span>
                    </div>
                  </div>
                <?php } ?>
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
