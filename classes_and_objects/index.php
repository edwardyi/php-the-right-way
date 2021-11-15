<?php

declare(strict_types=1);

require('./transaction.php');

$amount1 = (new Transaction(100, "transaction 1  Description"))->addTax(8)->applyDiscount(1)->getAmount();

// must not be accessed before initialization
// public ?float $amount => public ?float $amount = null
// var_dump($transaction->amount);

// unset($transaction);
// ($transaction)->addTax(8)->applyDiscount(1)->getAmount()
var_dump('transaction 1 amount:', $amount1);

$transaction2 = (new Transaction(100, "'transaction 2 Description"))->addTax(9)->applyDiscount(10);

$amount2 = $transaction2->getAmount();

unset($transaction2);

var_dump('transaction 2 amount:', $amount2);

$transaction = null;

$arr = '{"a":1,"b":"c"}';

var_dump(json_decode($arr));


$obj = new stdClass();

$obj->d = "3";
$obj->e = "4";

var_dump("stdClass object the value of d:", $obj, $obj->{"d"});

$scalar = (object) 1;

var_dump($scalar, (object) 4);

$arrData = [3, 4, 5];

var_dump((object)$arrData);