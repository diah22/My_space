<?php
    include_once('../../Models/Transaction/connexion.php');
    include_once('../../Models/Transaction/DefaultTransaction.php');

    class DefaultController{
        private $_bdd;
        private $_con;

        public function __construct(){
            $this->_con= new Connexion();
            $this->_bdd= $this->_con->connectDb();
        }

        public function getState(){
            $bdd= $this->_bdd;
            $dT= new DefaultTransaction($bdd);
            $state= $dT->getState();
            return $state;
        }
    }

?>