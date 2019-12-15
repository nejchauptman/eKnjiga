<?php
    class User {

        private $db;

        public function __construct(){
            //Inicializiramo database
            $this->db = new Database;
        }

        //najdi userja po mailu, uporabili če email v bazi že obstaja 
        public function findUserByEmail($email){

            //iz razreda DB kličemo metodo in izvedemo povpraševanje po emailu
            $this->db->query("SELECT * FROM users WHERE email = :email");
            $this ->db ->bind(':email', $email);

            //preverimo, če obstaja sploh kak zato rabimo 1.
            $row = $this->db->single();

            //preverimo če je več zadetkov kot 0
            if($this->db->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }

        //metoda za registracijo
        public function register($data){

            //pripravimo query
            $this ->db->query('INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)');
           
            //bindamo vrednosti
            $this ->db ->bind(':name', $data['name']);
            $this ->db ->bind(':lastname', $data['lastname']);
            $this ->db ->bind(':email',$data['email']);
            $this ->db ->bind(':password', $data['password']);

            //executamo
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //login metoda
        public function login($email, $password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email' ,$email);

            $row=$this->db->single();
            $hashedPassword = $row->password;

            //če se passworda ujemata, vrnemo row iz db
            if(password_verify($password, $hashedPassword)){
                return $row;
            }
            else{
                return false;
            }
        }

    
        public function getUserById($id){

            $this->db->query("SELECT * FROM users WHERE id =:id");
            $this->db->bind(':id', $id);
            
            $row = $this->db->single();
            return $row;
        }
    }