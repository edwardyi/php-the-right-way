<?php

namespace App\Traits;

use App\Traits\CoffeeMaker;

class CappuccinoMaker extends CoffeeMaker
{
    use CuppuccinoTrait 
    {
        CuppuccinoTrait::makeCappuccino as public;
    }

    public function getMilkType(): string
    {
        return 'skim milk';
    }

    // use CuppuccinoTrait {
    //     CuppuccinoTrait::makeCappuccino as public;
    // }
    
    // public function makeCappuccino() {
    //     echo static::class." make latte(Updated)".PHP_EOL;
    // }
}
