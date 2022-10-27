<?php 

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

// Nom et id pays
$pays = 'SELECT pays.id_pays, pays.nom_pays FROM pays ';
$resulat = $connection -> query($pays);
$tab_pays = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_pays = count($tab_pays);

// Contenu activités (principale)
$activitesp = 'SELECT event.* FROM event WHERE event.id_pays = '.$_GET['id'].' AND event.main_activitee = 1';
$resulat = $connection -> query($activitesp);
$tab_event_pri = $resulat -> fetchAll();
$resulat -> closeCursor();

$activitess = 'SELECT event.* FROM event WHERE event.id_pays = '.$_GET['id'].' AND event.main_activitee = 0';
$resulat = $connection -> query($activitess);
$tab_event_sec = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_event_sec = count($tab_event_sec);

?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL | Réservation </title>
  <link rel="stylesheet" href="../css/reservation.css">
  <script src="../js/reservation.js"></script>
</head>
<body>

<?php include './header_footer/header.php';?> 


<div class="container">
    <div class="containerCestQuoi">
      <div class="cestQuoi">
        <div class="photoCestQuoi"></div>
        <div class="cestQuoiParagraph">
          <h2>Réservez vos places</h2><br>
          <p> Découvrez 5 cultures à travers 5 pays grâce à des activités
          telles que la Holi, l'escape game situé dans la pyramide de
          Khéops, le carnaval ou le musée. D'autres activités comme
          la poterie, la sculpture, spectacle de capoeira, ou tapisserie
          vous permettront d'en apprendre d'avantage sur chaque culture.</p>
      </div>
    </div>
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

              <!-- ACTIVITÉs SECONDAIREs -->
              <?php 
                for($i = 0; $i < $nbr_event_sec; $i++){ ?>
                  <div class="activity2"> 
                    <div class="col">
                      <li><?php echo $tab_event_sec[$i]["nom_activitee"];?></li>
                      <p>
                        <?php echo $tab_event_sec[$i]["descriptif"];?>              
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
      <a href="page_reserv.php" class="bn3">Réserver votre place</a>
    </div>

</div>  

  <?php include './header_footer/footer.html';?> 

</body>

</html>
