<?php

namespace App\PaymentGateway\Encapsulation;

class Transaction
{
    private float $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     *  
     * public function setAmount(float $amount)
     * {
     *    $this->amount = $amount;
     * }
     */

     public function copyFrom(Transaction $transaction) 
     {
        $transaction->generateReceipt();
        $transaction->sendEmail();
        var_dump('copyFrom', $this->amount, $transaction->amount);
     }

     public function process()
     {
         echo "process ". $this->amount . " transaction";

         $this->generateReceipt();
         $this->sendEmail();
     }

     private function generateReceipt()
     {
        echo 'generate receipt';
     }

     private function sendEmail()
     {
         echo 'send email';
     }

}