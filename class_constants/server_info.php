<?php

use App\ServerInfo\Home;
use App\ServerInfo\Invoice;
use App\ServerInfo\Route;

require_once("./vendor/autoload.php");

set_exception_handler(function (\Throwable $e) {
    var_dump($e->getMessage());
});

session_start();
// echo phpinfo();
// exit;


define("STORAGE_PATH", __DIR__.'/src/ServerInfo/storage');

$route = new Route();

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

echo $route->get(
    '/server_info.php/home/welcome',
    [Home::class, 'welcome']
)->get(
    '/server_info.php/home/index',
    [Home::class, 'index']
)->get(
    '/server_info.php/home/test',
    [Home::class, 'test']
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
)->post(
    '/server_info.php/invoice/file_process',
    [Invoice::class, 'file_process']
)->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));  // REQUEST_METHOD
// pass super global variable


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