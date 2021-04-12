<?php

class User
{
    private $_username;
    private $_password;
    private $_email;
    private $_sexe;
    private $is_validate= TRUE;

    public function getUsername(){
        return $this->_username;
    }

    public function setUsername($username){
        $this->_username= $username;
    }

    public function getPassword(){
        return $this->_password;
    }

    public function setPassword($password){
        $this->_password= $password;
    }

    public function getEmail(){
        return $this->_email;
    }

    public function getIsValidate(){
        return $this->is_validate;
    }

    public function setEmail($email){
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$email)){
            $is_validate= TRUE;
        }
        else{
            $is_validate=FALSE;
        }
        
        $this->_email= $email;
        
    }

    public function getSexe(){
        return $this->_sexe;
    }

    public function setSexe($sexe){
        $this->_sexe= $sexe;
    }
}
?>