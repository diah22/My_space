<?php
    include_once('../../Models/Transaction/connexion.php');
    include_once('../../Models/Entity/event.php');
    include_once('../../Models/Transaction/eventTransaction.php');

    class EventController{
        private $_bdd;
        private $_con;

        public function __construct(){
            $this->_con= new Connexion();
            $this->_bdd= $this->_con->connectDb();
        }

        public function addEvent($heured, $heuref, $descri, $date, $user){
            $event= new Event();
            $bdd= $this->_bdd;
            $eventT = new EventTransaction($bdd);
            $event->setHeureDeb($heured);
            $event->setHeureFin($heuref);
            $event->setDescri($descri);
            $event->setDate($date);
            $event->setUser($user);
            $eventT->addEvent($event);
            Header('Location:../../View/Event/index.php?userid='.$user); //reste à savoir comment ajouter un notif
            // $success=1;
            // return $success;
        }

        public function getAllevent($user){
            $bdd= $this->_bdd;
            $eventT= new EventTransaction($bdd);
            $donnes= $eventT->getAllEvent($user);
            return $donnes;
        }
    }
?>