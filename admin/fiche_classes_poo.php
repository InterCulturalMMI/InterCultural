<?php 

include("../config/config.php") ;
$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nombase,$user, $mdp);
 
class Pays {
  public $connection;
  public $id_pays; 

  public $id_edition;

  // public $id_image_ban;
  // public $id_image_car;
  // public $id_image_drap; 
  public $nom_pays;
  public $geoloc_long;
  public $geoloc_latt;
  public $descriptif_pays;
  public $descriptif_monument;
  public $nom_monument_principal;
  public $nom_monument_secondaire;  
  public $liste_event = array();

  public $list_id_image_pays = array();

  public function __construct($id_edition, $nom_pays, $geoloc_long, $geoloc_latt, $descriptif_pays, $descriptif_monument, $nom_monument_principal, $nom_monument_secondaire){
    $this->connection = $GLOBALS['connection'];
    // $this->id_image_ban = 1;
    // $this->id_image_car = 1;
    // $this->id_image_drap = 1;
    $this->id_edition = $id_edition;
    $this->nom_pays = $nom_pays;
    $this->geoloc_long = $geoloc_long;
    $this->geoloc_latt = $geoloc_latt;
    $this->descriptif_pays = $descriptif_pays;
    $this->descriptif_monument = $descriptif_monument;
    $this->nom_monument_principal = $nom_monument_principal;
    $this->nom_monument_secondaire = $nom_monument_secondaire;
  }
  public function ajoutEvent ($id_pays, $id_image ,$nom_activitee, $descriptif, $horraires, $date_event, $lieu, $prix_adulte, $prix_enfant, $payant, $nbr_place_total, $nbr_place_dispo, $main_activitee, $nom_activitee_en, $descriptif_en){
    $event = new Event($id_pays, $id_image, $nom_activitee, $descriptif, $horraires, $date_event, $lieu, $prix_adulte, $prix_enfant, $payant, $nbr_place_total, $nbr_place_dispo, $main_activitee, $nom_activitee_en, $descriptif_en); 
    $this->liste_event[] = (array)$event;
    $event->ajoutEBDD();
  }

  public function ajoutPBDD(){
    
    $secu = $GLOBALS['connection']->prepare("INSERT INTO event (id_edition, nom_pays, geoloc_long, geoloc_latt, descriptif_pays, descriptif_monument, nom_monument_principal, nom_monument_secondaire) values (:id_edition, :nom_pays, :geoloc_long, :geoloc_latt, :descriptif_pays, :descriptif_monument, :nom_monument_principal, :nom_monument_secondaire)");
    $secu->bindParam(':id_edition', $this->id_edition);
    $secu->bindParam(':nom_pays', $this->nom_pays);
    $secu->bindParam(':geoloc_long', $this->geoloc_long);
    $secu->bindParam(':geoloc_latt', $this->geoloc_latt);
    $secu->bindParam(':descriptif_pays', $this->descriptif_pays);
    $secu->bindParam(':descriptif_monument', $this->descriptif_monument);
    $secu->bindParam(':nom_monument_principal', $this->nom_monument_principal);
    $secu->bindParam(':nom_monument_secondaire', $this->nom_monument_secondaire);
    $secu->execute(); 
    return $connection->lastInsertId();
  }
}



class Edition {
  public $connection;
  public $id_edition; 

  public $annee;
  public $theme;
  public $descriptif_annee;
  public $liste_pays = array();

  public function __construct(/*$id_edition,*/ $annee, $theme, $descriptif_annee){
    $this->connection = $GLOBALS['connection'];
   /* $this->id_edition = $id_edition;*/

    $this->annee = $annee;
    $this->theme = $theme;
    $this->descriptif_annee = $descriptif_annee;
  }

  public function ajoutPays($id_edition, $nom_pays, $geoloc_long, $geoloc_latt, $descriptif_pays, $descriptif_monument, $nom_monument_principal, $nom_monument_secondaire){
    $pays = new Pays($id_edition, $nom_pays, $geoloc_long, $geoloc_latt, $descriptif_pays, $descriptif_monument, $nom_monument_principal, $nom_monument_secondaire); 
    $this->liste_pays[] = (array)$pays;
    $pays->ajoutPBDD();
  }
}


class Image {
  public $id_image; 

  public $nom_image;
  public $alt;
  public $type;
  public $url;

  public function __construct(/*$id_image,*/ $nom_image, $alt, $type, $url){
    /*$this->id_image = $id_image;*/

    $this->nom_image = $nom_image;
    $this->alt = $alt;
    $this->type = $type;
    $this->url = $url;
  }

