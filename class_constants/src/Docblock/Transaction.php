<?php

namespace App\Docblock;

/**
 * Transaction
 * 
 * @property int $x
 * @property float $y
 * 
 * @method int foo(string $x)
 * @method static int bar(string $x)
 */
class Transaction
{
    /**
     * @var Product
     */
    private $product;

    public function __get(string $name)
    {
        // Todo
    }

    public function __set(string $name, $value): void
    {
        // Todo
    }

    public function __call()
    {
        // Todo
    }

    public static function __callStatic($name, $arguments)
    {
        // Todo
    }

    /**
     * process
     *
     * @param Customer $customer
     * @param float|int $amount
     * 
     * @throw \RuntimeException
     * @throw \InvalidArgumentException
     * 
     * @return bool
     */
    public function process($customer, $amount)
    {
        // process transaction

        // if failed, return false

        // otherwise return true
        return true;
    }

    /**
     * @param Product[] $bar
     * @return void
     */
    public function foo(array $bar)
    {
        /** @var Product $product */
        foreach ($bar as $data) {
            $data->amount;
        }
    }
}