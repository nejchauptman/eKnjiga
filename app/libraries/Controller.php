<?php
    
    //Glavni controller
    //Naloži Modele and Viewe

    class Controller {

        //naloži model
        public function model($model){
            //Require model file
            require_once '../app/model/'.$model.'.php';
            
            //vrnemo instanco modela
            return new $model();
        }

        //nalozimo View
        public function view($view,$data = []) {
            //preverimo, če view file obstaja
            if(file_exists('../app/views/'.$view.'.php')){
                require_once '../app/views/'.$view.'.php';
            }
            else{
                die('Ne obstaja :( ');
            }
        }
    }
