<?php

class DefaultTransaction
{
    private $_db;

    public function __construct($bdd){
        $this->_db= $bdd;
    }

    public function getState(){
        $req= $this->_db->query('SELECT * FROM state');
        $donnees= $req->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;
    }

  
}
?>