<?php
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

        public function addProject($title, $descri, $statut, $datel, $user){
            $project= new Project();
            $bdd= $this->_bdd;
            $projectT = new ProjectTransaction($bdd);
            $project->setNom($title);
            $project->setDescri($descri);
            $project->setStatut($statut);
            $project->setDate($datel);
            $project->setUser($user);
            $projectT->addProject($project);
            $success=1;
            return $success;
        }

        public function getAllProject(){
            $bdd= $this->_bdd;
            $projectT= new ProjectTransaction($bdd);
            $donnes= $projectT->getAllProject();
            return $donnes;
            // var_dump($donnes);
            // die;
            // print_r($donnes);
        }
    }
?>