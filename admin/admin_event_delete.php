<?php 

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

$evenement = 'SELECT event.id_event, event.nom_activitee FROM event';
$resulat = $connection -> query($evenement);
$tab_evenement = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_evenement = count($tab_evenement);

$verif_doublon_img = 'SELECT image.alt FROM image';
$resulat = $connection -> query($verif_doublon_img);
$tab_doublon_img = $resulat -> fetchAll();
$resulat -> closeCursor();
//print_r($tab_doublon_img);

include "fiche_classes_poo.php";

if(isset($_POST['supprimer'])){

  $supprimer_event = 'SELECT event.*, event.id_image FROM event WHERE event.id_event = '.$_POST['id_event'];
  $resulat = $connection -> query($supprimer_event);
  $tab_supprimer_event = $resulat -> fetch();
  $resulat -> closeCursor();

  $supprimer_image = 'SELECT image.* FROM image WHERE image.id_image = '.$tab_supprimer_event['id_image'];
  $resulat = $connection -> query($supprimer_image);
  $tab_supprimer_image = $resulat -> fetch();
  $resulat -> closeCursor();

  //print_r($tab_supprimer_event['id_image']);
  //print_r($tab_supprimer_image);
  //print_r($tab_supprimer_event);

  $event = new Event($tab_supprimer_event['id_pays'], $tab_supprimer_event['id_image'], $tab_supprimer_event['nom_activitee'], $tab_supprimer_event['descriptif'], $tab_supprimer_event['horraires'], $tab_supprimer_event['date_event'], $tab_supprimer_event['lieu'], $tab_supprimer_event['prix_adulte'], $tab_supprimer_event['prix_enfant'], $tab_supprimer_event['payant'], $tab_supprimer_event['nbr_place_total'], $tab_supprimer_event['nbr_place_dispo'], $tab_supprimer_event['main_activitee']);

  $image = new Image($tab_supprimer_image['nom_image'], $tab_supprimer_image['alt'], $tab_supprimer_image['type'], $tab_supprimer_image['url']);

  $event-> suppressionEBDD($tab_supprimer_event['id_event']);
  $image->suppressionIBDD($tab_supprimer_event['id_image']);


 

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/formulaire.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INTERCULTURAL | Admin - Event suppression</title>
</head>
<body>

<?php include 'header_admin.php';?> 
  
  <div class="titre">
    <h1> Suppression  d'un évènement</h1>
  </div>
  
  <form action="admin_event_delete.php" method="POST"name="lilili">
      
      <p>
        <select name="id_event" class="champs">
          <?php 
            for($i = 0; $i < $nbr_evenement; $i++){
          ?>
            <option value="<?php echo $tab_evenement[$i]['id_event'];?>"><?php echo $tab_evenement[$i]['nom_activitee'];?></option>
          <?php 
            }
          ?>
        </select>
      </p>

      <input class="boutt" type="submit" name="supprimer" value="Supprimer">


  </form>



</body>
</html>