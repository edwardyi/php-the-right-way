<?php

class Invoice
{
    public function __destruct()
    {
        echo __CLASS__.' is destroy!'.PHP_EOL;
    }
}