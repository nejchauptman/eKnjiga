<?php
    class Posts extends Controller{

        public function __construct(){
            //ker ne želimo, da bi imel kdo dostop, ki ni prijavljen

            //če nismo prijavljeni, kličemo metodo is helperja
            if(!isLoggedIn()){
              header('Location:'.URLROOT. '/users/login');
            }

            $this->postModel=$this->model('Post');
            $this->userModel=$this->model('User');
            $this->productModel=$this->model('Product');

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
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => '',
                    'user_err' => ''
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

        public function show($id){

            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);
           
            $data = [
                'post' =>$post,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }

        //potrebujemo id, da vemo kateri post bomo editali
        public function edit($id){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
             
                //sanitize-amo post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
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
                    if($this->postModel->updatePost($data)){
                        flash('blog_message', 'Posodobljen blog');
                        header('Location:'.URLROOT. '/posts');

                    }
                    else{
                        die("ne dela :(");
                    }
                }
                else{
                    //naložimo view z errorji
                    $this->view('posts/edit', $data);
                }
            }
            else{
                // pridobivamo obstoječi post iz modela
                $post = $this->postModel->getPostById($id);

                //preverimo ownerja
                if($post->user_id != $_SESSION['user_id']){
                    header('Location:'.URLROOT. '/posts');
                }

                $data =[
                    'id' =>$id,
                    'title' => $post->title,
                    'body' => $post->body
                ];
                $this->view('posts/edit', $data);
            }
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if($this->postModel->deletePost($id)){
                    flash('blog_message', 'Izbrisan blog');
                    header('Location:'.URLROOT. '/posts');
                }
                else{
                    die('ne dela :(');
                }
            }
            else{
                header('Location:'.URLROOT. '/posts');
            }
        }

        // del za PRODUKTE -- SHOP

        public function addProduct(){

            if(isset($_POST['submit'])){
                $target = "./images/".basename($_FILES['postimage']['name']);

                //sanitize-amo post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data =[
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'price' => trim($_POST['price']),
                    'post_image' => $_FILES['postimage']['name'],
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => '',
                    'user_err' => '',
                    'price_err' => ''
                ];

                

                //validiramo naslov
                if(empty($data['title'])){
                    $data['title_err'] = 'Vnesite naslov';
                }

                 //validiramo telo vsebine
                 if(empty($data['body'])){
                    $data['body_err'] = 'Vnesite vsebino';
                }

                //preverimo da ni errorjev in dodamo
                if(empty($data['title_err']) && empty($data['body_err'])){
                    //če fieldi niso prazni oz ni errorjev
                    move_uploaded_file($_FILES['postimage']['tmp_name'], $target);
                    if($this->productModel->addProduct($data)){
                        flash('product_message', 'dodan izdelek');
                        header('Location:'.URLROOT. '/pages/shop');
                    }
                    else{
                        die("ne dela :(");
                    }
                }
                else{
                    //naložimo view z errorji
                    $this->view('posts/addProduct', $data);
                }
            }
            else{
                $data =[
                    'title' => '',
                    'body' => ''
                ];
                $this->view('posts/addProduct', $data);
            }
        }

        public function allProducts(){
            //dobimo posts iz našega Post modela
            $products = $this->productModel->getProducts();

            $data =[
                'products' => $products
            ];
            $this->view('posts/allProducts', $data);
        }
      
    }