<?php

declare(strict_types=1);

namespace App\ServerInfo;

use App\ServerInfo\Exception\RouteNotFoundException;
use App\ServerInfo\View;

class App
{
    // private static \PDO $db;
    private static DB $db;

    public function __construct(protected Route $router, protected array $request, protected Config $config)
    {
        static::$db = new DB($config->db ?? []);
    }

    // public static function db(): \PDO
    public static function db(): DB
    {
        return static::$db;
    }

    public function run()
    {
        try {
            echo $this->router->resolve(
                $this->request['uri'],
                $this->request['method']
            );

        } catch (RouteNotFoundException $e) {
            http_response_code(404);

            echo View::make('Error/404');
        }
    }
}