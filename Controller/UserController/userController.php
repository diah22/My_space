<?php
    include_once("../../Models/Transaction/connexion.php");
    include_once("../../Models/Transaction/UserTransaction.php");
    include_once("../../Models/Entity/user.php");

    class UserController
    {
        public function __construct(){

        }

        public function getUserById($id){
            $con= new Connexion();
            $bdd= $con->connectDb();
            $userT= new UserTransaction($bdd);
            $user= $userT->getUserById($id);
            return $user;
        }
    }
   
?>