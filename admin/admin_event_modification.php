<?php

include("../config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

$utilisateurs = 'SELECT * FROM utilisateurs';
$resulat = $connection -> query($utilisateurs);
$tab_pays = $resulat -> fetchAll();
$resulat -> closeCursor();
$compteur = count($tab_pays);

$event = 'SELECT id_event, nom_activitee FROM event';
$resulat = $connection -> query($event);
$tab_event = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_event = count($tab_event);

if(!isset($_POST['blbl'])){
  echo "<script> function Redirection(){
    document.location.href='../connexion.php?erreur=2';
  }
  Redirection()
  </script>";
}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>INTERCULTURAL | Event modification </title>
  <link rel="stylesheet" href="../css/formulaire.css">
  <script src="script.js"></script>
</head>
<body> 

<?php include 'header_admin.php';?> 

  <div class="titre">
    <h1>Choix de l'event</h1>
  </div>

<div>
  <p>Pour modifier un evénement, il vous suffit de selectionner celui que vous souhaitez : </p>
    <form method="POST" action="admin.php">
     
        <?php 
          for($i = 0; $i < $nbr_event; $i++){
        ?>
        <div>
          <form method="POST" action='admin_event_modif.php?id=<?php echo $tab_event[$i]['id_event'];?>'>
            <input type="submit" value="<?php echo $tab_event[$i]['nom_activitee'];?>">
            <input type="hidden" name="blbl" value="<?php echo $tab_event[$i]['id_event'];?>">
          </form> 
        </div>
        <?php 
          }
        ?>
    </form>
</div>

</body>
</html>