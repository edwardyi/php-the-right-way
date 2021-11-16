<?php

use App\Enum\Status;
use App\PaymentGateway\Paddle\Transaction;

require_once("./vendor/autoload.php");

$transaction = new Transaction();

$transaction->setStatus(Status::PAID);

// $transaction->setStatus('statusNotExists');

var_dump($transaction);