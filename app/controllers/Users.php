<?php
    class Users extends Controller{

        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function register(){
            //preverimo za POST za formo
            if($_SERVER['REQUEST_METHOD']=='POST'){

                //procesiramo formo, uporabimo trim, da ne upoštevamo presledkov
                //sanitize-amo POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              
                //ustvarimo array
                $data = [
                    'name' => trim($_POST['name']),
                    'lastname' => trim($_POST['lastname']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'lastname_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // validacija emaila, če submitajo formo in je prazno polje
                if(empty($data['email'])){
                    $data['email_err'] = 'Vnesite Vaš email';
                }
                else{
                    //preverimo email, metoda vrne boolean vrednost
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email že obstaja';
                    }
                }

                //validiramo ime
                if(empty($data['name'])){
                    $data['name_err'] = 'Vnesite Vaše ime';
                }
                //validiramo priimek
                if(empty($data['lastname'])){
                    $data['lastname_err'] = 'Vnesite Vaše priimek';
                }
                  //validiramo geslo in njeno dolžino
                if(empty($data['password'])){
                    $data['password_err'] = 'Vnesite Vaše geslo';
                }
                else if(strlen($data['password'])<6){
                    $data['password_err'] = 'Geslo more imeti najmanj 6. znakov';
                }

                // validiramo confirm password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Vnesite Vaše geslo';
                }
                //če je pogoj zgoraj okej, preverimo če sta gesli enaki
                else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Gesli se ne ujemata';
                    }
                }

                //preverimo, da ni nobenega errorja
                if(empty($data['email_err']) && empty($data['lastname_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    //hashiramo geslo
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                   if($this->userModel ->register($data)){
                       flash('register_success', 'Uspešno ste registrirani');
                       header('Location:'.URLROOT. '/users/login');
                   }else{
                       die('Nekaj je šlo narobe :(');
                   }
                }
                else{
                    $this->view('users/register', $data);
                }
            }
            else{
                //nastavimo, da bo prazno v formi (blank form)
               $data = [
                   'name' => '',
                   'lastname' => '',
                   'email' => '',
                   'password' => '',
                   'confirm_password' => '',
                   'name_err' => '',
                   'email_err' => '',
                   'password_err' => '',
                   'confirm_password_err' => ''
               ];

               //naložimo view
               $this ->view('users/register', $data);
            }
        }

        public function login(){
            //preverimo za POST za formo
            if($_SERVER['REQUEST_METHOD']=='POST'){
            
                //procesiramo formo, uporabimo trim, da ne upoštevamo presledkov
                //sanitize-amo POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              
                //ustvarimo array
                $data = [
                    
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // validacija emaila, če submitajo formo in je prazno polje
                if(empty($data['email'])){
                    $data['email_err'] = 'Vnesite Vaš email';
                }

                //validiramo geslo 
                if(empty($data['password'])){
                   $data['password_err'] = 'Vnesite Vaše geslo';
                }

                //preverimo userjev model
                if($this->userModel->findUserByEmail($data['email'])){
                    
                }
                else{
                    $data['email_err'] = 'Uporabnik ne obstaja';
                }

                //preverimo, če je polje prazno
                if(empty($data['email_err']) && empty($data['password_err'])){
                    
                    $loggedInUser= $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        //ustvarimo sejo (metoda čisto spodaj)
                        $this->createUserSession($loggedInUser);
                    }
                    else{
                        $data['password_err'] ="Napačno geslo!";
                        $this->view('users/login', $data);
                    }
                }
                else{
                    $this->view('users/login', $data);
                }
            }
            else{
                //nastavimo, da bo prazno v formi (blank form)
               $data = [
                   'email' => '',
                   'password' => '',
                   'email_err' => '',
                   'password_err' => ''
               ];

               
               $this ->view('users/login', $data);
            }
        }

        //metoda, za ustvarjanje seje pri loginu
        public function createUserSession($user){
            // v login metodi (User.php) vrnemo row, kjer je tudi id, zato ga lahko uporabimo
            $_SESSION['user_id']= $user->id;
            $_SESSION['user_email']= $user->email;
            $_SESSION['user_name']= $user->name;
            header('Location:'.URLROOT. '/posts');
        }

        //odjavimo se
        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            header('Location:'.URLROOT. '/users/login');
        }
    }