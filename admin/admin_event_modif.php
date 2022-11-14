<?php 

include("../config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

$pays = 'SELECT pays.id_pays, pays.nom_pays FROM pays';
$resulat = $connection -> query($pays);
$tab_pays = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_pays = count($tab_pays);

$ed = 'SELECT edition.id_edition FROM edition where edition.id_edition = 1';
$resulat = $connection -> query($ed);
$tab_ed = $resulat -> fetch();
$resulat -> closeCursor();

$verif_doublon_img = 'SELECT image.alt FROM image';
$resulat = $connection -> query($verif_doublon_img);
$tab_doublon_img = $resulat -> fetchAll();
$resulat -> closeCursor();


//_________________________________________________________________________________________________________
$reccup = 'SELECT event.* FROM event WHERE event.id_event='. $_GET['id'];
$resulat = $connection -> query($reccup);
$tab_event = $resulat -> fetch();
$resulat -> closeCursor();

print_r($tab_event);

$reccup = 'SELECT pays.id_pays, pays.nom_pays FROM pays WHERE pays.id_pays='. $tab_event['id_pays'];
$resulat = $connection -> query($reccup);
$tab_event_pays = $resulat -> fetch();
$resulat -> closeCursor();

print_r($tab_event_pays);
//_________________________________________________________________________________________________________

include "fiche_classes_poo.php";

// si l'utilisateur appuie sur ajout, on reccupere les données seulement si la balise alt n'as pas d'équivalent (pour éviter les doublons et faciliter la recherche de l'id de l'image)
if(isset($_POST['ajout'])){

  $horraire_null = $_POST['horraires'];

  if($horraire_null == '00:00:00'){
    $horraire_null == NULL;
  }

  $blblbl = $_POST['alt'];
  $temoin=False;

  for($i = 0; $i < count($tab_doublon_img); $i++){
    if ($blblbl == $tab_doublon_img[$i]["alt"]){ 
      $temoin=True;
    }
  }
  if ($temoin == false) {

    $p = 'SELECT id_pays, id_image_ban, id_image_car, id_image_drap, LOWER(pays.nom_pays), geoloc_long, geoloc_latt, descriptif_pays, descriptif_monument, nom_monument_principal, nom_monument_secondaire, nom_pays_en, descriptif_pays_en, descriptif_monument_en FROM pays WHERE id_pays =' .$_POST['id_pays'];
    $resulat = $connection -> query($p);
    $tab_p = $resulat -> fetch();
    $resulat -> closeCursor();
    $p_pays = new Pays($tab_ed[0], $tab_p[4], $tab_p[5], $tab_p[6], $tab_p[7], $tab_p[8], $tab_p[9] , $tab_p[10]);
    
      //['tmp_name'] et ['name'] --> appartient fonc php = inchangeable
    move_uploaded_file($_FILES['imagee']['tmp_name'], 'img/'.$_POST['type'].'_'.$tab_p[4].'_'. basename($_FILES['imagee']['name']));
    
    $image = new Image($_POST['nom_image'], $_POST['alt'], 'event','img/event_'.$tab_p[4].'_'.basename($_FILES['imagee']['name']), '../img/event_'.$tab_p[4].'_'.basename($_FILES['imagee']['name']));
    $image->ajoutiBDD();

    
    $id_image_envoyee = 'SELECT image.id_image FROM image WHERE image.alt = "'.$blblbl.'"  ';
    $resulat = $connection -> query($id_image_envoyee);
    $tab_id_image_envoyee = $resulat -> fetch();
    $resulat -> closeCursor();
    
    $event = $p_pays->ajoutEvent($tab_p[0], $tab_id_image_envoyee[0], $_POST['nom_activitee'], $_POST['descriptif'], $horraire_null, $_POST['date_event'], $_POST['lieu'], $_POST['prix_adulte'], $_POST['prix_enfant'] , $_POST['payant'], $_POST['nbr_place_total'], $_POST['nbr_place_dispo'], $_POST['main_activitee'], $_POST['nom_activitee_en'], $_POST['descriptif_en']);
  }
}

if(!isset($_POST['blbl'])){
  echo "<script> function Redirection(){
    document.location.href='../connexion.php?erreur=2';
  }
  Redirection()
  </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../css/formulaire.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="../js/admin.js"></script>
  <title>INTERCULTURAL | Admin - Event ajout</title>
</head>
<body>

<?php include 'header_admin.php';?> 

  <div class="titre">
    <h1> MODFICATION d'un évènement</h1>
  </div>

  <div class="">
    <form action="admin_event.php" method="POST" enctype="multipart/form-data" name="lalala">
  
          <p>
            <label for="id_pays">Pays : </label>
            <select class="champs" name="id_pays">
              <!-- <option value="<?php echo $tab_event_pays['id_pays'];?>"><<?php echo $tab_event_pays['nom_pays'];?></option> -->
            <?php 
              for($i = 0; $i < $nbr_pays; $i++){
                if($tab_pays[$i]['id_pays'] == $tab_event_pays['id_pays']){
                  ?>
                   <option selected="selected" value="<?php echo $tab_pays[$i]['id_pays'];?>"><?php echo $tab_pays[$i]['nom_pays'];?></option>
                <?php
                }
                else{
              ?>
              <option value="<?php echo $tab_pays[$i]['id_pays'];?>"><?php echo $tab_pays[$i]['nom_pays'];?></option>
            <?php 
              }
              }
            ?>
            </select>
          </p>

          <p>
            <label for="nom_activitee">Nom de l'évènement</label>
            <input type="text" name="nom_activitee" placeholder="Évènement" class="champs" value="<?php echo $tab_event['nom_activitee']; ?>" required>
          </p>

          <p>
            <label for="nom_activitee_en">Nom de l'évènement en Anglais</label>
            <input type="text" name="nom_activitee_en" placeholder="Event" class="champs" value="<?php echo $tab_event['nom_activitee_en']; ?>" required>
          </p>

          <p>
            <label for="descriptif">Descriptif de l'évènement</label>
            <input type="textarea" name="descriptif" placeholder="Description" class="champs" value="<?php echo $tab_event['descriptif']; ?>" required>
            <!-- <textarea placeholder="this text will show in the textarea"></textarea> -->
          </p>

          <p>
            <label for="descriptif_en">Descriptif de l'évènement en Anglais</label required>
            <input type="textarea" name="descriptif_en" placeholder="Description" class="champs" value="<?php echo $tab_event['descriptif_en']; ?>" required>
          </p>

          <p>
            <label for="horraires">Heure de l'évènement</label>
            <input type="time" name="horraires" class="champs" value="<?php echo $tab_event['horraires']; ?>">
          </p>

          <p>
            <label for="date_event">Date de l'évènement</label>
            <input id="date" type="date" name="date_event" class="champs" value="<?php echo $tab_event['date_event']; ?>">
          </p>

          <p>
            <label for="lieu">Emplacement de l'évènement</label>
            <input type="text" name="lieu" class="champs" value="<?php echo $tab_event['lieu']; ?>" required>
          </p>

          <p>
            <label for="main_activitee">Est-ce un événement principal ?</label>
            <p>
              <?php
                if($tab_event['main_activitee'] == 1){
              ?>
                  <label>Oui</label>
                  <input type='radio' name='main_activitee' value='1' class='check' checked>
                  </p>
                  <p>
                  <label>Non</label>
                  <input type='radio' name='main_activitee' value='0' class='check'>
                </p>
              <?php
                }
                else {
              ?>
                  <label>Oui</label>
                  <input type='radio' name='main_activitee' value='1' class='check'>
                  </p>
                  <p>
                  <label>Non</label>
                  <input type='radio' name='main_activitee' value='0' class='check' checked>
                </p>
              <?php
                }
              ?> 
          </p>

        <br>
        <br>

          <p>
            <label for="type_course">Est-ce un évènement payant ?</label>
            <p>
              <?php
                if($tab_event['payant'] == 1){
              ?>
                  <label>Oui</label>
                  <input type="radio" name="payant" value="1" class="check" checked onclick="sssrank()">
                </p>
                <p>
                  <label>Non</label>
                  <input type="radio" name="payant" value="0" class="check" onclick="sssrank()">
                </p>
              <?php
                }
                else {
              ?>
                  <label>Oui</label>
                  <input type="radio" name="payant" value="1" class="check" onclick="sssrank()">
                </p>
                <p>
                  <label>Non</label>
                  <input type="radio" name="payant" value="0" class="check" checked onclick="sssrank()">
                </p>
              <?php
                }
              ?> 
          </p>

          <div id="ombremage" class="lumieremage" >
  
            <p>
              <label for="prix_adulte">Prix ticket adulte </label>
              <input type="number" name="prix_adulte" class="champs">
            </p>
    
            <p>
              <label for="prix_enfant">Prix ticket enfant </label>
              <input type="number" name="prix_enfant" class="champs">
            </p>
    
            <p>
              <label for="nbr_place_total">Nombre de place :</label>
              <input type="number" name="nbr_place_total" class="champs">
            </p>
    
            <p>
              <label for="nbr_place_dispo">Nombre de place :</label>
              <input type="number" name="nbr_place_dispo" class="champs">
            </p>

          </div>
          
        <!--  <input type="submit" name="ajout" id="envoyer"> -->
        </fieldset>

        <!-- argument inchangeable, sinon ça ne marche pas / value = taille max du fichier (en loccurence image)-->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000">
        <p>
          <label for="nom_image">Choississez une image associée</label>
          <input class="champs" type="file" name="imagee" required>    
        </p>

        <p>
          <label for="nom_image">Nom de l'image</label>
         <input class="champs" type="text" name="nom_image" placeholder="Nom de l'image">
        </p>

        <p>
          <label for="type">Type d'image</label>
          <input class="champs" type="text" name="type" readonly="event" placeholder="event (argument inchangeable)">
        </p>

        <p>
          <label for="alt">Texte de remplacement de l'image</label>
          <input class="champs" type="text" name="alt" placeholder="Image de ...">
        </p>

        <input class="boutt" type="submit" name="ajout" id="envoyer">
        <input type="hidden" name="blbl" value="2">


    </form>
  </div>



</body>
</html>