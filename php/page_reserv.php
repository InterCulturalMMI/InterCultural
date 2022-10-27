<?php 

$connection = new PDO('mysql:host=localhost; port=3306; dbname=sae_web_week_finale', 'root', '');

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

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> INTERCULTURAL </title>
  <link rel="stylesheet" href="../css/formulaire.css">
  <script src="../js/reservation.js"></script>
</head>
<body>
    <div class="titre">
        <h1> Envoi du code </h1>
    </div>

    <div class="global">
        <form method="POST" action="page_reserv.php">
            <label for="pseudo" class="label">Adresse mail</label><br>
            <input type="pseudo" class="champs" id="mail" name="mail" placeholder="Adresse mail.."><br>
            <select class="select_pays" name="activite">
                <?php 
                for($i = 0; $i < $nbr_event; $i++){
                ?>
                <option value="<?php echo $tab_event[$i]['id_event'];?>"><?php echo $tab_event[$i]['nom_activitee'];?></option>
                <?php 
                }
                ?>
            </select>
            <input type="submit" class="boutt" name="connec" value="Envoi mail">
        </form>
    </div>
</body>
<?php




if(isset($_POST['connec'])){
    $longueur_code= rand(3,15);                                                                                         

    $code=array();

    for ($i=0; $i<$longueur_code; $i++){
        $part_code= rand(0,9);
        $ajout=strval($part_code);
        $code[$i]=$ajout;
    }

    $code_final = implode("",$code);

    $expediteur="interculturalmmi@gmail.com";
    $recepteur= $_POST['mail'];
    $objet="Code d'activité Intercultural";
    $message= "Bonjour " .$recepteur. " ! Votre code pour l'activité est " .implode("",$code). " . Amusez vous bien !";

    mail($expediteur,$recepteur,$message,$objet);
}
?>