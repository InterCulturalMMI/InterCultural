<?php 

class Event {
  public $connection;
  public $id_event; 

  public $nbr_place_total;
  public $nbr_place_dispo;

  public function __construct($nbr_place_total, $nbr_place_dispo){
    $this->connection = $GLOBALS['connection'];
    //$this->id_event = $id_event; 

    $this->nbr_place_total = $nbr_place_total;
    $this->nbr_place_dispo = $nbr_place_dispo;
  }
}


?>


