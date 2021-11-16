<?php

namespace App\Enum;

class Status
{
    public const PENDING = 'pending';
    public const PAID = 'paid';
    public const DECLINED = 'declined';

    // provide status option for clients
    public const ALL_STATUSES = [
        self::PAID => 'Paid',
        self::PENDING => 'Pending',
        self::DECLINED => 'Declined'
    ];
}