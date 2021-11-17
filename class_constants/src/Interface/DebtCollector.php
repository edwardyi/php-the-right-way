<?php

namespace App\Interface;

use App\Interface\SomeInterface;

interface DebtCollector extends SomeInterface, AnotherInterface
{

    public function __construct();

    public function collect(float $ownAmount): float;
}