<?php

use App\StaticBinding\ClassA;
use App\StaticBinding\ClassB;

require_once("./vendor/autoload.php");

echo ClassA::getName().PHP_EOL;

echo ClassB::getName().PHP_EOL;

var_dump(ClassA::make());
var_dump(ClassB::make());