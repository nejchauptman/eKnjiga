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
    }