<?php

require_once("./vendor/autoload.php");

use EdwardYi\PaymentGateway\Paddle\Transaction;

$id = new \Ramsey\Uuid\UuidFactory();

echo $id->uuid4();

echo "\n";

$transaction = new Transaction();

var_dump($transaction);