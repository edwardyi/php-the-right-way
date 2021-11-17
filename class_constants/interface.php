<?php

use App\Interface\{DebtCollectService, CollectAgency, Rocky};

require_once("./vendor/autoload.php");

$agency = new CollectAgency();

$amount = $agency->collect(100);

var_dump($amount);

$debtCollectService = new DebtCollectService();

$serviceAmount = $debtCollectService->collect(new CollectAgency());


$serviceAmount = $debtCollectService->collect(new Rocky());
