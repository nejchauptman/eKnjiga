<?php
    class Posts extends Controller{

        public function __construct(){
            //ker ne želimo, da bi imel kdo dostop, ki ni prijavljen

            //če nismo prijavljeni, kličemo metodo is helperja
            if(!isLoggedIn()){
              header('Location:'.URLROOT. '/users/login');
            }

            $this->postModel=$this->model('Post');
        }

        public function index(){
            //dobimo posts iz našega Post modela
            $posts = $this->postModel->getPosts();

            $data =[
                'posts' => $posts
            ];
            $this->view('posts/index', $data);
        }

        public function add(){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
             
                //sanitize-amo post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'title_err' => '',
                    'body_err' => ''
                ];

                //validiramo naslov
                if(empty($data['title'])){
                    $data['title_err'] = 'Vnesite naslov';
                }

                 //validiramo telo vsebine
                 if(empty($data['body'])){
                    $data['body_err'] = 'Vnesite vsebino';
                }

                //preverimo da ni errorjev
                if(empty($data['title_err']) && empty($data['body_err'])){
                    //če fieldi niso prazni oz ni errorjev
                    if($this->postModel->addPost($data)){
                        flash('blog_message', 'Dodan blog');
                        header('Location:'.URLROOT. '/posts');

                    }
                    else{
                        die("ne dela :(");
                    }
                }
                else{
                    //naložimo view z errorji
                    $this->view('posts/add', $data);
                }
            }
            else{
                $data =[
                    'title' => '',
                    'body' => ''
                ];
                $this->view('posts/add', $data);
            }
        }
    }