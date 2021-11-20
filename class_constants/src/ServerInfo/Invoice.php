<?php

declare(strict_types=1);

namespace App\ServerInfo;

use Exception;
use ValueError;

class Invoice
{
    public function index()
    {
        echo 'output before cookie';

        setcookie("username", "demo account", time() + 10, path: "/server_info.php", domain: "", secure: false, httponly: false);

        $options  =[
            'expires' => time() + 5,  // 'expires' 
            'path' => "/server_info.php",  // 'path'
            "domain" => "", // example mysite.com // "domain"
            "secure" => false,  // "secure"
            "httponly" => false // "httponly"
        ];

        // var_dump($options);
        setcookie("option", "testing", $options);

        echo "<pre>";
        var_dump($_GET);
        echo "</pre>";
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        echo "<pre>";
        var_dump($_REQUEST);
        echo "</pre>";

        // var_dump($_SERVER);

        //  return '<form method="POST" action="?amount=100"><label>Amount:</label><input type="text" name="amount" /></form>';
        return '<form method="POST" action="/server_info.php/invoice/store"><label>Amount:</label><input type="text" name="amount" /></form>';
    }

    public function create()
    {
        return 'create';
    }

    public function store()
    {
        var_dump($_POST['amount']);

        unset($_SESSION['count']);
        return 'store';
    }
}