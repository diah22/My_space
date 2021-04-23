<?php
    include_once("../../Models/Transaction/connexion.php");
    include_once("../../Models/Transaction/taskTransaction.php");
    include_once("../../Models/Entity/task.php");

    class updateTodo
    {
        public function __construct(){

        }

        public function updateTodo(){
            $con= new Connexion();
            $bdd= $con->connectDb();
            $taskT= new TaskTransaction($bdd);
            $task= new Task();

            if(isset($_GET['id']) && $_GET['id']!==''){
                $id= $_GET['id'];
                $act= $_GET['act'];
                $taskT->updateTask($id, $act);            
            }
        }
    }
    $todo= new updateTodo();
    $todo->updateTodo();
    Header('Location:../../View/Task/index.php');
    
?>