<?php

include("../config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

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
          <form method="POST" action="admin.php">
            <div>
              <input type="submit" value="ACCUEIL">
              <input type="hidden" name="blbl" value="0">
            </div>
          </form>
        </div>

        <ul class="listePays">
          <li>
            <div class="boutonPays">
              <form method="POST" action="admin_event.php">
                <div>
                  <input type="submit" value="AJOUTER">
                  <input type="hidden" name="blbl" value="1">
                </div>
              </form>
            </div>
          </li>
        </ul>

        <div class="bouton">
          <form method="POST" action="admin_event_delete.php">
            <div>
              <input type="submit" value="SUPPRIMER">
              <input type="hidden" name="blbl" value="2">
            </div>
          </form>
        </div>
        
      </div>
    </div>
</nav>