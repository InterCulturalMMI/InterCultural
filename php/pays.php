<?php 

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_test', 'root', '');

//information propre a pays, sans clefs etrangères
$nom_pays = 'SELECT pays.nom_pays, pays.id_pays, pays.descriptif_monument, pays.descriptif_pays FROM pays WHERE pays.id_pays ='. $_GET['id'];
$resulat = $connection -> query($nom_pays);
$tab_pays = $resulat -> fetch();
$resulat -> closeCursor();
//$nbr_pays = count($tab_pays);

//images de pays avec table intermediaire
$image_monument = 'SELECT image.url, pays.id_pays, image.id_image FROM pays, image, pays_image WHERE pays.id_pays = pays_image.id_pays AND pays_image.id_image = image.id_image AND pays.id_pays ='. $_GET['id'];
$resulat = $connection -> query($image_monument);
$tab_image_monument = $resulat -> fetch();
$resulat -> closeCursor();

//image avec clée etrangère
$image_drap_ban = 'SELECT image.url, pays.id_image_ban, image.id_image FROM pays, image WHERE pays.id_image_ban = image.id_image AND pays.id_pays ='. $_GET['id'];
$resulat = $connection -> query($image_drap_ban);
$tab_image_ban = $resulat -> fetch();
$resulat -> closeCursor();
print_r($tab_image_ban);
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL </title>
  <link rel="stylesheet" href="../css/pays.css">
  <script src="../js/pays.js"></script>
</head>
<body>
  <!-- <nav class="containerBar">
      <div class="fondBar">
        <div class="logo">
          <a href="#top">
            <img src="../img/logo.png"></img>
          </a>
        </div>

        <div class="containerBoutons">

          <div class="bouton">
            <a href="#top">
              <p>
                ACCUEIL
              </p>
            </a>
          </div>

          <div class="bouton">
            <a href="#pays">
              <p>
                PAYS
              </p>
            </a>
          </div>

          <div class="bouton">
            <a href="./reservation.php">
              <p id="reservation">
                RESERVER
              </p>
            </a>
          </div>

        </div>
      </div>
  </nav> -->

  <div class="titre" id="titre1">
    <h1> 
      <?php  
        echo $tab_pays["nom_pays"];
      ?> 
    </h1>
  </div>

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
      <div class="un"><img src="../img/illu_inde_1.png"></div>
      <div class="deux"><img src="../img/illu_inde_2.png"></div>
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

  <div class="activites">
    <div class="texte_activites">
      <p>
        Samedi soir, aux alentours de la Place du Breuil à 19h, venez célébrer la Holi, tradition du passage au printemps en Inde.
        Achetez votre peinture et lancez-là à cette occasion pour créer un énorme nuage coloré et ainsi donner au Puy la couleur de
        l’Inde. Ne venez pas avec vos plus beaux habits, vous finirez probablement couvert de poudre de peinture ! Retrouvez tout
        le week-end sur la place du Breuil, tout un ensemble d'activités en rapport avec la culture indienne, telles que la tapisserie,
        des danses ou encore la découverte de la cuisine indienne et de ses épices si particuliers.
      </p>
    </div>
    <div class="image_activites">
      <img src="../img/event_inde.png"></img>
    </div>
  </div>

  <div class="secondaire">
    <div class="act1">
      <div><p><strong> Nom activité </strong></p></div>
      <div><p> Desc Rapide </p></div>
      <div><p> Places </p></div>
      <div><p> Tarifs </p></div>
    </div>
    <div class="act1">
      <div><p><strong> Nom activité </strong></p></div>
      <div><p> Desc Rapide </p></div>
      <div><p> Places </p></div>
      <div><p> Tarifs </p></div>
    </div>
  </div>

  <div class="reserv">
    <form action="reservation.php">
      <input type="submit" value="Réservez dès maintenant" />
    </form>
  </div>

    <div class="titre"><h1> EN ESPERANT VOUS RETROUVER </h1></div>

  <footer>
      <div class="gauche">
        <p> © Copyrights </p>
      </div>
      <div class="centre">
        <img src="../img/gros_blanc.png" alt="logo">
      </div>
      <div class="droite">
        <p> All Rights Reserved </p>
    </div>
  </footer>
</body>
</html>