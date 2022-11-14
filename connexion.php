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
		<title> INTERCULTURAL | Connexion</title>

		<meta name="description" content="InterCultural, un festival mélangeant culture et passion, dans lequel vous découvrirez nombre de cultures et d'activités liés !">
		<meta name="author" content="InterCultural Evenement">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="apple-touch-icon" href="img/favicon.webp"/>
		<link rel="icon" href="img/favicon.webp" />
		<link rel="stylesheet" href="css/formulaire.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
		<script src="js/accueil.js"></script>
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

<?php

$etat=false;

if(isset($_POST['connec'])){

  $pseudo = $_POST['pseudo']; 
  $mdp = $_POST['mdp'];

  for($i=0; $i<$compteur; $i++){
    if ($mdp == $tab_pays[$i]['mdp_user'] && $pseudo == $tab_pays[$i]['pseudo_user']) {
      header('location:admin/connect.php');
    }
    else {
      echo '<script type="text/JavaScript"> alert("Erreur de mots de passe ou identifiants !"); </script>';
    }
  }
}

?>

</body>
</html>