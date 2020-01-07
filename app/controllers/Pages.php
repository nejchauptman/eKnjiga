<?php

    class Pages extends Controller{
        public function __construct(){
            $this->postModel=$this->model('Post');
            $this->userModel=$this->model('User');
            $this->productModel=$this->model('Product');
          
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

        public function shop(){
        //dobimo posts iz našega Post modela
            $products = $this->productModel->getProducts();

            $data=['title' =>'  Trgovina',
            "description" => "Domača prodaja knjig",
            'products' => $products
            
        ];
      
            $this->view('pages/shop', $data);
        }

        public function blog(){
            
            
            $this->view('posts/index', $data);
        }

        public function cart(){
            
            $products = $this->productModel->getProducts();
            
            $data=['title' =>'  Košarica',
            "description" => "Domača prodaja knjig",
            'products' => $products ];
            
            $this->view('pages/cart',$data);
        }

        public function allTransactions(){
            
            $products = $this->productModel->getProducts();
            
            $data=['title' =>'  Košarica',
            "description" => "Domača prodaja knjig",
            'products' => $products ];
            
            $this->view('pages/allTransactions',$data);
        }
        public function myTransactions(){
            
            $products = $this->productModel->getProducts();
            
            $data=['title' =>'  Košarica',
            "description" => "Domača prodaja knjig",
            'products' => $products ];
            
            $this->view('pages/myTransactions',$data);
        }

        public function charge(){
            
            $products = $this->productModel->getProducts();

            $data=['title' =>'',
            "description" => "",
            ];
            
            $this->view('pages/charge',$data);
        }

        public function success(){
            
            $products = $this->productModel->getProducts();

            $data=['title' =>'',
            "description" => "",
            ];
            
            $this->view('pages/success',$data);
        }
        public function checkout(){
            
            $products = $this->productModel->getProducts();
         


            $data=['title' =>'',
            "description" => "",
      
            ];

            
            $this->view('pages/checkout',$data);
        }

    }