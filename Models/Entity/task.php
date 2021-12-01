<?php
class Task
{
    private $_content;
    private $_state;
    private $_user;
    private $_date;

    public function getContent(){
        return $this->_contenu;
    }

    public function setContent($contenu){
        $this->_content= $contenu;
    }
    public function getState(){
        return $this->_state;
    }

    public function setState($statut){
        $this->_state= $statut;
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