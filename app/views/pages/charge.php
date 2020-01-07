<?php
require_once '../vendor/autoload.php'; 
require_once '../app/config/config.php';
require_once '../app/libraries/Database.php';
require_once '../app/model/Transaction.php';

    $this->userModel = $this->model('User');
   
 
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
    $price = (($_SESSION['price']+3.85)*100);
    

    //Create Customer in Stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token,
        "name" => $first_name,
        "description" => $_SESSION['title']
    ));

    //Charge Customer
    $charge = \Stripe\Charge::create(array(
        "amount" => $price,
        "currency" => "eur",
        "description" => $_SESSION['title'],
        "customer" => $customer->id
        
    ));


     // Customer Data
     $transactionData = [
        'id' => $charge->id,
        'user_id' => $_SESSION['user_id'],
        'user_name' => $_SESSION['user_name'],
        'user_lastname' => $_SESSION['user_lastname'],
        'product' => $charge->description,
        'amount' => $charge->amount,
        'currency' => $charge->currency,
        'status' => $charge->status
    ];

    // Instantiate Customer
    $transaction = new Transaction();
    // Add Customer To DB
    $transaction->addTransaction($transactionData);


    $data = [
        'id'=> $charge->id,
        'product'=>$charge->description,
        'amount' => $charge->amount
    ];
 

    flash('nakup_message', 'Izdelek uspešno kupljen');
    $this->view('pages/success', $data);