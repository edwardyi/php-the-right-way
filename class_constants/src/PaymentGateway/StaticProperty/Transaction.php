<?php

namespace App\PaymentGateway\StaticProperty;

class Transaction
{
    // put it after modifier(public)
    public static int $counter = 0;

    public function __construct (
        public float $amount,
        public string $description
    ) {
        self::$counter = self::$counter + 1;
    }

    public function getCounter(): int
    {
        return self::$counter;
    }

    public function process()
    {
        array_map(function() {
            var_dump("process amount: ", $this->amount);
        }, [99, 100]);
    }
}