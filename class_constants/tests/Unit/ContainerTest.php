<?php

namespace Tests\Unit;

use App\ServerInfo\Exception\Container\ContainerException;
use App\ServerInfo\Container;
use App\ServerInfo\Models\Model;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionMethod;

class ContainerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->container = new Container();
    }

    /**
     * @test
     * 
     * @return void
     */
    public function there_are_no_entries_when_container_created()
    {
        $this->assertEmpty($this->container->entries());
    }

    /**
     * @test
     * 
     * @return void
     */
    public function it_set_an_entries_to_container()
    {
        $this->container->set('test', function() { return 'test'; });

        $expected = [
            'test' => function() {
                return 'test';
            }
        ];

        $this->assertEquals($expected, $this->container->entries());
    }

    /**
     * @test
     *
     * @return void
     */
    public function throw_container_exception_when_abstract_object_is_passing_as_an_argument()
    {
        $abstractModel = new ReflectionClass(Model::class);

        $this->container->set(Model::class, function () { return 'abstract model is set'; });

        // @see https://vimsky.com/zh-tw/examples/usage/php-reflectionclass-isinstantiable-function.html
        // expect exception must prior to resolve function
        $this->expectException(ContainerException::class);
        
        $this->container->resolve(Model::class);
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_will_resolve_object()
    {
        // @see https://www.php.net/manual/en/reflectionclass.getconstructor.php
        $testClass = new class() {};

        $this->container->set($testClass::class, function():void {});

        $expected = new $testClass;

        $this->assertEquals($expected, $this->container->resolve($testClass::class));

        // @see https://stackoverflow.com/questions/4262350/how-do-i-get-the-type-of-constructor-parameter-via-reflection
        // with constructor but without parameter case 
        $testClassWithPrivateConstructor = new class() {
            public function __construct() 
            {

            }
        };

        $expected = new $testClassWithPrivateConstructor();

        $this->assertEquals($expected, $this->container->resolve($testClassWithPrivateConstructor::class));
    }

    /**
     * @test
     *
     * @return void
     */
    public function throw_container_exception_when_passing_php_builtIn_type_hinting()
    {
        $customerName = 'tttt';
        $amount = 100;

        $testClassWithConstructor = new class($customerName, $amount) {
            public function __construct(string $customerName, int $amount) {

            }
        };

        $this->expectException(ContainerException::class);
        $this->container->resolve($testClassWithConstructor::class);
    }
}