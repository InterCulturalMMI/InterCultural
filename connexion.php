<?php

include("config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

$utilisateurs = 'SELECT * FROM utilisateurs';
$resulat = $connection -> query($utilisateurs);
$tab_admin = $resulat -> fetchAll();
$resulat -> closeCursor();

$compteur = count($tab_admin);
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>INTERCULTURAL | Connexion </title>
  <link rel="stylesheet" href="css/formulaire.css">
  <script src="script.js"></script>
</head>
<body>
  <div class="titre">
    <h1> Connexion </h1>
  </div>

  <?php //message d'erreur en cas de tentatives de connexion infructrueuses
    if (isset($_GET['erreur'])) {
      if ($_GET['erreur']==1) {
        echo '<div>Identifiant ou mot de passe erroné</div>';
      }
      if ($_GET['erreur']==2) {
          echo '<div>Pour accéder au côté admin de la force, il vous faut vous connecter</div>';
      }
    }
  ?>

  <div class="global">
    <form method="POST" action="admin/admin.php">
      <p>
        <label for="id">Pseudonyme</label>
      </p>
      <p>
        <select class="champs" name="id">
        <?php 
          for($i = 0; $i < $compteur; $i++){
        ?>
        <option value="<?php echo $tab_admin[$i]['id_user'];?>"><?php echo $tab_admin[$i]['pseudo_user'];?></option>
        <?php 
         }
        ?>
        </select>
      </p>
      <label for="name" class="label">Mot de passe</label></br>
      <input type="password" class="champs" id="mdp" name="mdp" placeholder="Mot de passe.."><br><br> 
      <input type="submit" class="boutt" name="connec" value="Connexion">
    </form>
  </div>
  
  <div class="lien">
    <p> Pas de compte ? <a href="inscription.php">Cliquez-ici</a></p>
  </div>

</body>
</html>