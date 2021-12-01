<?php

class TaskTransaction
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function addTask(Task $task){
        $req= $this->_db->prepare('INSERT INTO task(content, deadline, state, user) VALUES (:contenu, :datel,:statut, :user)');
        $req->execute(array('contenu' => $task->getContent(),
                                'datel' => $task->getDate(),
                                'statut' => $task->getState(),
                                'user' => $task->getUser())) or die(print_r($req->errorInfo(), true)) ;
    }

    public function getTaskByDate($date){
        $req= $this->_db->query("SELECT * FROM task WHERE deadline='".$date."'")or die(print_r($req->errorInfo(), true)); // never forget to fetch data
        $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($donnees);
        // die;
        // print($donnees);
        return $donnees;

    }

    public function updateTask($id, $act){
        $req= $this->_db->prepare("UPDATE task SET statut=:statut WHERE id=:id");
        $req->execute(array('statut'=> $act,
                                'id' => $id)) or die(print_r($req->errorInfo(), true));
        
    }
    


}
?>