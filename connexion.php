<?php

include("config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

$utilisateurs = 'SELECT pseudo_user, mdp_user FROM utilisateurs';
$resulat = $connection -> query($utilisateurs);
$tab_pays = $resulat -> fetchAll();
$resulat -> closeCursor();

$compteur = count($tab_pays);
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>INTERCULTURAL | Connexion </title>
  <link rel="stylesheet" href="css/formulaire.css">

  <meta name="description" content="Cette page vous permettra de vous connecter à votre compte, si vous êtes un administrateur !">
  <meta name="author" content="InterCultural Evenement">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="apple-touch-icon" href="img/favicon.png"/>
  <link rel="icon" href="img/favicon.png" />
</head>
<body>
  <div class="titre">
    <h1> Connexion </h1>
  </div>

  <div class="global">
    <form method="POST" action="connexion.php">
      <label for="pseudo" class="label">Pseudonyme</label><br>
      <input type="pseudo" class="champs" id="pseudo" name="pseudo" placeholder="Pseudonyme.."><br>
      <label for="name" class="label">Mot de passe</label></br>
      <input type="password" class="champs" id="mdp" name="mdp" placeholder="Mot de passe.."><br><br> 
      <input type="submit" class="boutt" name="connec" value="Connexion">
    </form>
  </div>
  
  <div class="lien">
    <p> Pas de compte ? <a href="inscription.php">Cliquez-ici</a></p>
  </div>

<?php

$etat=false;

if(isset($_POST['connec'])){

  $pseudo = $_POST['pseudo']; 
  $mdp = $_POST['mdp'];

  for($i=0; $i<$compteur; $i++){
    if ($mdp == $tab_pays[$i]['mdp_user'] && $pseudo == $tab_pays[$i]['pseudo_user']) {
      header('location:admin/admin.php');
    }
    else {
      echo '<script type="text/JavaScript"> alert("Erreur de mots de passe ou identifiants !"); </script>';
    }
  }

}


?>

</body>
</html>