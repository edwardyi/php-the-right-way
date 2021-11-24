<?php

declare(strict_types = 1);

namespace App\ServerInfo;

/**
 * @property-read ?array $db
 */
class Config
{
    protected array $config;

    // [
    //     'driver' => 'mysql',
    //     'host' => $_ENV['HOST'],
    //     'user' => $_ENV['DB_USER'],
    //     'password' => $_ENV['DB_PASSWORD']
    // ]
    public function __construct(array $env)
    {
        // $this->config['db'] = [
        //     'host' => $env['DB_HOST'],
        //     'database' => $env["DB_NAME"],
        //     'user' => $env['DB_USERNAME'],
        //     'password' => $env['DB_PASSWORD'],
        //     'driver' => $env['DRIVER'] ?? 'mysql'
        // ];
        // add some flexibility
        $this->config = [
            'db' => [
                'host' => $env['DB_HOST'],
                'database' => $env["DB_NAME"],
                'user' => $env['DB_USERNAME'],
                'password' => $env['DB_PASSWORD'],
                'driver' => $env['DRIVER'] ?? 'mysql'
            ]
        ];
    }

    /**
     * magic get function
     *
     * @param string $name
     * @return array|null
     */
    public function __get(string $name): array
    {
        return $this->config[$name] ?? null;
    }
}