<?php

namespace App\Traits;

trait LatteTrait
{
    public static $x = "foo";

    public function makeLatte () {
        echo self::class. " make latte".PHP_EOL;
    }

    public static function foo() {
        echo 'bar';
    }
}