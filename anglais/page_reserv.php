<?php 

include("../config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

// Nom et id pays
$tab = 'SELECT * FROM mails';
$resulat = $connection -> query($tab);
$tab_codes = $resulat -> fetchAll();
$resulat -> closeCursor();

$activites = 'SELECT event.nom_activitee_en, event.id_event FROM event';
$resulat = $connection -> query($activites);
$tab_event = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_event = count($tab_event);

if(isset($_POST['connec'])){
    $longueur_code= rand(3,15);                                                                                         

    $code=array();

    $nb_place = $_POST['nb_place'];

    $modifier= 'UPDATE event SET event.nbr_place_dispo = event.nbr_place_dispo -'.$nb_place. 'WHERE event.id_event';

    for ($i=0; $i<$longueur_code; $i++){
        $part_code= rand(0,9);
        $ajout=strval($part_code);
        $code[$i]=$ajout;
    }

    $code_final = implode("",$code);

    $expediteur="interculturalmmi@gmail.com";
    $recepteur= $_POST['mail'];
    $objet="Code d'activité Intercultural";


}

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL | Code sending </title>

  <meta name="description" content="Discover the different activities that the country offers, with additional information about the country!">
  <meta name="author" content="InterCultural Evenement">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="apple-touch-icon" href="../img/favicon.png"/>
  <link rel="icon" href="../img/favicon.png" />
  <link rel="stylesheet" href="../css/formulaire.css">
</head>
<body>
    <div class="titre">
        <h1> Code sending </h1>
    </div>

    <div class="global">
        <form method="POST" action="page_reserv.php">
            <label for="pseudo" class="label">Email adress</label><br>
            <input type="email" class="champs" id="mail" name="mail" placeholder="Email.." required><br>
            <select class="champs" name="activite">
                <?php 
                for($i = 0; $i < $nbr_event; $i++){
                ?>
                <option value="<?php echo $tab_event[$i]['id_event'];?>"><?php echo $tab_event[$i]['nom_activitee_en'];?></option>
                <?php 
                }
                ?>
            </select></br>
            <select class="champs" name="nb_place">
                <option value="1"> 1 place </option>
                <option value="2"> 2 places </option>
                <option value="3"> 3 places </option>
                <option value="3"> 4 places </option>
            </select>
            <div class="envoi"><a href="mailto: <?php $recepteur ?>"><input type="submit" class="boutt" name="connec" value="Send code"></a></div>

            <?php

            if(isset($_POST['connec'])){

                $temoin=FALSE;

                for ($i=0 ;$i< count($tab_codes); $i++){
                    if ($code_final == $tab_codes[$i]["code"]){
                        $temoin=TRUE;
                    }
                }

                if ($temoin == FALSE) {
                    echo 'This is your code, do not lose it ! </br>' .$code_final;
    
                    $ajout = $connection-> prepare('INSERT INTO mails (email, code) VALUES (:recepteur, :code_final)');
                    $ajout->bindParam(':recepteur', $recepteur, PDO::PARAM_STR);
                    $ajout->bindParam(':code_final', $code_final, PDO::PARAM_STR);
                    $ajout->execute();
                }
        }

            ?>
        </form>
    </div>

    <div class="lien">
        <p> Go back to <a href="index.php">Home Page</a></p>
    </div>

</body>
</html>