<?php

declare(strict_types=1);

namespace App\ServerInfo\Services;

class PaymentGatewayService
{
    public function charge(array $customer, float $amount, float $tax): bool
    {
        sleep(10);
        
        return (bool) mt_rand(0, 1);
    }
}