<?php

use App\CloneObject\Invoice;

require_once("./vendor/autoload.php");

$invoice1 = new App\CloneObject\Invoice();
$invoice2 = new App\CloneObject\Invoice();

var_dump($invoice1 == $invoice2);

$invoice3 = clone $invoice1;

var_dump($invoice1 == $invoice3);

var_dump($invoice1, $invoice2, $invoice3, Invoice::create());