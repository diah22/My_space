<?php
    include_once('../../Models/Transaction/connexion.php');
    include_once('../../Models/Entity/user.php');
    include_once('../../Models/Transaction/userTransaction.php');

    class CreateUser{
        private $_bdd;
        private $_con;

        public function __construct(){
            $this->_con= new Connexion();
            $this->_bdd= $this->_con->connectDb();
        }

        public function addUser(){
            $response= [
                'state' => '',
                'message' => ''
            ];
        
            if(isset($_POST['username']) && $_POST['username']!==''){
                $username= $_POST['username'];
            }
            if(isset($_POST['email']) && $_POST['email']!==''){
                $email= $_POST['email'];
            }
            if(isset($_POST['pass1']) && $_POST['pass1']!==''){
                $pass1= $_POST['pass1'];
            }
            if(isset($_POST['pass2']) && $_POST['pass2']!==''){
                $pass2= $_POST['pass2'];
            }
        
            if($pass1 != $pass2){
                $response= [
                    'state' => 'error',
                    'message' => 'Two password doesn\' t match'
                ];
            }
            else{
                $user= new User();
                $bdd= $this->_bdd;
                $userT = new UserTransaction($bdd);
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setPassword($pass1);
                $userT->addUser($user);
                $response= [
                    'state' => 'success',
                    'message' => 'Registration successfull'
                ];
            }
            // return $response;
            Header('Location:../../View/Default/createaccount.php?response='.$response);
        }
    }
    $createuser= new CreateUser();
    $createuser->addUser();

?>