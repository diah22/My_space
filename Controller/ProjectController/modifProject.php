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
            // $id = (isset($_POST["id"])) ? $_POST["id"] : NULL;
            // $state = (isset($_POST["state"])) ? $_POST["state"] : NULL;
            // $descri = (isset($_POST["descri"])) ? $_POST["descri"] : NULL;
            // $nom = (isset($_POST["nom"])) ? $_POST["nom"] : NULL;
            // $deadline = (isset($_POST["deadline"])) ? $_POST["deadline"] : NULL;
            if(isset($_POST['id']) && $_POST['id'] !==''){
                $id= $_POST['id'];
            }
            if(isset($_POST['descri']) && $_POST['descri'] !==''){
                $descri= $_POST['descri'];
            }
            if(isset($_POST['nom']) && $_POST['nom'] !==''){
                $nom= $_POST['nom'];
            }
            if(isset($_POST['state']) && $_POST['state'] !==''){
                $state= $_POST['state'];
            }
            if(isset($_POST['deadline']) && $_POST['deadline'] !==''){
                $deadline= $_POST['deadline'];
            }    
            $project->setDate($deadline);
            $project->setNom($nom);
            $project->setDescri($descri);
            $project->setStatut($state);
            $projectT->modifProject($project, $id);
        }
    }

    $proj= new ProjectController();
    $proj->addProject();
?>