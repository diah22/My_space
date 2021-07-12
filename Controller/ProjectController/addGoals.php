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

            if(isset($_GET['idproj'])){
                $project->setIdProj($_GET['idproj']);
            }

            if(isset($_GET['pGoals'])){
                $goalsItem= json_decode($_GET['pGoals']);
                
                $items= $goalsItem->oneitem;
               
                foreach($items as $item){
                    $nom= $item->name;
                    $date= $item->date;
                    if($nom != "" && $date != ""){
                        $project->setTaskContent($nom);
                        $project->setDateTask($date);

                        $projectT->addTaskForGoals($project);
                    }
                    //   echo $item['name'];
                }
             }
        
            if(isset($_GET['goals'])){
                $project->setGoals($_GET['goals']);
                
            }
            if(isset($_GET['dates'])){
                $project->setGoalDateS($_GET['dates']);
            }
            if(isset($_GET['datee'])){
                $project->setGoalDateE($_GET['datee']);
            }
           

            $projectT->addProjectGoal($project);
            echo "Enregistrement avec success";
        }
    }

    $proj= new ProjectController();
    $proj->addProject();
?>