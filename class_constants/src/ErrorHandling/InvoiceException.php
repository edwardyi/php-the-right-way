<?php

namespace App\ErrorHandling;

use Exception;

class InvoiceException extends Exception
{

    public static function CustomerNameNotExists(): static
    {
        return new static("customer name is required!");
    }

}