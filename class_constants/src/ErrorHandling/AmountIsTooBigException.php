<?php

namespace App\ErrorHandling;

use Exception;

class AmountIsTooBigException extends Exception 
{
    // protected string $message = "Amount is Too Big!";

    public function __construct()
    {
        $this->message = "Amount is Too Big";
    }
}