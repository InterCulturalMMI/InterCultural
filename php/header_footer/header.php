<nav class="containerBar">
    <div class="fondBar">
      <div class="logo">
        <a href="#top">
          <img src="../img/logo.png"></img>
        </a>
      </div>

      <div class="containerBoutons">

          <div class="bouton">
            <a href="../index.php">
              <p>
                ACCUEIL
              </p>
            </a>
          </div>

      <ul class="listePays">

        <li>
          <div class="boutonPays">
            <a href="../pays.php">
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
              <li><a href="pays.php?id=<?php echo $tab_nav[$nav]['id_pays'];?>" class="listeElement"><?php echo $tab_nav[$nav]['nom_pays'];?></a></li>
              <?php
                }
              ?>
            </ul>
          </div>
          
        </li>
      </ul>

          <div class="bouton">
            <a href="../reservation.php">
              <p id="reservation">
                RESERVER
              </p>
            </a>
          </div>
        
      </div>
    </div>
</nav>