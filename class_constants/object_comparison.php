<?php

use App\Comparison\Customer;
use App\Comparison\CustomInvoice;
use App\Comparison\Invoice;

require_once("./vendor/autoload.php");

$invoice1 = new Invoice(1, "demo");
$invoice2 = new Invoice(true, "demo");

var_dump($invoice1 == $invoice2);
var_dump($invoice1 === $invoice2);

$invoice3 = new CustomInvoice(12, "demo");

var_dump($invoice1 == $invoice3);
var_dump($invoice1 === $invoice3);

$invoice4 = $invoice1;
$invoice4->amount = 999;

var_dump($invoice1 == $invoice4);
var_dump($invoice1 === $invoice4);

$invoice5 = new Invoice(777, "testing", new CustomInvoice(666, "custom"));
$invoice6 = new Invoice(777, "testing", new CustomInvoice(666, "custom"));

var_dump($invoice5 == $invoice6);
var_dump($invoice5 === $invoice6);


$invoice7 = new Invoice(888, "testing", customer: new Customer("customer 1"));
$invoice8 = new Invoice(888, "testing", customer: new Customer("customer 2"));

var_dump($invoice7 == $invoice8);
var_dump($invoice7 === $invoice8);

$invoice7->linkInvoice = $invoice8;
$invoice8->linkInvoice = $invoice7;

// compare nested level
var_dump($invoice7 == $invoice8);