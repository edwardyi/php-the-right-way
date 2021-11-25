<?php

declare(strict_types=1);

namespace Tests\DataProviders;

class RouterDataProvider
{
    public static function routeNotFound(): array
    {
        return [
            ['/users', 'put'],
            ['/invoices', 'post'],
            ['/users', 'get'],
            ['/users', 'put'],
            ['/users', 'store']
        ];
    }
}