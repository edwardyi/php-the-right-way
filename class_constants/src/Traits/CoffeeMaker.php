<?php

namespace App\Traits;

class CoffeeMaker
{
    public static $x = "foo";
    final public function makeCoffee() 
    {
        echo static::class." make coffee".PHP_EOL;
    }
}