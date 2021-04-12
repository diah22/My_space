<?php
class Connexion
{
    public function connectDb(){
        try{
            $bdd= new PDO('mysql:hostname=localhost;dbname=myspace', 'root', '');
        }
        catch(Exception $e){
            die('Error: ' .$e->getMessage());
        }

        return $bdd;
    }
}
?>