<?php

class EventTransaction
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function addEvent(Event $event){
    
        $req= $this->_db->prepare('INSERT INTO event( heure_deb,  heure_fin ,date,descri) VALUES (:heureDeb, :heureFin,:date, :descri)');
        $req->execute(array('heureDeb' => $event->getHeureDeb(),
                                'heureFin' => $event->getHeureFin(),
                                'date' => $event->getDate(),
                                'descri' => $event->getDescri())) or die(print_r($req->errorInfo(), true)) ;
    }

    // public function getEventByDate($date){
    //     $req= $this->_db->query("SELECT * FROM Event WHERE date_limite='". $date ."'"); // never forget to fetch data
    //     $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
    //     return $donnees;
    // }

}
?>