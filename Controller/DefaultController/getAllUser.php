<?php
    include_once('../../Models/Transaction/connexion.php');
    include_once('../../Models/Entity/user.php');
    include_once('../../Models/Transaction/userTransaction.php');

    class GetUser{
        private $_bdd;
        private $_con;

        public function __construct(){
            $this->_con= new Connexion();
            $this->_bdd= $this->_con->connectDb();
        }

        public function getUser(){
            $bdd= $this->_bdd;
            $userT= new UserTransaction($bdd);
            $req= $userT->getAllUser();
            $username= $_POST['username'];
            $password= $_POST['password'];
            $password= sha1($password);
            while($donnees=$req->fetch()) {
                if($username == $donnees['username'] && $password==$donnees['password']){
                    echo "Mitovy";
                    Header('Location:../../View/Task/index.php');
                }
                else{
                    echo('Username or password incorrect');
                } 
            }
        }
    }
    $getUser= new GetUser();
    $getUser->getUser();

?>