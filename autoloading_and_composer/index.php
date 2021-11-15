<?php

// require_once("./Stripe/Transaction.php");
// require_once("./Paddle/Transaction.php");

spl_autoload_register(function($class) {

    $src = "src";
    $prefix = "EdwardYi/PaymentGateway";

    $class = __DIR__.lcfirst(str_replace("\\", "/", $class)).".php";

    $class = str_replace(lcfirst($prefix), "/".$src, $class);

    if (file_exists($class)) {
        require_once($class);
    }
    
    // echo 'spl 1';
});

// spl_autoload_register(function() {
//     echo 'spl 2';
// }, prepend: true);

use EdwardYi\PaymentGateway\Paddle\Transaction;

$transaction = new Transaction();

var_dump($transaction);