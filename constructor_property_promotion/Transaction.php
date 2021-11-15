<?php

class Transaction
{
    public ?Customer $customer = null;

    public function __construct (
        public float $amount,
        public ?string $description = null,
    ) {

    }

    public function getCustomer(): ?Customer {
        return $this->customer;
    }
}
