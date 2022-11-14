<?php
include("../config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

//Chose qui va bouger --> c'est la requete pour LE HEADER qui passera en fonction AVEC le HEADER
$nav = 'SELECT pays.id_pays, pays.nom_pays_en FROM pays, edition WHERE id_edition = 1';
$resulat = $connection -> query($nav);
$tab_nav = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_element_nav = count($tab_nav);

?>

<nav class="containerBar">
    <div class="fondBar">
      <div class="logo">
        <a href="index.php">
          <img src="../img/logo.webp" alt="Logo InterCultural"></img>
        </a>
      </div>

      <div class="containerBoutons">

          <div class="bouton">
            <a href="index.php">
              <p>
                HOME
              </p>
            </a>
          </div>

      <ul class="listePays">

        <li>
          <div class="boutonPays">
            <a>
              <p>
                EXPOSITIONS
              </p>
            </a>
          </div>
          <div class="containerListElements">
            <ul>
              <?php
                for($nav = 0; $nav < $nbr_element_nav; $nav++){
              ?>
              <li class="pays"><a href="pays.php?id=<?php echo $tab_nav[$nav]['id_pays'];?>" class="listeElement"><?php echo $tab_nav[$nav]['nom_pays_en'];?></a></li>
              <?php
                }
              ?>
            </ul>
          </div>
          
        </li>
      </ul>


      <ul class="listePays">

        <li>
          <div class="boutonPays">
            <a>
              <p>
                RESERVE
              </p>
            </a>
          </div>
          <div class="containerListElements">
            <ul>
              <?php
                for($nav = 0; $nav < $nbr_element_nav; $nav++){
              ?>
              <li class="pays"><a href="reservation.php?id=<?php echo $tab_nav[$nav]['id_pays'];?>" class="listeElement"><?php echo $tab_nav[$nav]['nom_pays_en'];?></a></li>
              <?php
                }
              ?>
            </ul>
          </div>
          
        </li>
      </ul>

          <div class="boutonLangue">
            <a href="../index.php">
              <img src="../img/francais.webp" alt="Drapeau de changement de langue"></img>
            </a>
          </div>
        
      </div>
    </div>
</nav>