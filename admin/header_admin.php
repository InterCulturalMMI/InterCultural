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
      <form method="POST" action="admin.php">
        <div>
          <input type="submit" value="ACCUEIL" class="bouton">
          <input type="hidden" name="blbl" value="1000">
        </div>
      </form>

      <form method="POST" action="admin_event.php">
        <div>
          <input type="submit" value="AJOUTER"  class="bouton">
          <input type="hidden" name="blbl" value="2000">
        </div>
      </form>

      <form method="POST" action="admin_event_modification.php">
        <div>
          <input type="submit" value="MODIFIER"  class="bouton">
          <input type="hidden" name="blbl" value="3000">
        </div>
      </form>

      <form method="POST" action="admin_event_delete.php">
        <div>
          <input type="submit" value="SUPPRIMER"  class="bouton">
          <input type="hidden" name="blbl" value="4000">
        </div>
      </form>
    </div>
  </div>
</nav>