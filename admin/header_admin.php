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
        <a href="../index.php">
          <img src="../img/logo.png"></img>
        </a>
      </div>

      <div class="containerBoutons">

          <div class="bouton">
            <a href="admin.php">
              <p>
                ACCUEIL
              </p>
            </a>
          </div>

      <ul class="listePays">

        <li>
          <div class="boutonPays">
            <a href="admin_event.php">
              <p>
                AJOUTER
              </p>
            </a>
          </div>
        </li>
      </ul>

          <div class="bouton">
            <a href="admin_event_delete.php">
              <p id="reservation">
                SUPPRIMER
              </p>
            </a>
          </div>
        
      </div>
    </div>
</nav>