<?php 
include("../config/config.php") ;
$connexion = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

// Nom et id pays
$pays = 'SELECT pays.id_pays, pays.nom_pays_en FROM pays ';
$resulat = $connexion -> query($pays);
$tab_pays = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_pays = count($tab_pays);

// Contenu activités (principale)
$activitesp = 'SELECT event.* FROM event WHERE event.id_pays = '.$_GET['id'].' AND event.main_activitee = 1';
$resulat = $connexion -> query($activitesp);
$tab_event_pri = $resulat -> fetchAll();
$resulat -> closeCursor();

$activitess = 'SELECT event.* FROM event WHERE event.id_pays = '.$_GET['id'].' AND event.main_activitee = 0';
$resulat = $connexion -> query($activitess);
$tab_event_sec = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_event_sec = count($tab_event_sec);

?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL | Reservation </title>
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
          <h2>Reserve your seats</h2><br>
          <p> Discover 5 cultures across 5 countries through activities such as Holi, the escape game located in the pyramid of Cheops, the carnival or the museum. Other activities like pottery, sculpture, capoeira performance, or tapestry will allow you to learn more about each culture.</p>
      </div>
    </div>
  </div>

    <div class="afficher_pays">
        <span class="container_in">

          <div class="title_activity">
            <li>Proposed activities :</li>
            <li>Our prices ?</li>
          </div>

          <div class="informations">    

              <!-- ACTIVITÉ PRINCIPALE -->
              <div class="activity1">
                <div class="col">
                  <li><?php echo $tab_event_pri[0]["nom_activitee_en"];?></li>
                  <p><?php echo $tab_event_pri[0]["descriptif_en"];?></p>
                  <p>
                    Date : <?php echo $tab_event_pri[0]["date_event"];
                    
                    if ($tab_event_pri[0]["date_event"] == NULL OR $tab_event_pri[0]["date_event"] == 0000-00-00){
                      echo 'All the week-end !';
                    }

                    ?>
                    <br><br>
                    Schedule : <?php echo $tab_event_pri[0]["horraires"];
                    
                    if ($tab_event_pri[0]["horraires"] == NULL OR $tab_event_pri[0]["horraires"] == '00:00:00'){
                      echo 'All the week-end !';
                    }

                    ?>
                  </p>
                  <p>
                    Localisation : <?php echo $tab_event_pri[0]["lieu"];?>
                  </p>
                </div>

                <div class="tarifs">
                  <span class="space">
                    <p>Adult price : <?php echo $tab_event_pri[0]["prix_adulte"];?>€</p>
                    <p>Child price : <?php echo $tab_event_pri[0]["prix_enfant"];?>€</p>
                  </span>
                </div>
              </div> 

              <!-- ACTIVITÉs SECONDAIREs -->
              <?php 
                for($i = 0; $i < $nbr_event_sec; $i++){ ?>
                  <div class="activity2"> 
                    <div class="col">
                      <li><?php echo $tab_event_sec[$i]["nom_activitee_en"];?></li>
                      <p>
                        <?php echo $tab_event_sec[$i]["descriptif_en"];?>              
                      </p>
                      <p>
                        Date : <?php echo $tab_event_sec[$i]["date_event"];
                        
                        if ($tab_event_sec[$i]["date_event"] == NULL OR $tab_event_sec[$i]["date_event"] == 0000-00-00){
                          echo 'All the week-end !';
                        }
                        
                        ?><br><br>
                        Schedule : <?php echo $tab_event_sec[$i]["horraires"];
                        
                        if ($tab_event_sec[$i]["horraires"] == 'NULL' OR $tab_event_sec[$i]["horraires"] == '00:00:00'){
                          echo 'All the week-end !';
                        }
                        
                        ?>
                      </p>
                      <p>
                        Localisation : <?php echo $tab_event_sec[$i]["lieu"];?>
                      </p>
                    </div>

                    <div class="tarifs">
                      <span class="space">
                        <p>Prix adulte : <?php echo $tab_event_sec[$i]["prix_adulte"];?>€</p>
                        <p>Prix enfant : <?php echo $tab_event_sec[$i]["prix_enfant"];?>€</p>
                      </span>
                    </div>
                  </div>
                <?php } ?>
          </span>
      </div>

    <div class="bouton_reserver">
      <a href="../reservation.php?id=<?php echo $_GET['id'];?>" class="bn3">Use french version to reserve</a>
    </div>

</div>  

  <?php include 'header_footer/footer.html';?> 

</body>

</html>
