<?php

namespace App\CloneObject;

class Invoice
{
    private string $id;

    public function __construct()
    {
        echo 'construct';
        $this->id = uniqid("invoice_");
    }

    public function __clone()
    {
        echo 'clone';
        $this->id = uniqid("invoice_");
    }

    public static function create(): static
    {
        return new static;
    }
}