<?php

namespace App\Interface;

use App\Interface\CollectAgency;

class DebtCollectService
{
    public function collect(DebtCollector $agent) {

        $ownAmount = mt_rand(100, 1000);
        $collectAmount = $agent->collect($ownAmount); 

        echo "Collected $".$collectAmount. ' out of '.$ownAmount.PHP_EOL;

        return $collectAmount;
    }
}