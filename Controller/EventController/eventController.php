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

        public function addEvent($heured, $heuref, $descri, $date){
            $event= new Event();
            $bdd= $this->_bdd;
            $eventT = new EventTransaction($bdd);
            $event->setHeureDeb($heured);
            $event->setHeureFin($heuref);
            $event->setDescri($descri);
            $event->setDate($date);
            $eventT->addEvent($event);
            $success=1;
            return $success;
        }

        public function getAllevent(){
            $bdd= $this->_bdd;
            $eventT= new EventTransaction($bdd);
            $donnes= $eventT->getAllEvent();
            return $donnes;
            // var_dump($donnes);
            // die;
            // print_r($donnes);
        }
    }
?>