<?php

    class LogOut{
       
        public function logOut(){
            session_abort();
            Header('Location:../../index.php');
        }
    }
    $getUser= new LogOut();
    $getUser->logOut();

?>