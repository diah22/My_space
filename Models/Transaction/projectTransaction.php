<?php

class ProjectTransaction
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function addProject(Project $project){
        // $req->execute(array('contenu' => $Project->getContenu(),
        //                     'statut' => $Project->getStatut(),
        //                     'user' => $Project->getUser(),
        //                     'datelim' => $Project->getDate())) or die(print_r($this->_db->errorInfo()));

        $req= $this->_db->prepare('INSERT INTO project(nom, date_limite,description, statut, user) VALUES (:nom, :datel,:descri, :statut, :user)');
        $req->execute(array('nom' => $project->getNom(),
                                'datel' => $project->getDate(),
                                'descri' => $project->getDescri(),
                                'statut' => $project->getStatut(),
                                'user' => $project->getUser())) or die(print_r($req->errorInfo(), true)) ;
    }

    public function getProjectByDate($date){
        $req= $this->_db->query("SELECT * FROM project WHERE date_limite='". $date ."'"); // never forget to fetch data
        $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }
    public function getProjectById($id){
        $req= $this->_db->query("SELECT * FROM project WHERE id=".$id); // never forget to fetch data
        $donnees= $req->fetch();
        return $donnees;
    }

    public function getAllProject(){
        $req= $this->_db->query('SELECT * FROM project ORDER BY id DESC LIMIT 0,3');
        $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }

}
?>