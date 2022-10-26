<?php 

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

//Chose qui va bouger --> c'est la requete pour LE HEADER qui passera en fonction AVEC le HEADER
$nav = 'SELECT pays.id_pays, pays.nom_pays FROM pays, edition WHERE id_edition = 1';
$resulat = $connection -> query($nav);
$tab_nav = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_element_nav = count($tab_nav);

// pour édition 2023 (écrit a droite en haut) --> version 1
$annee = 'SELECT annee FROM edition WHERE id_edition = 1';
$resulat = $connection -> query($annee);
$tab_annee = $resulat -> fetch();
$resulat -> closeCursor();

// liens necessaire au carousel 
$nom_pays = 'SELECT pays.nom_pays, pays.id_pays, UPPER(pays.nom_monument_principal), image.url FROM image, pays, edition, pays_edition WHERE edition.id_edition = 1 AND (edition.id_edition = pays_edition.id_edition AND pays_edition.id_pays = pays.id_pays) AND pays.id_image_drap = image.id_image';
$resulat = $connection -> query($nom_pays);
$tab_pays = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_pays = count($tab_pays);

$image_carousel = 'SELECT image.url FROM image, pays WHERE image.id_image = pays.id_image_car';
$resulat = $connection -> query($image_carousel);
$tab_car = $resulat -> fetchAll();
$resulat -> closeCursor();

// liens images du carousel
$image_carousel = 'SELECT image.url FROM pays, image WHERE image.id_image = pays.id_image_ban';
$resulat = $connection -> query($image_carousel);
$tab_carousel = $resulat -> fetch();
$resulat -> closeCursor();
$nbr_carousel = count($tab_pays);

print_r($tab_car);

?>


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL </title>
  <link rel="icon" href="../img/favicon.png" />
  <link rel="stylesheet" href="../css/accueil.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/><script src="../js/accueil.js"></script>
</head>

<body>

<?php include './header_footer/header.html';?> 

<div class="imgFond">

<div class="texteBannière"><h1>INTERCULTURAL UN ÉVENEMENT QUI VA VOUS FAIRE VOYAGER</h1></div>

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

<div class="containerCestQuoi">

  <div class="cestQuoi">

    <div class="photoCestQuoi">
    </div>

    <div class="cestQuoiParagraph">
      <h2>QU'EST CE QUE C'EST ?</h2><br>
      <p><strong>INTERCULTURAL</strong> est une exposition inédite. Tout les <strong>5 ans</strong> nous vous invitons à découvrir la culture de <strong>5 pays</strong> à travers des zones réparties <strong>dans la ville du Puy en Velay en France.</strong></p>

      <div class="barre">
      </div>

    </div>
  </div>
</div>

<div class="containerCarrousel">

  <div class="cinqPays">
    <p class="bold">
        5 &nbsp;
      </p>

      <p class="fin">
        PAYS - 
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
              <img src="<?php echo $tab_car[$i]['url'];?>"></img>
            </div>
            <div class="containerBarrePays">
              <div class="containerDrapeauText">
                <div class="drapeauPays1"><img src="<?php echo $tab_pays[$i]['url'];?>"></img></div>
                <div class="textePays1"><p><strong><?php echo $tab_pays[$i]['nom_pays'];?></strong> - <?php echo $tab_pays[$i]['UPPER(pays.nom_monument_principal)'];?></p></div>
              </div>
              <div class="containerBouton">
                <div class="bouton">
                  <a href="pays.php?id=<?php echo $tab_pays[$i]['id_pays'] ;?>">
                    <p class="bold">
                      DÉCOUVRIR
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
        
        <div class="swiper-slide"><img src="../img/2.jpg"></img></div>
        <div class="swiper-slide"><img src="../img/3.jpg"></img></div>
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
      <p>SI VOUS <strong>N'ARRIVEZ PAS</strong> À FAIRE <strong>VOTRE CHOIX</strong></p>
    </div>

    <div class="boutonAlea">
      <p>CLIQUEZ ICI</p>
      
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
      <h2>OÙ SE PASSE L'ÉVENEMENT ?</h2><br>
      <p><strong>INTERCULTURAL</strong> se déroule <strong>dans la ville du Puy en Velay</strong> en Auvergne en France. Une ville connué pour sa fabrication de la <strong>dentelle</strong> du Puy, la culture de la <strong>lentille verte</strong> du Puy et la production de <strong>verveine</strong> du Velay. Elle est aussi connue pour être le départ de la <strong>Via Podiensis, un des quatre chemins de Compostelle français.</strong></p>

      <div class="barre">
      </div>

    </div>
  </div>
</div>

<?php include './header_footer/footer.html';?> 

</body>
</html>
