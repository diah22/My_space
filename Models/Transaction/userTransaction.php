<?php

class UserTransaction 
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function getAllUser(){
        $req= $this->_db->query("SELECT * FROM users");
        // $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $req;
    }

    public function addUser(User $user){
        $req=$this->_db->prepare("INSERT INTO users(username, password, email, sexe) VALUES (:username, :password, :email, :sexe)");
        $req->execute(array('username' => $user->getUsername(),
                            'password' => $user->getPassword(),
                            'email' => $user->getEmail(),
                            'sexe' => $user->getSexe())) or die(print_r($req->errorInfo(), true));
    }
}
?>