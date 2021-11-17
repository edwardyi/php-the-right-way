<?php

namespace App\Interface;

class CollectAgency implements DebtCollector
{
    public function __construct()
    {
        echo "collect agency";
    }

    public function collect(float $ownAmount): float
    {
        $guaranteed = $ownAmount * 0.5;
        return mt_rand($guaranteed, $ownAmount);
    }
}