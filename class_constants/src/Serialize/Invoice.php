<?php

namespace App\Serialize;

class Invoice
{
    private string $id;

    public function __construct (
        protected int $amount,
        public string $description,
        public string $creditCardNumber )
    {
        $this->id = uniqid('invoice_id_');
    }

    public function foo()
    {
        return 'bar';
    }

    public function __sleep(): array
    {
        echo 'sleep';
        $this->creditCardNumber = base64_encode($this->creditCardNumber);
        // Todo
        return [
            'amount', //=> $this->amount, 
            'description', 
            'creditCardNumber'
            // 'creditCardNumber' => base64_encode($this->creditCardNumber) 
        ];
    }

    public function __wakeup()
    {
        // Todo
        echo 'wakup '.PHP_EOL;
        var_dump(base64_decode($this->creditCardNumber));
    }

    public function __serialize(): array
    {
        echo 'serialize';
        return [
            'id', 
            'amount', 
            'override description' => $this->description,
            'credit_card_number' => base64_encode($this->creditCardNumber)
        ];
    }

    public function __unserialize(array $data): void
    {
        echo 'unserialize'.PHP_EOL;
        // exit;
        // $this->id = $data['id'];
        // $this->amount = $data['amount'];
        $this->description = $data['override description'];
        $this->creditCardNumber = base64_decode($data['credit_card_number']);
    }
}