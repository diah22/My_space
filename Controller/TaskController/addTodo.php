<?php
    include_once("../../Models/Transaction/connexion.php");
    include_once("../../Models/Transaction/taskTransaction.php");
    include_once("../../Models/Entity/task.php");

    class AddTodo
    {
        public function __construct(){

        }

        public function addTodo(){
            $con= new Connexion();
            $bdd= $con->connectDb();
            $taskT= new TaskTransaction($bdd);
            $task= new Task();

            if(isset($_GET['todo'])){
               $todoItem= json_decode($_GET['todo']);
               $date= date('y-m-d');
               $default_stat= 'N';
               
               $user= $todoItem->user;
               $items= $todoItem->item;
               foreach($items as $item){
                   $task->setContent($item);
                   $task->setDate($date);
                   $task->setUser($user);
                   $task->setState($default_stat);
                   $taskT->addTask($task);

               }

            }
            return $user;
        }

    }
    $todo= new AddTodo();
    $todo->addTodo(); 
?>