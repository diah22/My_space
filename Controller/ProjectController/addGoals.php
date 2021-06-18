<?php
    header("Content-Type: text/plain"); 
    include_once('../../Models/Transaction/connexion.php');
    include_once('../../Models/Entity/project.php');
    include_once('../../Models/Transaction/projectTransaction.php');

    class ProjectController{
        private $_bdd;
        private $_con;

        public function __construct(){
            $this->_con= new Connexion();
            $this->_bdd= $this->_con->connectDb();
        }

        public function addProject(){
            $project= new Project();
            $bdd= $this->_bdd;
            $projectT = new ProjectTransaction($bdd);

            if(isset($_GET['pGoals'])){
                $goalsItem= json_decode($_GET['pGoals']);
    
                $items= $goalsItem->oneitem;
                foreach($items as $item){
                    // $task->setContenu($item);
                    // $task->setDate($date);
                    // $task->setUser($user);
                    // $task->setStatut($default_stat);
                    // $taskT->addTask($task);
                    // var_dump($item);
                    // die;
                    // print_r($item);
                    echo $item['name'];
                }
             }
        
            // $project->setDate($deadline);
            // $project->setNom($nom);
            // $project->setDescri($descri);
            // $project->setStatut($state);
            // $projectT->modifProject($project, $id);
        }
    }

    $proj= new ProjectController();
    $proj->addProject();
?>