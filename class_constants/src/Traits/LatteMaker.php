<?php

namespace App\Traits;

use App\Traits\CoffeeMaker;

class LatteMaker extends CoffeeMaker
{
    use LatteTrait;

    /**
    public function makeLatte() {
        echo self::class." make latte".PHP_EOL;
    }
     */
}