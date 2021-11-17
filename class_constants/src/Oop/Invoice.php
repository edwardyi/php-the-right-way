<?php

declare(strict_types=1);

namespace App\Oop;

class Invoice implements \Stringable
{
    private array $data = [];

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __set($name, $value)
    {
        if (!array_key_exists($name, $this->data)) {
            $this->data[$name] = $value;
        }
    }

    public function __isset($name)
    {
        echo 'isset'.PHP_EOL;

        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo 'unset'.PHP_EOL;
        unset($this->data[$name]);
    }

    protected function process($amount, $description)
    {
        var_dump($amount, $description);
    }


    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);

            // pass without any arguments
            // $this->$name();
        }
    }

    public static function __callStatic($name, $arguments)
    {
        var_dump($name, $arguments);
    }

    public function __toString(): string
    {
        return "hello";
    }

    public function __invoke()
    {
        echo 'invoke'.PHP_EOL;
    }
}