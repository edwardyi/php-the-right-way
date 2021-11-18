<?php

namespace App\Traits;

class Customers
{
    use SendEmailTrait;

    public function process()
    {
        echo "process customers";

        // send email
        $this->sendMail();
    }
}