<?php
class Task
{
    private $_contenu;
    private $_statut;
    private $_user;
    private $_date;

    public function getContenu(){
        return $this->_contenu;
    }

    public function setContenu($contenu){
        $this->_contenu= $contenu;
    }
    public function getStatut(){
        return $this->_statut;
    }

    public function setStatut($statut){
        $this->_statut= $statut;
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
}
?>