<?php
namespace App\Traits;

Trait SendEmailTrait
{
    public function sendMail()
    {
        echo static::class.' send mail'.PHP_EOL;
    }
}