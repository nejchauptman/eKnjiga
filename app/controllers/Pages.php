<?php

    class Pages extends Controller{
        public function __construct(){
           
        }

        //ker je index kot default potrebujemo to!
        public function index() {
            $data=['title' =>'eKnjiga',
            "description" => "Domača prodaja knjig",
            'title_2' =>'O nas!',
            "description_2" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
             when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."

        ];
            
            $this->view('pages/index', $data);
        }

        public function products(){
            $data=['title' =>'SHOP',
            "description" => "Domača prodaja knjig",
            
        ];
            
            $this->view('pages/products', $data);
        }
        public function blog(){
            
            
            $this->view('posts/index', $data);
        }
        

    }