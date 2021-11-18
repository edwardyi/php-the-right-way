<?php

namespace App\Traits;

class Invoices
{
    use SendEmailTrait;

    public function process()
    {
        echo "process invoices";

        // send email
        $this->sendMail();        
    }
}