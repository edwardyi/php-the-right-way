<?php

namespace App\Inheritance;

class Toast
{
    protected $slices;
    protected int $size;

    public function __construct()
    {
        $this->slices = [];
        $this->size = 2;
    }

    final public function addSlice(string $bread): void
    {
        if (count($this->slices) < $this->size) {
            $this->slices[] = $bread;
        }
    }

    public function toast()
    {
        foreach($this->slices as $i => $slice) {
            echo ($i + 1)." : Toasting ". $slice. PHP_EOL;
        }
    }

    // a parent method doesn't need to override by child class
    public function foo()
    {
        echo "bar";
    }
}