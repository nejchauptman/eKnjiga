<?php
   session_start();

   //flash messages, default alert message je success
   //primer izvedbe: flash ('register_success', 'Uspešno registriran uporabnik", boostrap alert message);
   function flash($name = '', $message='', $class ='alert alert-success'){
       if(!empty($name)){
           //če pošljemo message in to še ni nastavljeno v seji
           if (!empty($message)&& empty($_SESSION[$name])){

               //če pa imata pa unsetamo
               if(!empty($_SESSION[$name])){
                   unset($_SESSION[$name]);
               }
               if(!empty($_SESSION[$name .'_class'])){
                unset($_SESSION[$name .'_class']);
               }

               //setamo sejo
               $_SESSION[$name] = $message;
               $_SESSION[$name .'_class'] = $class;
           }
           //ower
           else if(empty($message)&& !empty($_SESSION[$name])){
                $class =!empty($_SESSION[$name .'_class']) ? $_SESSION[$name .'_class'] : '';
                echo '<div class ="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name .'_class']);
           }
       }
   }

    //za preverjamje, če je uporabnik prijavljen
     function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        else {
            return false;
        }
    }
    
    function isAdmin(){
        if(isset($_SESSION['user_id'])==5){
            return true;
        }
        else {
            return false;
        }
    }

   