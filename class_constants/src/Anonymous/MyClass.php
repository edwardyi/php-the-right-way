<?php

namespace App\Anonymous;

class MyClass
{
    public function __construct(public float $amount, public string $description)
    {
        
    }

    public function bar()
    {
        echo 'bar'.PHP_EOL;
    }

    public function test(): object
    {
        return new Class($this->amount, $this->description) extends MyClass {
            public function __construct($a, $b)
            {
                parent::__construct($a, $b);

                echo 'demo anonymous function'.PHP_EOL;
            }

        };
    }
}