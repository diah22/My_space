<?php
    include_once('../../Models/Transaction/connexion.php');
    include_once('../../Models/Entity/user.php');
    include_once('../../Models/Transaction/userTransaction.php');

    class GetUser{
        private $_bdd;
        private $_con;
        private $is_authentified= false;
        private $user_id;

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
                    $this->is_authentified = true;
                    $this->user_id = $donnees['id'];
                }
            }
            $not_auth= array(
                'state' => 'error',
                'message' => 'The username or the password doesn\' t exist'
            );

            $not_auth_json = json_encode($not_auth);

            // $this->is_authentified ? 
            //      Header('Location:../../View/Task/home.php?userid='. $this->user_id) :
            //          Header('Location:../../index.php?auth-error='.$not_auth_json);
            $this->is_authentified ? 
                 Header('Location:../../View/Utils/dashboard.php?userid='. $this->user_id):
                 Header('Location:../../index.php')
                 ;
        }
    }
    $getUser= new GetUser();
    $getUser->getUser();

?>