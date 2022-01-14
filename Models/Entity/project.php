<?php
class Project{
    private $_title;
    private $_descri;
    private $_status;
    private $_deadline;
    private $_userid;

    public function getTitle(){
        return $this->_title;
    }

    public function setTitle($title){
        $this->_title = $title;
    }

    public function getDescri(){
        return $this->_descri;
    }

    public function setDescri($descri){
        $this->_descri = $descri;
    }

    public function getStatus(){
        return $this->_status;
    }

    public function setStatus($status){
        $this->_status = $status;
    }

    public function getDeadline(){
        return $this->_deadline;
    }

    public function setDeadline($date){
        $this->_deadline = $date;
    }

    public function getUser(){
        return $this->_userid;
    }

    public function setUser($id){
        $this->_userid = $id;
    }
}
?>
