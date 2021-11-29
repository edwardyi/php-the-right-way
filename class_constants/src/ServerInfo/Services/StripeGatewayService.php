<?php

declare(strict_types=1);

namespace App\ServerInfo\Services;

class StripeGatewayService implements PaymentGatewayInterface
{
    public function charge(array $customer, float $amount, float $tax): bool
    {
        echo 'stripe';
        
        return (bool) mt_rand(0, 1);
    }
}