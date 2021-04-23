<?php

    class Utils{

        public static function getState($state){
            
            switch(strval($state)){
                
                case 'N':
                    $state= 'Non fait';
                    
                case 'EC':
                    $state= 'En cours';
                
                case 'O':
                    $state= 'Terminé';

                default:
                    $state= 'Undefined';

            } 

            return $state;
        }
    }
?>