<?php

    class Pages{
        public function __construct(){
            
        }

        //ker je index kot default potrebujemo to!
        public function index() {

        }
        public function about($id) {
            echo $id;
        }

    }