<?php

use App\Traits\AllInOneMaker;
use App\Traits\CappuccinoMaker;
use App\Traits\CoffeeMaker;
use App\Traits\Customers;
use App\Traits\LatteMaker;

require_once("./vendor/autoload.php");

$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();
$latteMaker->makeLatte();

$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCoffee();
$cappuccinoMaker->makeCappuccino();


$allInOneMaker = new AllInOneMaker();
$allInOneMaker->makeCoffee();
$allInOneMaker->makeLatte();
$allInOneMaker->makeOriginalLatte();
$allInOneMaker->makeCappuccino();

$allInOneMaker->setMilkType('banana-milk');
$allInOneMaker->makeCappuccino();

LatteMaker::$x = 'bar';
AllInOneMaker::$x = 'final x';

var_dump(LatteMaker::$x);

var_dump(AllInOneMaker::$x);

CoffeeMaker::$x = "testing";
var_dump(CoffeeMaker::$x, AllInOneMaker::$x, $latteMaker::$x);

$customer = new Customers();
$customer->process();