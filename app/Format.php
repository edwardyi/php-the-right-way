<?php

declare(strict_types=1);

namespace App;

class Format
{
    public static function money(float $amount)
    {
        return ($amount > 0 ? '+':'-'). '$'.abs($amount);
    }

    public static function date(string $date)
    {
        return date("M-d Y", strtotime($date));
    }

    public static function rowStyle(string $amount)
    {
        return 'style="color:'. ($amount > 0 ? 'green' : 'red'). '"';
    }
}