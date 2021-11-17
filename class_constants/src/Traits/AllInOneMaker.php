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

    public function getMilkType(): string
    {
        return 'wheat milk';
    }
}