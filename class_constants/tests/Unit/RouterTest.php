<?php

namespace Tests\Unit;

use App\ServerInfo\Container;
use App\ServerInfo\Exception\RouteNotFoundException;
use App\ServerInfo\Route;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    protected function setUp():void
    {
        parent::setUp();
        $container = new Container();
        $this->router = new Route($container);
    }
    public function test_it_registers_a_route(): void
    {
        $this->router->register('get', '/users', ["Users", "index"]);

        $expected = [
            'get' => [
                '/users' => ["Users", "index"]
            ]
        ];

        $this->assertEquals($expected, $this->router->routes());
    }

    /**
     * @test
     * @return void
     */
    public function there_are_no_routes_when_router_is_created(): void
    {
        $this->assertEmpty($this->router->routes());
    }

    /**
     * @test
     * @dataProvider Tests\DataProviders\RouterDataProvider::routeNotFound
     *
     * @param string $requestUri
     * @param string $requestMethod
     * @return void
     */
    public function it_throws_route_not_found_exception(
        string $requestUri,
        string $requestMethod
    ): void {
        $user = new class {
            public function delete() {
                return true;
            }
        };
        $this->router->post('/users', [$user::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        // exception trigger by resolve
        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }

    public function routerNotFoundCases(): array
    {
        return [
            ['/users', 'put'],
            ['/invoices', 'post'],
            ['/users', 'get'],
            ['/users', 'put'],
            ['/users', 'store']
        ];
    }

    /**
     * @test
     *
     * @return void
     */
    public function it_resolves_route_from_a_closure(): void
    {
        $this->router->get('/users', fn() => [1, 2, 3]);

        $this->assertSame(
            [1, 2, 3],
            $this->router->resolve('/users', 'get')
        );
    }

    /**
     * @test
     * 
     * @return void
     */
    public function it_resolves_route(): void
    {
        $users = new class() {
            public function index(): bool
            {
                return false;
            }
        };

        $this->router->get('/users', [$users::class, 'index']);

        $this->assertEquals(
            0,
            $this->router->resolve('/users', 'get')
        );
    }
}