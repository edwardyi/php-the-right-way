<?php

namespace App\ErrorHandling;

use Exception;
use InvalidArgumentException;

class Invoice
{
    public float $amount;

    public function __construct(public Customer $customer)
    {
        
    }

    public function setAmount(float $amount)
    {
        $this->amount = $amount;
    }

    public function process($amount)
    {
        if ($amount < 0) {
            throw new Exception("Invalid amount");
        }

        if ($amount > 1000) {
            // throw new AmountIsTooBigException("Amount is too big");
            throw new AmountIsTooBigException();
        }

        if (count($this->customer->getBillingInfo()) == 0) {
            throw new InvalidArgumentException("billing info is required");
        }

        if (empty($this->customer->getName())) {
            throw InvoiceException::CustomerNameNotExists();
        }

        array_rand([], 1);
        sleep(1);
        
        echo static::class.' process done for '. $this->customer->getName().PHP_EOL;

    }
}