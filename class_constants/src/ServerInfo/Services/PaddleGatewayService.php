<?php

declare(strict_types=1);

namespace App\ServerInfo\Services;

class PaddleGatewayService implements PaymentGatewayInterface
{
    public function charge(array $customer, float $amount, float $tax): bool
    {
        echo 'paddle gateway';
        // sleep(10);
        
        return (bool) mt_rand(0, 1);
    }
}