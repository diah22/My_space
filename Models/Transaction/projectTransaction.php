<?php

class ProjectTransaction
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function addProject(Project $project){
        $req= $this->_db->prepare('INSERT INTO project(title, deadline,description, status, id_user) VALUES (:nom, :datel,:descri, :statut, :user)');
        $req->execute(array('nom' => $project->getTitle(),
                                'datel' => $project->getDeadline(),
                                'descri' => $project->getDescri(),
                                'statut' => $project->getStatus(),
                                'user' => $project->getUser())) or die(print_r($req->errorInfo(), true)) ;
    }

    public function getProjectByDate($date){
        $req= $this->_db->query("SELECT * FROM project WHERE deadline='". $date ."'"); // never forget to fetch data
        $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }
    public function getProjectById($id){
        $req= $this->_db->query("SELECT * FROM project WHERE id=".$id); // never forget to fetch data
        $donnees= $req->fetch();
        return $donnees;
    }

    public function getAllProject($user){
        $req= $this->_db->query('SELECT * FROM project WHERE user='.$user.' ORDER BY id DESC LIMIT 0,3');
        $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }
}
?>