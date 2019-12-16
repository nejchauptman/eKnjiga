<?php
    class Post{

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        //metoda za pridobivanje postov iz DB
        public function getPosts(){
            $this->db->query('SELECT *, posts.id as postId, users.id as userId, posts.created_at as postCreated, users.created_at as userCreated FROM posts INNER JOIN users ON posts.user_id =users.id');

            //vrnemo več kot 1 rezultat
            $results = $this->db->resultSet();
            return $results;
        }

        //metoda za dodajanje posta v bazo
        public function addPost($data){
               
            //pripravimo query
            $this ->db->query('INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)');
           
             
            //bindamo vrednosti
            $this ->db ->bind(':title', $data['title']);
            $this ->db ->bind(':user_id', $data['user_id']);
            $this ->db ->bind(':body', $data['body']);
    
            //executamo
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function getPostById($id){

            $this->db->query("SELECT * FROM posts WHERE id =:id");
            $this->db->bind(':id', $id);
            
            $row = $this->db->single();
            return $row;
        }

        public function updatePost($data){
               
            //pripravimo query
            $this ->db->query('UPDATE posts SET title = :title, body =:body WHERE id = :id');
           
             
            //bindamo vrednosti
            $this ->db ->bind(':id', $data['id']);
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

        public function deletePost($id){
            //pripravimo query
            $this ->db->query('DELETE FROM posts WHERE id = :id');

            //bindamo vrednosti, ki jih dobimo v metodi -> id
            $this ->db->bind(':id', $id);
    
            //executamo
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }