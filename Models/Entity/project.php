<?php
class Task
{
    private $_nom;
    private $_statut;
    private $_descri;
    private $_user;
    private $_date;

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
        return $this->_statut;
    }

    public function setDescri($descri){
        $this->_descri= $descri;
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