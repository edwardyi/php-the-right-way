<?php

namespace App\ErrorHandling;

class Customer
{
    private string $name;

    public function __construct(private array $billingInfo = [])
    {
        
    }

    public function getBillingInfo(): array
    {
        return $this->billingInfo;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }
}