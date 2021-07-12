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

    public function addProjectGoal(Project $project){
        $req= $this->_db->prepare('INSERT INTO goals_proj(id_plan,content, start_date, end_date) VALUES(:id, :content, :startdate, :enddate)');
        $req->execute(array('id' => $project->getIdProj(),
                            'content' => $project->getGoals(),
                            'startdate' => $project->getGoalDateS(),
                            'enddate' => $project->getGoalDateE())) or die(print_r($req->errorInfo(), true));
    }

    public function addTaskForGoals(Project $project){
        $req= $this->_db->prepare('INSERT INTO task_proj(id_plan, content, deadline) VALUES(:id, :content, :deadline)');
        $req->execute(array('id' => $project->getIdProj(),
                            'content' => $project->getTaskContent(),
                            'deadline'=> $project->getDateTask())) or die(print_r($req->errorInfo(), true));
    }

    public function modifProject(Project $project, $id){
        $req= $this->_db->prepare('UPDATE project set nom=:nom, description=:descri, date_limite=:datel, statut=:statut WHERE id='.$id);
        $req->execute(array('nom' => $project->getNom(),
                            'descri' =>$project->getDescri(),
                            'datel' => $project->getDate(),
                            'statut' => $project->getStatut())) or die(print_r($req->errorInfo(), true));
    }

}
?>