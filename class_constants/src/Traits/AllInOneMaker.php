<?php

namespace App\Traits;

use App\Traits\CoffeeMaker;

class AllInOneMaker extends CoffeeMaker
{
    use CuppuccinoTrait 
    {
        CuppuccinoTrait::makeLatte insteadOf LatteTrait;
        CuppuccinoTrait::makeCappuccino as public;
    }

    use LatteTrait 
    {
        LatteTrait::makeLatte as makeOriginalLatte;
    }

    public function makeLatte()
    {
        echo __CLASS__." with allInOne final override testing".PHP_EOL;
    }

    public function getMilkType(): string
    {
        return 'wheat milk';
    }
}