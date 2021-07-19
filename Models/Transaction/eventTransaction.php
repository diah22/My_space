<?php

class EventTransaction
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function addEvent(Event $event){
        $req= $this->_db->prepare('INSERT INTO event( heure_deb,  heure_fin ,date,descri,user) VALUES (:heureDeb, :heureFin,:date, :descri,:user)');
        $req->execute(array('heureDeb' => $event->getHeureDeb(),
                                'heureFin' => $event->getHeureFin(),
                                'date' => $event->getDate(),
                                'descri' => $event->getDescri(),
                                'user' => $event->getUser())) or die(print_r($req->errorInfo(), true)) ;
    }

    public function getAllEvent($user){
        $req= $this->_db->query('SELECT * FROM event WHERE user='.$user.' ORDER BY date asc');
        $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }

    // public function getEventByDate($date){
    //     $req= $this->_db->query("SELECT * FROM Event WHERE date_limite='". $date ."'"); // never forget to fetch data
    //     $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
    //     return $donnees;
    // }

}
?>