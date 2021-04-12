<?php

class TaskTransaction
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function addTask(Task $task){
        // $req->execute(array('contenu' => $task->getContenu(),
        //                     'statut' => $task->getStatut(),
        //                     'user' => $task->getUser(),
        //                     'datelim' => $task->getDate())) or die(print_r($this->_db->errorInfo()));

        $req= $this->_db->prepare('INSERT INTO task(contenu, date_limite, statut, user) VALUES (:contenu, :datel,:statut, :user)');
        $req->execute(array('contenu' => $task->getContenu(),
                                'datel' => $task->getDate(),
                                'statut' => $task->getStatut(),
                                'user' => $task->getUser())) or die(print_r($req->errorInfo(), true)) ;
    }

    public function getTaskByDate($date){
        $req= $this->_db->query("SELECT * FROM task WHERE date_limite='". $date ."'"); // never forget to fetch data
        $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }

}
?>