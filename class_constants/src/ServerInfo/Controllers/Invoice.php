<?php

declare(strict_types=1);

namespace App\ServerInfo\Controllers;

use App\ServerInfo\View;

class Invoice
{
    public function index(): string
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

        return View::make("/Invoice/index")->render(true);
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

    public function upload()
    {
        return View::make("/Invoice/upload");
    }

    public function download()
    {
        header("content-type: application:pdf");
        header('Content-Disposition: attachment;filename=myfile.png');

        // echo file_get_contents(STORAGE_PATH.'/php-logo.png');
        readfile(STORAGE_PATH.'/php-logo.png');
    }

    public function file_process()
    {
        $fileNames = $_FILES['receipt']['name'];

        foreach ($fileNames as $key => $fileName) {

            if (!$fileName) {
                continue;
            }

            $filePath = STORAGE_PATH.'/'.$fileName;

            // https://www.tehplayground.com/fZhB87K9mffHYkd1
            ['extension' => $extension] = pathinfo($filePath);

            if (in_array($extension, ['pdf', 'png', 'jpg'])) {
                move_uploaded_file($_FILES['receipt']['tmp_name'][$key], $filePath);
            }

            // var_dump(pathinfo($filePath), $filePath, $_FILES['receipt']['tmp_name'][$key], in_array($extension, ['pdf', 'png', 'jpg']), $extension);

            echo '.';
        }

        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";

        header("Location: /server_info.php/invoice/upload");
    }
}