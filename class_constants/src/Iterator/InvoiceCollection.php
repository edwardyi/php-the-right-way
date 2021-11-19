<?php

namespace App\Iterator;

use Iterator;

class InvoiceCollection implements Iterator
{
    private int $keyId = 0;

    public function __construct(private array $invoices)
    {
        
    }

    public function key()
    {
        echo __METHOD__.PHP_EOL;
        // return key($this->invoices);
        return $this->keyId;
    }

    public function current()
    {
        echo __METHOD__.PHP_EOL;
        // return current($this->invoices);

        var_dump($this->keyId);

        return $this->invoices[$this->keyId];
    }

    public function next()
    {
        echo __METHOD__.PHP_EOL;
        // next($this->invoices);

        // increment keyId after modify 
        $this->keyId++;
    }

    public function valid()
    {
        echo __METHOD__.PHP_EOL;
        // return current($this->invoices) !== false;
        return isset($this->invoices[$this->keyId]);
    }

    public function rewind()
    {
        // reset($this->invoices);

        $this->keyId = 0;
        // rewind(current($this->invoices));
        // rewind($this->invoices);
    }
}