<?php
class Project
{
    private $_nom;
    private $_statut;
    private $_descri;
    private $_user;
    private $_date;

    private $_goals;
    private $_dategoalss;
    private $_dategoalse;
    private $_idProj;

    private $_taskContent;
    private $_dateTask;

    public function getNom(){
        return $this->_nom;
    }

    public function setNom($nom){
        $this->_nom= $nom;
    }
    public function getStatut(){
        return $this->_statut;
    }

    public function setStatut($statut){
        $this->_statut= $statut;
    }

    public function getDescri(){
        return $this->_descri;
    }

    public function setDescri($descri){
        $this->_descri= trim($descri);
    }

    public function getUser(){
        return $this->_user;
    }

    public function setUser($user){
        $this->_user= $user;
    }

    public function getDate(){
        return $this->_date;
    }

    public function setDate($date){
        $this->_date= $date;
    }

    /** Entity for goals */
    public function getGoals(){
        return $this->_goals;
    }

    public function setGoals($goals){
        $this->_goals= $goals;
    }
    public function getGoalDateS(){
        return $this->_dategoalss;
    }

    public function setGoalDateS($goalss){
        $this->_dategoalss= $goalss;
    }
    public function getGoalDateE(){
        return $this->_dategoalse;
    }

    public function setGoalDateE($goalse){
        $this->_dategoalse= $goalse;
    }
    public function getIdProj(){
        return $this->_idProj;
    }

    public function setIdProj($id){
        $this->_idProj= $id;
    }
    /* */

    /**
     * Entity for Task
     */
    public function getTaskContent(){
        return $this->_taskContent;
    }
    public function setTaskContent($taskContent){
        $this->_taskContent = $taskContent;
    }

    public function getDateTask(){
        return $this->_dateTask;
    }

    public function setDateTask($dateTask){
        $this->_dateTask = $dateTask;
    }
}
?>