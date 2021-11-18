<?php

use App\Anonymous\MyClass;
use App\Anonymous\MyInterface;

require_once("./vendor/autoload.php");

$obj = new Class(112, "testing") extends MyClass implements MyInterface {
    // property promotion
    public function __construct(protected float $x, public string $y)
    {
        
    }
    public function foo()
    {
        echo 'foo'.PHP_EOL;
    }

    public function hello()
    {
        echo "world".PHP_EOL;
    }

};

function test(MyInterface $obj)
{
    $obj->hello();
}

test($obj);

$obj->foo();
$obj->bar();

$demoObj = new MyClass(123, "demo");
$demoObj->test();

var_dump($obj);