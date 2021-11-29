<?php

use App\ServerInfo\Controllers\Home;
use App\ServerInfo\Controllers\Invoice;
use App\ServerInfo\Exception\RouteNotFoundException;
use App\ServerInfo\App;
use App\ServerInfo\Config;
use App\ServerInfo\Container;
use App\ServerInfo\Route;
use App\ServerInfo\View;

require_once("./vendor/autoload.php");

set_exception_handler(function (\Throwable $e) {
    var_dump('exception:', $e->getMessage(), $e->getTraceAsString());
});

session_start();
// echo phpinfo();
// exit;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

define("STORAGE_PATH", __DIR__.'/src/ServerInfo/storage');
define("VIEW_PATH", __DIR__.'/src/ServerInfo/Views');

try {
    $container = new Container();
    $route = new Route($container);

    $route->get(
        '/server_info.php',
        function() {
            echo 'Home';
        }
    );

    $route->get(
        '/server_info.php/invoice',
        function() {
            echo 'Invoice';
        }
    );

    $route->get(
        '/server_info.php/home/welcome',
        [Home::class, 'welcome']
    )->get(
        '/server_info.php/home/index',
        [Home::class, 'index']
    )->get(
        '/server_info.php/home/test',
        [Home::class, 'test']
    )->get(
        '/server_info.php/home/test-insert',
        [Home::class, 'testInsertTransaction']
    )->get(
        '/server_info.php/home/test-insert-by-model',
        [Home::class, 'testInsertByModel']
    )->get(
        '/server_info.php/home/test-di',
        [Home::class, 'testDi']
    )->get(
        '/server_info.php/invoice/index',
        [Invoice::class, 'index']
    )->get(
        '/server_info.php/invoice/create',
        [Invoice::class, 'create']
    )->post(
        '/server_info.php/invoice/store',
        [Invoice::class, 'store']
    )->get(
        '/server_info.php/invoice/upload',
        [Invoice::class, 'upload']
    )->get(
        '/server_info.php/invoice/download',
        [Invoice::class, 'download']
    )->post(
        '/server_info.php/invoice/file_process',
        [Invoice::class, 'file_process']
    );
    //->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));  // REQUEST_METHOD

    // exit;

// [
//     'driver' => 'mysql',
//     'host' => $_ENV['HOST'],
//     'user' => $_ENV['DB_USER'],
//     'password' => $_ENV['DB_PASSWORD']
// ]
    // pass arguments
    // $test = (new Config($_ENV))->db;
    // var_dump($test);
    // exit;
    $app = new App($container, $route, [
        'uri' => $_SERVER["REQUEST_URI"], 
        'method' => strtolower($_SERVER["REQUEST_METHOD"])
    ], new Config($_ENV));

    $app->run();

    // pass super global variable
} catch (RouteNotFoundException $e) {
    // if (!headers_sent()) {
    //     // header("HTTP/1.1 404 Not Found");
    // }
    http_response_code(404);
    // echo $e->getMessage();
    echo View::make("Error/404");
    exit;
}

var_dump($_SESSION);

echo "<pre>";

var_dump($_COOKIE);
echo "</pre>";

// echo '1';
// sleep(3);
// echo '3';

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";