<?php

class UserTransaction 
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function getAllUser(){
        $req= $this->_db->query("SELECT * FROM user");
        //$donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $req;
    }

    public function addUser(User $user){
        $req=$this->_db->prepare("INSERT INTO user(username, password, email) VALUES (:username, :password, :email)");
        $req->execute(array('username' => $user->getUsername(),
                            'password' => $user->getPassword(),
                            'email' => $user->getEmail())) or die(print_r($req->errorInfo(), true));
    }
}
?>