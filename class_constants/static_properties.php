<?php

use App\Db;
use App\PaymentGateway\StaticProperty\Transaction;

require_once("./vendor/autoload.php");

$transaction = new Transaction(3, "Hello");
$transaction = new Transaction(3, "Hello");
$transaction = new Transaction(3, "Hello");
$transaction = new Transaction(3, "Hello");

// TransactionFactory::make(3, "world");

var_dump($transaction);

$transaction->process();


var_dump($transaction->getCounter());

$db = Db::getInstance([]);
$db = Db::getInstance([]);
$db = Db::getInstance([]);
$db = Db::getInstance([]);

var_dump($db);