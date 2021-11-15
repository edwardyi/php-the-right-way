<?php

require_once("./PaymentProfile.php");

require_once("./Customer.php");

require_once("./Transaction.php");

$transaction = new Transaction(33, "testing");

// $transaction->customer = new Customer();
// $transaction->customer->paymentProfile = new PaymentProfile();

// var_dump($transaction->customer?->paymentProfile?->id ?? 'bar');

var_dump($transaction->getCustomer()?->getPaymentProfile() ?? 'foo');