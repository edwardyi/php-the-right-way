<?php

namespace App\Oop;

class ProcessInvoice
{
    private $amount = 33;
    private $desciption = "testing";
    private string $accountNumber = "1234556";

    public function __invoke()
    {
        return 'process_invoice invoke';
    }

    public function __debugInfo(): ?array
    {
        return [
            'amount' => $this->amount,
            'description' => $this->desciption,
            'accountNumber' => '****'.substr($this->accountNumber, -3)
        ];
    }

    public function __toString()
    {
        return 'hello';
    }

}