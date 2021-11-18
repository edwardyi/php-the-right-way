<?php

namespace App\Traits;

trait LatteTrait
{
    public static $x = "foo";

    // can not be override final method from class
    // public function makeCoffee() {
    //     echo static::class." make coffee by latte";
    // }

    final public function makeLatte ()
    {
        echo self::class. " make latte".PHP_EOL;
    }

    public static function foo()
    {
        echo 'bar';
    }
}