<?php
class Event
{
    private $_descri;
    private $_user;
    private $_date;
    private $_heureFin;
    private $_heureDeb;

    public function getHeureFin(){
        return $this->_heureFin;
    }

    public function setHeureFin($heurefin){
        $this->_heureFin= $heurefin;
    }
    public function getHeureDeb(){
        return $this->_heureDeb;
    }

    public function setHeureDeb($heuredeb){
        $this->_heureDeb= $heuredeb;
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
}
?>