<?php

use App\PaymentGateway\Encapsulation\Transaction;

require_once("./vendor/autoload.php");

$transaction = new Transaction(33);

$reflectionObj = new ReflectionProperty(Transaction::class, "amount");

$reflectionObj->setAccessible(true);

$reflectionObj->setValue($transaction, 22);

var_dump($reflectionObj->getValue($transaction));

// $transaction->setAmount(123);

$transaction->process();

$transaction->copyFrom(new Transaction(100));