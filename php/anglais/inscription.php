<?php

include("./config/config.php") ;
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
  <title>INTERCULTURAL | Inscription</title>
  <link rel="stylesheet" href="../css/formulaire.css">
  <script src="script.js"></script>
</head>
<body>
  <div class="titre">
    <h1> Inscription </h1>
  </div>

  <div class="global">
    <form method="POST" action="inscription.php">
      <label for="pseudo" class="label">Pseudonyme</label><br>
      <input type="pseudo" class="champs" id="pseudo" name="pseudo" placeholder="Pseudonyme.."><br>
      <label for="name" class="label">Mot de passe</label></br>
      <input type="password" class="champs" id="mdp" name="mdp" placeholder="Mot de passe.."><br><br> 
      <input type="submit" class="boutt" name="connec" value="Connexion">
    </form>
  </div>

  <div class="lien">
    <p> Déjà un compte ? <a href="connexion.php">Cliquez-ici</a></p>
  </div>

</body>

<?php

if(isset($_POST['connec'])){
    $pseudo = $_POST['pseudo']; 
    $mdp = $_POST['mdp'];

    echo $pseudo;
    echo $mdp;

    $etat=false;

    for($i=0 ;$i<$compteur ;$i++){
        if ($pseudo == $tab_pays[$i]['pseudo_user']){
            $etat=true;
            echo '<script type="text/JavaScript"> alert("Pseudonyme déjà existant !"); </script>';
        }
        if ($etat==false){
            header('location:connexion.php');
        }
    }

    if ($etat==false){
        $insertion="INSERT INTO utilisateurs (pseudo_user, mdp_user) VALUES ('$pseudo', '$mdp');";
        $resultat = $connection->query($insertion);
        $resultat->closeCursor();
    }
}
?>