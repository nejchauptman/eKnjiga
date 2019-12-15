<?php
    class Post{

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //metoda za pridobivanje postov iz DB
        public function getPosts(){
            $this->db->query('SELECT * FROM posts');

            //vrnemo več kot 1 rezultat
            $results = $this->db->resultSet();
            return $results;
        }

        //metoda za dodajanje posta v bazo
        public function addPost($data){
               
            //pripravimo query
            $this ->db->query('INSERT INTO posts (title, body) VALUES (:title, :body)');
           
            //bindamo vrednosti
            $this ->db ->bind(':title', $data['title']);
            $this ->db ->bind(':body', $data['body']);
    
            //executamo
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        

    }