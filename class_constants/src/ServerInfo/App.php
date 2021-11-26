<?php

declare(strict_types=1);

namespace App\ServerInfo;

use App\ServerInfo\Exception\RouteNotFoundException;
use App\ServerInfo\Services\EmailService;
use App\ServerInfo\Services\InvoiceService;
use App\ServerInfo\Services\PaymentGatewayService;
use App\ServerInfo\Services\SalesTaxService;
use App\ServerInfo\View;

class App
{
    // private static \PDO $db;
    private static DB $db;

    // test container
    public static Container $container;

    public function __construct(protected Route $router, protected array $request, protected Config $config)
    {
        static::$db = new DB($config->db ?? []);

        static::$container = new Container();

        // not ideal but works
        // define invoice service
        static::$container->set(
            InvoiceService::class,
            function (Container $c) {
                return new InvoiceService(
                    $c->get(SalesTaxService::class),
                    $c->get(PaymentGatewayService::class),
                    $c->get(EmailService::class)
                );
            }
        );

        // define three other service for invoice service
        static::$container->set(SalesTaxService::class, fn()=> new SalesTaxService());
        static::$container->set(PaymentGatewayService::class, fn()=> new PaymentGatewayService());
        static::$container->set(EmailService::class, fn()=> new EmailService());
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