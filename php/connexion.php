<?php

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

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
  <title>Titre de la page</title>
  <link rel="stylesheet" href="../css/formulaire.css">
  <script src="script.js"></script>
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
    <p> Pas de comptes ? <a href="inscription.php">Cliquez-ici</a></p>
  </div>

<?php

$etat=false;

if(isset($_POST['connec'])){

  $pseudo = $_POST['pseudo']; 
  $mdp = $_POST['mdp'];

  for($i=0; $i<$compteur; $i++){
    if ($mdp == $tab_pays[$i]['mdp_user'] && $pseudo == $tab_pays[$i]['pseudo_user']) {
      header('location:admin.php');
    }
    else {
      echo '<script type="text/JavaScript"> alert("Erreur de mots de passe ou identifiants !"); </script>';
    }
  }

}


?>

</body>
</html>