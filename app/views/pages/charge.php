<?php
require_once '../vendor/autoload.php'; 

   
   
 
    \Stripe\Stripe::setApiKey('sk_test_X5q9AU3hidgu0VfUy5N3SV9V00skEp8eN5');

    // Sanitize POST array
    $POST = filter_var_array($_POST,FILTER_SANITIZE_STRING);

    $first_name = $POST['first_name'];
    $last_name = $POST['last_name'];
    $email = $POST['email'];
    $city = $POST['city'];
    $place = $POST['place'];
    $zip = $POST['zip'];
    $token = $POST['stripeToken'];

    //Create Customer in Stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token
    ));

    //Charge Customer
    $charge = \Stripe\Charge::create(array(
        "amount" => 5000,
        "currency" => "eur",
        "description" => "eKnjiga!!!!",
        "customer" => $customer->id
    ));

    $data = [
        'id'=> $charge->id,
        'product'=>$charge->description
    ];
 
    $this->view('pages/success', $data);