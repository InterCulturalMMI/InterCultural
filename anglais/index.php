<?php 

include("../config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

// pour édition 2023 (écrit a droite en haut) --> version 1
$annee = 'SELECT annee FROM edition WHERE id_edition = 1';
$resulat = $connection -> query($annee);
$tab_annee = $resulat -> fetch();
$resulat -> closeCursor();

// liens necessaire au carousel 
$nom_pays = 'SELECT pays.nom_pays_en, pays.id_pays, UPPER(pays.nom_monument_principal_en), image.url FROM image, pays, edition, pays_edition WHERE edition.id_edition = 1 AND (edition.id_edition = pays_edition.id_edition AND pays_edition.id_pays = pays.id_pays) AND pays.id_image_drap = image.id_image';
$resulat = $connection -> query($nom_pays);
$tab_pays = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_pays = count($tab_pays);

$image_carousel = 'SELECT image.url_en FROM image, pays WHERE image.id_image = pays.id_image_car';
$resulat = $connection -> query($image_carousel);
$tab_car = $resulat -> fetchAll();
$resulat -> closeCursor();

// liens images du carousel
$image_carousel = 'SELECT image.url_en FROM pays, image WHERE image.id_image = pays.id_image_ban';
$resulat = $connection -> query($image_carousel);
$tab_carousel = $resulat -> fetch();
$resulat -> closeCursor();
$nbr_carousel = count($tab_pays);
?>


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL | Accueil</title>
  <link rel="icon" href="../img/favicon.png" />
  <link rel="stylesheet" href="../css/accueil.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
  <script src="../js/accueil.js"></script>
</head>

<body>

<?php include 'header_footer/header.php';?> 

<div class="imgFond">

<div class="texteBannière"><h1>INTERCULTURAL AN EVENT THAT WILL MAKE YOU TRAVEL</h1></div>

  <div class="edition">

    <p class="bold">
      EDITION 
      <?php  
        echo $tab_annee[0];
      ?> 
      &nbsp;
    </p>

    <p class="fin">
      - LE PUY EN VELAY
    </p>

  </div>
</div>

<div class="barreSwipe">
  <a class="boutonSwipe" href="#contenu" id="contenu">
    <div>
      <p>+ INFOS</p>
    </div> 
  </a>
</div>

<div class="containerCestQuoi">

  <div class="cestQuoi">

    <div class="photoCestQuoi">
    </div>

    <div class="cestQuoiParagraph">
      <h2>WHAT IS THAT ?</h2><br>
      <p><strong>INTERCULTURAL</strong> is a unique exhibition. Every <strong>5 years</strong> we invite you to discover the culture of <strong>5 countries</strong> through areas distributed in <strong>the city of Puy en Velay in France</strong>.<br>On each zone you will be immersed in the universe of a country recreated from scratch. You will mainly be able to observe <strong>a reduced-size reconstruction of a monument.</strong></p>

    </div>
  </div>
</div>

<div class="expo">
  <img src="../img/fleche_gauche.png"></img>
  <h2><strong>DISCOVER EXPOSITIONS</strong></h2>
  <img src="../img/fleche_droite.png"></img>
</div>

<div class="containerCarrousel">

  <div class="cinqPays">
    <p class="bold">
        5 &nbsp;
      </p>

      <p class="fin">
        COUNTRIES - 
      </p>

      <p class="bold">
      &nbsp; 5 &nbsp;
      </p>

      <p class="fin">
        CULTURES
      </p>
  </div>

  <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <?php 
        for ($i = 0; $i < $nbr_pays; $i++){
        ?>
        <div class="swiper-slide">
          <div class="containerSlide">
            <div class="containerImg">
              <img src="<?php echo $tab_car[$i]['url_en'];?>"></img>
            </div>
            <div class="containerBarrePays">
              <div class="containerDrapeauText">
                <div class="drapeauPays"><img src="<?php echo $tab_pays[$i]['url_en'];?>"></img></div>
                <div class="textePays"><p><strong><?php echo $tab_pays[$i]['nom_pays_en'];?></strong> - <?php echo $tab_pays[$i]['UPPER(pays.nom_monument_principal_en)'];?></p></div>
            </div>
            <div class="containerBouton">
              <div class="bouton">
                <a href="pays.php?id=<?php echo $tab_pays[$i]['id_pays'] ;?>">
                  <p class="bold">
                    DISCOVER
                  </p>
                </a>
              </div>
            </div>     
          </div>
        </div>
      </div>
      <?php
        }
      ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="../js/accueil.js"></script>
</div>

<div class="containerAlea">
  <div class="alea">
    <div class="textAlea">
      <p>IF YOU <strong>CAN'T MAKE YOUR CHOICE</strong></p>
    </div>

    <div class="boutonAlea">
      <p>CLICK HERE</p>
      
      <div class="iconAlea">
        <!-- A FAIRE VERIFIER, PAS SURE QUE CA MARCHE commande aleatoir entre id=0 et id= nbr de pays present dans nav-->
        <a href="pays.php?id=<?php echo $tab_nav[rand(0, $nbr_element_nav)]['id_pays'] ;?>"><img src="../img/aleatoire.png"></img></a>
      </div>
    </div>
  </div>
</div>

<div class="containerOu">

  <div class="ou">

    <div class="mapOu">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45117.3225289944!2d3.86229825241591!3d45.02832241121491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5fa4041a0c829%3A0x4093cafcbe7fa70!2s43000%20Le%20Puy-en-Velay!5e0!3m2!1sfr!2sfr!4v1666709701765!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="ouParagraph">
      <h2>WHERE IS THE EVENT ?</h2><br>
      <p><strong>INTERCULTURAL</strong> takes place <strong>in the town of Le Puy en Velay</strong> in Auvergne, France. A city known for its manufacture of <strong>lace</strong> from Le Puy, the cultivation of <strong>green lentils</strong> from Le Puy and the production of <strong>verbena</strong> from Le Velay. It is also known for being the start of the <strong>Via Podiensis, one of the four French Compostela routes.</strong></p>

    </div>
  </div>
</div>

<?php include 'header_footer/footer.html';?> 

</body>
</html>
