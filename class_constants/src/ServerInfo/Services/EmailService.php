<?php

declare(strict_types=1);

namespace App\ServerInfo\Services;

class EmailService
{
    public function send(array $customer, string $type): bool
    {
        sleep(1);
        
        return true;
    }
}