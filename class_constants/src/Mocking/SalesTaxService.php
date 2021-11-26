<?php

declare(strict_types=1);

namespace App\Mocking;

class SalesTaxService
{
    public function calculate(float $amount, array $customer): float
    {
        sleep(1);

        return $amount * 6.5 / 100;
    }
}