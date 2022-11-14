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

if(isset($_POST['id'])){
    //echo $_POST["id"];
  $id = $_POST['id']-1;
  $mdp = $_POST['mdp'];

  if ($mdp == $tab_pays[$id]['mdp_user']) {

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>INTERCULTURAL | Admin - accueil</title>
  <link rel="stylesheet" href="../css/formulaire.css">
  <script src="script.js"></script>
</head>
<body>

<?php include 'header_admin.php';?> 

  <div class="titre">
    <h1>Administration du site web</h1>
  </div>

  <div class="global">
    <p>Bonjour, en tant qu'admin du site web de Intercultural, vous avez la possibilitée de créer, modifier ou de supprimer des évènements. Les modifications sont envoyées directement à la base de données ou est stocker le contenue de votre site. Tout changement sera donc instantanément visible sur le site web d'Intercultural. </p>
  </div>

  <?php
  }
  else {
    echo "<script> function Redirection(){
      document.location.href='../connexion.php?erreur=1';
    }
    Redirection()
    </script>";}
}

else{
  if(isset($_POST['blbl'])){

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>INTERCULTURAL | Admin - accueil</title>
  <link rel="stylesheet" href="../css/formulaire.css">
  <script src="script.js"></script>
</head>
<body>

<?php include 'header_admin.php';?> 

  <div class="titre">
    <h1>Administration du site web</h1>
  </div>

   <div class="global">
    <p>Bonjour, en tant qu'admin du site web de Intercultural, vous avez la possibilitée de créer, modifier ou de supprimer des évènements. Les modifications sont envoyées directement à la base de données ou est stocker le contenue de votre site. Tout changement sera donc instantanément visible sur le site web d'Intercultural. </p>
  </div>

  <?php
  }
  else {
    echo "<script> function Redirection(){
      document.location.href='../connexion.php?erreur=1';
    }
    Redirection()
    </script>";}
}
?>


</div>
</body>