<?php
class Event
{
    private $_descri;
    private $_user;
    private $_date;
    private $_starttime;
    private $_endtime;

    public function getStartTime(){
        return $this->_starttime;
    }

    public function setStartTime($heurefin){
        $this->_starttime= $heurefin;
    }
    public function getEndTime(){
        return $this->_endtime;
    }

    public function setEndTime($heuredeb){
        $this->_endtime= $heuredeb;
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