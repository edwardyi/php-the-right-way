<?php

declare(strict_types=1);

require_once("./Paddle/Transaction.php");
require_once("./Stripe/CustomerProfile.php");
require_once("./Stripe/Transaction.php");

// use PaymentGateway\Stripe\{CustomerProfile, Transaction};
use PaymentGateway\Paddle\Transaction as PaddleTransaction;
use PaymentGateway\Stripe;

$customerProfile = new Stripe\CustomerProfile();
$transaction = new Stripe\Transaction();
$paddleTransaction = new PaddleTransaction();

var_dump($customerProfile, $transaction, $paddleTransaction);
