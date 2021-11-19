<?php

namespace App\Iterator;

use ArrayIterator;
use IteratorAggregate;

class Aggregator implements IteratorAggregate
{
    public function __construct(private array $items)
    {
        
    }

    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

}