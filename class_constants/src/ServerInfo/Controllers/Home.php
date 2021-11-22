<?php

declare(strict_types=1);

namespace App\ServerInfo\Controllers;

use App\ServerInfo\View;

class Home
{
    public function index()
    {
        // $_SESSION['count']++ ??  1 ;
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;

        return 'index';
    }

    public function welcome()
    {
        // return (new View('/Home/welcome'))->render();
        return View::make('/Home/welcome')->render();
    }

    public function test()
    {
        $data = ['demo' => '123 passing from controller'];
        // var_dump(View::make('/Home/test', $data));
        // var_dump(array_merge($data, $_GET));

        return View::make("/Home/test", array_merge($data, $_GET));
    }
}