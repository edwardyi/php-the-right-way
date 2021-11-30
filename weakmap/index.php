<?php

require "Invoice.php";

$invoice1 = new Invoice();
$invoice2 = $invoice1;

var_dump($invoice1);


unset($invoice1);

var_dump($invoice2);

$invoice3 = new Invoice();

$weakmap = new WeakMap();

$weakmap[$invoice3] = [1, 2, 3];

echo "weakmap:".PHP_EOL;

var_dump(count($weakmap)); // 1

unset($invoice3);

var_dump(count($weakmap)); // 0


$invoice4 = new Invoice();

$storage = new SplObjectStorage();
$storage[$invoice4] = [4, 5, 7];

echo "storage: ".PHP_EOL;
var_dump(count($storage)); // 1

echo "unsetting storage".PHP_EOL;

unset($invoice4);

var_dump(count($storage)); // 1