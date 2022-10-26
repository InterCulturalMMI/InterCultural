<?php

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

$utilisateurs = 'SELECT utilisateurs.pseudo_user, utilisateurs.mdp_user FROM utilisateurs';
$resulat = $connection -> query($utilisateurs);
$tab_pays = $resulat -> fetch();
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
  <div class="global">
    <form method="POST" action="form2.php">
      <label for="pseudo" class="label">Pseudonyme</label><br>
      <input type="pseudo" class="champs" id="pseudo" name="pseudo" placeholder="Pseudonyme"><br>
      <label for="name" class="label">Mot de passe</label></br>
      <input type="password" class="champs" id="mdp" name="mdp" placeholder="Mot de passe"><br><br> 
      <input type="submit" class="boutt" name="connec" value="Connexion">
    </form>
  </div>

<?php

$etat=false;

if(isset($_POST['pseudo'])){

  $pseudo = $_POST['pseudo']; 
  $mdp = $_POST['mdp'];

  for($i=0; $i<$compteur; $i++){
    if ($mdp == $tab_pays[$i]['mdp_user'] and $pseudo == $tab_pays[$i]['pseudo_user']) {
      header('location:form2.php');
    }
    else {
      header('location:form3.php');
    }
  }
}

?>

</body>
</html>