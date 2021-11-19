<?php

use App\ServerInfo\Home;
use App\ServerInfo\Invoice;
use App\ServerInfo\Route;

require_once("./vendor/autoload.php");

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
    '/server_info.php/invoice/index',
    [Invoice::class, 'index']
)->get(
    '/server_info.php/invoice/create',
    [Invoice::class, 'create']
)->post(
    '/server_info.php/invoice/store',
    [Invoice::class, 'store']
)->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));  // REQUEST_METHOD
// pass super global variable

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";