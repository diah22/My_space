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
      $html.='<td class="row-data state"><div class="state-co:ntent">';
      
      $html.='<a href="../../Controller/TaskController/updateTask.php?id=<?php echo $task["id"]?>&act="EC"" class="checking tick checked" style="box-shadow:0 50px 100px rgba(50,50,93,.1), 0 15px 35px rgba(50,50,93,.15), 0 5px 15px rgba(0,0,0,.1);">✔</a>
      <a href="../../Controller/TaskController/updateTask.php?id=<?php echo $task["id"]?>&act="N"" class="checking cross">✖</a>
      <a href="../../Controller/TaskController/updateTask.php?id=<?php echo $task["id"]?>&act="O"" class="checking loading">✿</a>';
      
    }
    echo $html;
 }

 

?>