  public function ajoutIBDD(){
   
    $secu = $GLOBALS['connection']->prepare("INSERT INTO image (/*id_image,*/ nom_image, alt, type, url) values (/*:id_image,*/ :nom_image, :alt, :type, :url)");
    /*$secu->bindParam(':id_image', $this->id_image);*/
    $secu->bindParam(':nom_image', $this->nom_image);
    $secu->bindParam(':alt', $this->alt);
    $secu->bindParam(':type', $this->type);
    $secu->bindParam(':url', $this->url);
    $secu->execute(); 
  }

  public function suppressionIBDD($id_reccup_suppr){
    

    $secu = $GLOBALS['connection']-> prepare("DELETE FROM image WHERE image.id_image=".$id_reccup_suppr);
    $secu->execute();
  }
}


class Event {
  public $connection;
  public $id_event; 

  public $id_pays;
  public $id_image; 
  public $id_edition;
  public $nom_activitee;
  public $descriptif;
  public $horraires;
  public $date_event;
  public $lieu;
  public $prix_adulte;
  public $prix_enfant;
  public $payant;
  public $nbr_place_total;
  public $nbr_place_dispo;
  public $main_activitee;
  public $nom_activitee_en;
  public $descriptif_en;

  public $list_id_image_event = array();

  public function __construct($id_pays, $id_image, $nom_activitee, $descriptif, $horraires, $date_event, $lieu, $prix_adulte, $prix_enfant, $payant, $nbr_place_total, $nbr_place_dispo, $main_activitee, $nom_activitee_en, $descriptif_en){
    $this->connection = $GLOBALS['connection'];
    //$this->id_event = $id_event; 

    $this->id_pays = $id_pays;
    $this->id_image = $id_image;
    $this->id_edition = 1;
    $this->nom_activitee = $nom_activitee;
    $this->descriptif = $descriptif;
    $this->horraires = $horraires;
    $this->date_event = $date_event;
    $this->lieu = $lieu;
    $this->prix_adulte = $prix_adulte;
    $this->prix_enfant = $prix_enfant;
    $this->payant = $payant;
    $this->nbr_place_total = $nbr_place_total;
    $this->nbr_place_dispo = $nbr_place_dispo;
    $this->main_activitee = $main_activitee; 
    $this->nom_activitee_en = $nom_activitee_en; 
    $this->descriptif_en = $descriptif_en;    
  }

  public function ajoutEBDD(){

    $secu = $GLOBALS['connection']->prepare("INSERT INTO event (id_pays, id_image, id_edition, nom_activitee, descriptif, horraires, date_event, lieu, prix_adulte, prix_enfant, payant, nbr_place_total, nbr_place_dispo, main_activitee, nom_activitee_en, descriptif_en) values (:id_pays, :id_image, :id_edition, :nom_activitee,  :descriptif, :horraires, :date_event, :lieu, :prix_adulte, :prix_enfant, :payant, :nbr_place_total, :nbr_place_dispo, :main_activitee, :nom_activitee_en, :descriptif_en)"); 
    $secu->bindParam(':id_pays', $this->id_pays);
    $secu->bindParam(':id_image', $this->id_image);
    $secu->bindParam(':id_edition', $this->id_edition);
    $secu->bindParam(':nom_activitee', $this->nom_activitee);
    $secu->bindParam(':descriptif', $this->descriptif);
    $secu->bindParam(':horraires', $this->horraires);
    $secu->bindParam(':date_event', $this->date_event);
    $secu->bindParam(':lieu', $this->lieu);
    $secu->bindParam(':prix_adulte', $this->prix_adulte);
    $secu->bindParam(':prix_enfant', $this->prix_enfant);
    $secu->bindParam(':payant', $this->payant);
    $secu->bindParam(':nbr_place_total', $this->nbr_place_total);
    $secu->bindParam(':nbr_place_dispo', $this->nbr_place_dispo);
    $secu->bindParam(':main_activitee', $this->main_activitee);
    $secu->bindParam(':nom_activitee_en', $this->nom_activitee_en);
    $secu->bindParam(':descriptif_en', $this->descriptif_en);
    $succes = $secu->execute(); 
  }

  public function suppressionEBDD($id_reccup_suppr){
    
    $secu = $GLOBALS['connection']-> prepare("DELETE FROM event WHERE event.id_event=".$id_reccup_suppr);
    $secu->execute();
  }
}

?>