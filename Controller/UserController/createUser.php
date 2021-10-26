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
            if(isset($_POST['username']) && $_POST['username']!==''){
                $username= $_POST['username'];
            }
            if(isset($_POST['email']) && $_POST['email']!==''){
                $email= $_POST['email'];
            }
            if(isset($_POST['password']) && $_POST['password']!==''){
                $pass1= $_POST['password'];
            }
            if(isset($_POST['confpass']) && $_POST['confpass']!==''){
                $pass2= $_POST['confpass'];
            }
        
            if($pass1 != $pass2){
                $response= array(
                    'state' => 'error',
                    'message' => 'Two password doesn\' t match'
                );
            }
            else{
                $user= new User();
                $bdd= $this->_bdd;
                $userT = new UserTransaction($bdd);
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setPassword($pass1);
                $userT->addUser($user);
                $response= array(
                    "state" => "success",
                    "message" => "Registration successfull"
                );
            }
            // $response= json_encode($response);
            // return $response;
            // var_dump($response['state']);
            // die;
            // print_r($response['state']);
            $response_json = json_encode($response);
            Header('Location:../../index.php?auth-error='.$response_json);
        }
    }
    $createuser= new CreateUser();
    $createuser->addUser();

?>