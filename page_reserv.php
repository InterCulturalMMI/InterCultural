<?php 

include("config/config.php");
include("fiche_classes_poo_reserv.php");

require 'phpmailertesting/PHPMailer/PHPMailerAutoload.php';
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);

// Nom et id pays
$tab = 'SELECT * FROM mails';
$resulat = $connection -> query($tab);
$tab_codes = $resulat -> fetchAll();
$resulat -> closeCursor();

$activites_liste = 'SELECT event.nom_activitee, event.id_event FROM event';
$resulat = $connection -> query($activites_liste);
$tab_event = $resulat -> fetchAll();
$resulat -> closeCursor();
$nbr_event = count($tab_event);

$act_nom_mail = 'SELECT mails.id_event, event.id_event, event.nom_activitee FROM mails, event WHERE mails.id_event=event.id_event';
$resulat = $connection -> query($act_nom_mail);
$tab_nom = $resulat -> fetchAll();
$resulat -> closeCursor();

$nbr_place = 'SELECT event.nbr_place_dispo, event.id_event FROM event';
$resulat = $connection -> query($nbr_place);
$tab_nb = $resulat -> fetchAll();
$resulat -> closeCursor();

$longueur_code= rand(3,15);                                                                                         

$code=array();
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL | Envoi code </title>
  
  <meta name="description" content="Découvrez les différentes activités que le pays propose, avec des informations supplémentaires sur le pays !">
  <meta name="author" content="InterCultural Evenement">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="apple-touch-icon" href="img/favicon.webp"/>
  <link rel="icon" href="img/favicon.webp" />
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
                <option name="liste_act" value="<?php echo $tab_event[$i]['id_event'];?>"><?php echo $tab_event[$i]['nom_activitee'];?></option>
                <?php 
                }
                ?>
            </select></br>
            <input type="number" class="champs" id="nbr" name="nb_place" placeholder="Nombre de places...">
            <div class="envoi"><input type="submit" class="boutt" name="connec" value="Envoi code"></div>
            <div class="phrasecode">
                <p>
                <?php
                if (isset($_POST['connec'])){

                    for ($i=0; $i<$longueur_code; $i++){
                        $part_code= rand(0,9);
                        $ajout=strval($part_code);
                        $code[$i]=$ajout;
                    }

                    $code_final = implode("",$code);

                    $recepteur= $_POST['mail'];
                    $nb_place= $_POST['nb_place'];
                    $select_event = $_POST["activite"];


                    $temoin=FALSE;

                    for ($i=0 ;$i< count($tab_codes); $i++){
                        if ($code_final == $tab_codes[$i]["code"]){
                            $temoin=TRUE;
                        }
                    }

                    if ($temoin == FALSE) {        
                        $ajout = $connection-> prepare('INSERT INTO mails (email, code, id_event) VALUES (:recepteur, :code_final, :acti)');
                        $ajout->bindParam(':recepteur', $recepteur, PDO::PARAM_STR);
                        $ajout->bindParam(':code_final', $code_final, PDO::PARAM_STR);
                        $ajout->bindParam(':acti', $activites, PDO::PARAM_STR);
                        $ajout->execute();




                        $modification = $connection-> prepare('UPDATE event SET nbr_place_dispo=nbr_place_dispo - :nbr_place_dispo  WHERE id_event= :id_event');
                        $modification->bindParam(':nbr_place_dispo', $_POST['nb_place'], PDO::PARAM_STR);
                        $modification->bindParam(':id_event', $select_event, PDO::PARAM_STR);
                        $modification->execute();
                    }

                    $mail = new PHPMailer;

                    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp-intercultural.alwaysdata.net';  // Specify main and backup SMTP servers
                    $mail->CharSet = 'UTF-8';
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'intercultural@alwaysdata.net';                 // SMTP username
                    $mail->Password = 'WeebWek2022';                           // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to

                    $mail->setFrom('intercultural@alwaysdata.net', 'InterCultural');
                    $mail->addAddress($recepteur, 'Utilisateur');     // Add a recipient
                    /*$mail->addReplyTo('info@example.com', 'Information');
                    $mail->addCC('cc@example.com');
                    $mail->addBCC('bcc@example.com');*/

                    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    //$mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = 'Bienvenue à InterCultural ! ';
                    $mail->Body    = 'Venez nous trouver aux différents points à activités à travers toute la ville ! Voici votre code de réservation pour une activité ' .$tab_nom['nom_activitee']. ', ne le perdez pas ! : <b>' .$code_final. '</b>.';
                    $mail->AltBody = 'Venez nous trouver aux différents points à activités à travers toute la ville ! Voici votre code de réservation pour une activité ' .$tab_nom['nom_activitee']. ', ne le perdez pas ! : ' .$code_final. '.';

                    if(!$mail->send()) {
                        echo 'Le mail ne peut pas être envoyé.';
                        echo 'Erreur du mailer : ' . $mail->ErrorInfo;
                    } else {
                        echo 'Le message a bien été envoyé ! Vérifiez vos mails.';
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