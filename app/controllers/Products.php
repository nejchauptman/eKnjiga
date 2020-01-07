<?php
    class Products extends Controller{


        public function __construct(){
           
            $this->userModel=$this->model('User');
            $this->productModel=$this->model('Product');

        }

        public function showProduct($id){
            $products = $this->productModel->getProductById($id);
            $user = $this->userModel->getUserById($products->user_id);
           
            $data = [
                'products' =>$products,
                'user' => $user
            ];

            $this->view('pages/showProduct', $data);
        }

        public function deleteProduct($id){
            if($this->productModel->deleteProduct($id)){
               flash('blog_message', 'Izbrisan produkt');
               header('Location:'.URLROOT. '/posts');
            }
            else{
               die('ne dela :(');
           }
         }

         public function sessionProduct($id){
             $products = $this->productModel->getProductById($id);
             $user = $this->userModel->getUserById($products->user_id);

             $data = [
                 'products' =>$products,
                 'user' => $user
             ];

                 $_SESSION['id'] = $products->id;
                 $_SESSION['title'] = $products->title;
                 $_SESSION['price'] = $products->price;
                 $_SESSION['body'] = $products->body;
                

                 $this->view('/pages/cart', $data);
             

         }
         public function sessionOdstraniProdukt(){

             unset($_SESSION['id']);
             unset($_SESSION['title']);
             unset($_SESSION['price']);
             unset($_SESSION['body']);
             session_destroy();
             header('Location:'.URLROOT. '/pages/cart');


         }
    }