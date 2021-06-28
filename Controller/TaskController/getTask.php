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

 if(isset($_GET['date'])){
    $html='<table class="table">';
    $html.='<tr><th>Tâches</th><th id="state" class="state">Statut</th></tr>';
   
    $date= $_GET['date'];
    $taskT= new TaskController();
    $donnees= $taskT->getAllTaskByDate($date);
    
    foreach($donnees as $donnee){
      $html.='<tr><td class="row-data task">'. $donnee["contenu"].'</td>';
      $html.='<td class="row-data state"><div class="state-content">';
      if($donnee['statut'] === 'N'){
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=N" class="checking cross checked-cross">✖</a>';
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=EC" class="checking loading">✿</a>';
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=O" class="checking tick">✔</a>';
      }
      elseif($donnee['statut'] === 'EC'){
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=N" class="checking cross">✖</a>';
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=EC" class="checking loading checked-loading">✿</a>';
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=O" class="checking tick">✔</a>';
      }
      else{
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=N" class="checking cross">✖</a>';
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=EC" class="checking loading">✿</a>';
         $html.='<a href="../../Controller/TaskController/updateTask.php?id=2&act=O" class="checking tick checked-tick">✔</a>';
      }
      
      $html.='</td>';
      
    }
    echo $html;
 }

 

?>