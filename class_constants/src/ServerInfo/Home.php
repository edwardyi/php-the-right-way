<?php

declare(strict_types=1);

namespace App\ServerInfo;

use App\ServerInfo\Views\View;
use Exception;

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
        return 'hello world';
    }

    public function test()
    {
        return View::make('test', $_GET);
    }
}