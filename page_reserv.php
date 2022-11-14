<?php 

include("config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

// Nom et id pays
$tab = 'SELECT * FROM mails';
$resulat = $connection -> query($tab);
$tab_codes = $resulat -> fetchAll();
$resulat -> closeCursor();

$activites = 'SELECT event.nom_activitee, event.id_event FROM event';
$resulat = $connection -> query($activites);
$tab_event = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_event = count($tab_event);

if(isset($_POST['connec'])){
    $longueur_code= rand(3,15);                                                                                         

    $code=array();

    // $nb_place = $_POST['nb_place'];

    $actid = $_POST['activite'];

    // $modifier= 'UPDATE event SET event.nbr_place_dispo = event.nbr_place_dispo - '.$nb_place. 'WHERE event.id_event = 2';

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
  <title> INTERCULTURAL | Envoi code</title>
  
  <meta name="description" content="Découvrez les différentes activités que le pays propose, avec des informations supplémentaires sur le pays !">
  <meta name="author" content="InterCultural Evenement">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="apple-touch-icon" href="img/favicon.png"/>
  <link rel="icon" href="img/favicon.png" />
  <link rel="stylesheet" href="css/formulaire.css">
</head>
<body>
    <div class="titre">
        <h1> Envoi du code </h1>
    </div>

    <div class="global">
        <form method="POST" action="page_reserv.php">
            <label for="pseudo" class="label">Adresse mail</label><br>
            <input type="email" class="champs" id="mail" name="mail" placeholder="Adresse mail.." required><br>
            <select class="champs" name="activite">
                <?php 
                for($i = 0; $i < $nbr_event; $i++){
                ?>
                <option value="<?php echo $tab_event[$i]['id_event'];?>"><?php echo $tab_event[$i]['nom_activitee'];?></option>
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
            <div class="envoi"><a href="mailto: <?php $recepteur ?>"><input type="submit" class="boutt" name="connec" value="Envoi code"></a></div>
            <div class="phrasecode">
                <p>
                <?php
                if (isset($_POST['connec'])){
                    $temoin=FALSE;

                    $nb_place_update = "UPDATE event SET nbr_place_dispo=249 WHERE id_event=1"; 

                for ($i=0 ;$i< count($tab_codes); $i++){
                    if ($code_final == $tab_codes[$i]["code"]){
                        $temoin=TRUE;
                    }
                }

                if ($temoin == FALSE) {
                    if (isset($_POST['connec'])){


                        echo 'Voici votre code, ne le perdez pas ! </br>' .$code_final;
        
                        $ajout = $connection-> prepare('INSERT INTO mails (email, code) VALUES (:recepteur, :code_final)');
                        $ajout->bindParam(':recepteur', $recepteur, PDO::PARAM_STR);
                        $ajout->bindParam(':code_final', $code_final, PDO::PARAM_STR);
                        $ajout->execute();
                    }
                }
                }
                ?>
                </p>
            </div>
        </form>
    </div>

    <div class="lien">
        <p> Retour à <a href="index.php">l'accueil</a></p>
    </div>

</body>
</html>