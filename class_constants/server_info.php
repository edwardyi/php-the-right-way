<?php

use App\ServerInfo\Home;
use App\ServerInfo\Invoice;
use App\ServerInfo\Route;

require_once("./vendor/autoload.php");

$route = new Route();

$route->register(
    '/server_info.php', 
    function() {
        echo 'Home';
    }
);

$route->register(
    '/server_info.php/invoice', 
    function() {
        echo 'Invoice';
    }
);

echo $route->register(
    '/server_info.php/home/welcome',
    [Home::class, 'welcome']
)->register(
    '/server_info.php/invoice/create',
    [Invoice::class, 'create']
)->resolve($_SERVER['REQUEST_URI']); 
// pass super global variable


echo "<pre>";
var_dump($_SERVER);
echo "</pre>";