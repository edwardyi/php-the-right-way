<?php

use App\Oop\Invoice;
use App\Oop\ProcessInvoice;

require_once("./vendor/autoload.php");

$invoice = new Invoice();

$invoice->amount = 15;

var_dump($invoice->amount, $invoice);

var_dump(isset($invoice->amount));


unset($invoice->amount);

$invoice->amount = 17;


var_dump(isset($invoice->amount));

$invoice->process(17, "testing");


$processInvoice = new ProcessInvoice();

var_dump("Stringable:", $processInvoice instanceof Stringable);
echo $processInvoice.PHP_EOL;

var_dump(is_callable($processInvoice));

var_dump($processInvoice());

var_dump($processInvoice);



/**
$invoice->name = "testing";
$invoice->unknown = "arcane";

var_dump($invoice); */