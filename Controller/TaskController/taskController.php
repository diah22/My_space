<?php
include('../../Models/Transaction/taskTransaction.php');
include_once('../../Models/Transaction/connexion.php');

class TaskController
 {
     private $_con;
     private $_bdd;
     
     public function __construct(){
        $this->_con= new Connexion();
        $this->_bdd= $this->_con->connectDb();
     }

     public function getAllTaskByDate($date){

      $bdd= $this->_bdd;
      $taskT= new TaskTransaction($bdd);
      $donnees= $taskT->getTaskByDate($date);
      return $donnees;
     }
 }

?>