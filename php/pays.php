<?php 

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

//information propre a pays, sans clefs etrangères
$nom_pays = 'SELECT pays.nom_pays, pays.id_pays, pays.descriptif_monument, pays.descriptif_pays FROM pays WHERE pays.id_pays ='. $_GET['id'];
$resulat = $connection -> query($nom_pays);
$tab_pays = $resulat -> fetch();
$resulat -> closeCursor();

//images de pays avec table intermediaire
$image_monument = 'SELECT image.url, pays.id_pays, image.id_image FROM pays, image, pays_image WHERE pays.id_pays = pays_image.id_pays AND pays_image.id_image = image.id_image AND pays.id_pays ='. $_GET['id'];
$resulat = $connection -> query($image_monument);
$tab_image_monument = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_image = count($tab_image_monument);

//image avec clée etrangère
$image_drap_ban = 'SELECT image.url, pays.id_image_ban, image.id_image FROM pays, image WHERE pays.id_image_ban = image.id_image AND pays.id_pays ='. $_GET['id'];
$resulat = $connection -> query($image_drap_ban);
$tab_image_ban = $resulat -> fetch();
$resulat -> closeCursor();

//image et descriptif de l'acitivite principale (nom reccuperer mais pas attribué : /\ prevoir un emplacement pour)
$main_activitee = 'SELECT event.id_event, event.descriptif, image.url, pays.id_pays, event.main_activitee, event.nom_activitee FROM event, pays, image WHERE event.main_activitee = 1 AND image.id_image = event.id_image AND pays.id_pays = event.id_pays AND pays.id_pays ='. $_GET['id'];
$resulat = $connection -> query($main_activitee);
$tab_event = $resulat -> fetch();
$resulat -> closeCursor();

$nav = 'SELECT pays.id_pays, pays.nom_pays FROM pays, edition WHERE id_edition = 1';
$resulat = $connection -> query($nav);
$tab_nav = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_element_nav = count($tab_nav);

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL | <?php echo $tab_pays["nom_pays"] ?></title>
  <link rel="stylesheet" href="../css/pays.css">
  <script src="../js/pays.js"></script>
</head>
<body>
<nav class="containerBar">

    <?php include './header_footer/header.php';?> 

    <div class="titre" id="titre1">
      <h1> 
        <?php  
          echo $tab_pays["nom_pays"];
        ?> 
      </h1>
    </div>
  </nav>

  <div class="banner">
    <img src="<?php  echo $tab_image_ban["url"]; ?> " alt="Banniere du pays" style="width:100%;"></img>
    <div class="texteimg"><p> Ouvrez-vous à la culture </p></div>
  </div>

  <nav class="navpage">
    <div class="zoom"><a href="#intro1">Introduction</a></div>
    <div class="zoom"><a href="#monumentsid">Monuments</a></div>
    <div class="zoom"><a href="#activid">Activités</a></div>
    <div class="zoom"><a href="#">Inscription</a></div>
</nav>

  <div class="intro" id="intro1">
    <p>
      <?php  
        echo $tab_pays["descriptif_pays"];
      ?> 
    </p>
  </div>

  <div class="monument">

  <div class="titre" id="monumentsid"><h1  style="color:white;"> MONUMENTS </h1></div>

    <div class="images_monument">
      <div class="un"><img src="<?php  echo $tab_image_monument[0]["url"]; ?>"></div>
      <div class="deux"><img src="<?php  echo $tab_image_monument[1]["url"]; ?>"></div>
    </div>

    <div class="intro" id="monum">
      <p  style="color:white;">
        <?php  
          echo $tab_pays["descriptif_monument"];
        ?> 
      </p>
    </div>
  </div>

  <div class="titre" id="activid"><h1> ACTIVITÉS </h1></div>

  <div class="containerCestQuoi">
  <div class="cestQuoi">
    <div class="photoCestQuoi">
      <img src="<?php  echo $tab_event["url"]; ?>"></img>
    </div>
    <div class="cestQuoiParagraph">
      <h2><?php  
            echo $tab_event["nom_activitee"];
          ?> </h2><br>
      <p><?php  
            echo $tab_event["descriptif"];
          ?> </p>
    </div>
  </div>
</div>

  <div class="reserv">
    <a href="reservation.php?id=<?php echo $_GET['id'];?>"> Reservez vos places pour les activités ! </a>
  </div>

  <?php include './header_footer/footer.html';?> 

</body>
</html>