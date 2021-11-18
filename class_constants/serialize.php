<?php

use App\Serialize\Invoice;

require_once("./vendor/autoload.php");

var_dump(serialize(1));
var_dump(serialize(["123"]));
var_dump('unserialize false result:', unserialize(false), "====");
var_dump(unserialize(serialize(["a" => 1, "b" => 2])));

$invoice = new Invoice(24, "demo", "43661233123");

$str = serialize($invoice);
$invoice2 = unserialize($str);

// $str = '{s:25:"App\Serialize\Invoiceid";i:0;s:9:"*amount";i:3;s:11:"description";s:4:"demo";}';

var_dump($invoice, $invoice2, $str , $invoice == $invoice2, $invoice === $invoice2);

var_dump('invoice2 info', $invoice2);