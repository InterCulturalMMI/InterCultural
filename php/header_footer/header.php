<?php
$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

//Chose qui va bouger --> c'est la requete pour LE HEADER qui passera en fonction AVEC le HEADER
$nav = 'SELECT pays.id_pays, pays.nom_pays FROM pays, edition WHERE id_edition = 1';
$resulat = $connection -> query($nav);
$tab_nav = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_element_nav = count($tab_nav);

?>

<nav class="containerBar">
    <div class="fondBar">
      <div class="logo">
        <a href="./index.php">
          <img src="../img/logo.png"></img>
        </a>
      </div>

      <div class="containerBoutons">

          <div class="bouton">
            <a href="./index.php">
              <p>
                ACCUEIL
              </p>
            </a>
          </div>

      <ul class="listePays">

        <li>
          <div class="boutonPays">
            <a>
              <p>
                PAYS
              </p>
            </a>
          </div>
          <div class="containerListElements">
            <ul>
              <?php
                for($nav = 0; $nav < $nbr_element_nav; $nav++){
              ?>
              <li class="pays"><a href="pays.php?id=<?php echo $tab_nav[$nav]['id_pays'];?>" class="listeElement"><?php echo $tab_nav[$nav]['nom_pays'];?></a></li>
              <?php
                }
              ?>
            </ul>
          </div>
          
        </li>
      </ul>

          <div class="bouton">
            <a href="./reservation.php">
              <p id="reservation">
                RESERVER
              </p>
            </a>
          </div>

          <div class="boutonLangue">
            <a href="./reservation.php">
              <img src="../img/anglais.png"></img>
            </a>
          </div>
        
      </div>
    </div>
</nav>