<?php

namespace App\Interface;

use App\Interface\DebtCollector;

class Rocky implements DebtCollector
{
    public function __construct()
    {
        echo 'rocky';
    }

    public function collect(float $ownAmount): float
    {

        return $ownAmount * 0.65;
    }
}