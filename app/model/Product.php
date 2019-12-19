<?php 
    class Product {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }


        public function getProducts(){
            $this->db->query('SELECT *, products.id as productId, users.id as userId FROM products INNER JOIN users ON products.user_id =users.id');
           
             //vrnemo več kot 1 rezultat
             $results = $this->db->resultSet();
             return $results;
         }


        public function addProduct($data){
                    
            //pripravimo query
            $this ->db->query('INSERT INTO products (user_id,title, price, body, post_image) VALUES ( :user_id, :title, :price,:body, :post_image)');
            
             //bindamo vrednosti
             $this ->db ->bind(':title', $data['title']);
             $this ->db ->bind(':user_id', $data['user_id']);
             $this ->db ->bind(':body', $data['body']);
             $this ->db ->bind(':price', $data['price']);
             $this ->db ->bind(':post_image', $data['post_image']);
            
             //executamo
             if($this->db->execute()){
               return true;
             }
            else{
                return false;
            }
        }

        public function getProductById($id){

            $this->db->query("SELECT * FROM products WHERE id =:id");
            $this->db->bind(':id', $id);
            
            $row = $this->db->single();
            return $row;
        }

        public function deleteProduct($id){
            //pripravimo query
            $this ->db->query('DELETE FROM products WHERE id = :id');

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