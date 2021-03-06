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
             $_SESSION['title']=$products->title;
             $_SESSION['price']=$products->price;

            /* if(isset($_POST["add_to_cart"])) {

                 if (!isset($_SESSION["shopping_cart"])) {
                     $kosarica = array();
                     $array=[$products->id,
                         $products->title,
                         $products->price];

                     $noviVnos = new ArrayObject($array);

                     array_push($kosarica, $noviVnos);
                     $_SESSION["shopping_cart"] = $kosarica;


                 } else {
                     $noviVnos = (object)[];
                     $noviVnos->$products->id;
                     $noviVnos->$products->title;
                     $noviVnos->$products->price;
                     array_push($_SESSION["shopping_cart"], $noviVnos);

                 }
             }
            */
             $this->view('/pages/cart', $data);

         }
         public function sessionOdstraniProdukt(){

             unset($_SESSION['id']);
             unset($_SESSION['title']);
             unset($_SESSION['price']);
             unset($_SESSION['body']);
             header('Location:'.URLROOT. '/pages/cart');

         }
    }