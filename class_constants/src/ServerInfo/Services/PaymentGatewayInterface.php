<?php

namespace App\ServerInfo\Services;

interface PaymentGatewayInterface
{
    public function charge(array $customer, float $amount, float $tax);
}