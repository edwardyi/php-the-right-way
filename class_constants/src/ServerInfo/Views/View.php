<?php

declare(strict_types=1);

namespace App\ServerInfo\Views;

class View
{
    public static function make(string $methodName, array $data)
    {
        var_dump($methodName, $data);
        var_dump(get_called_class());
        return true;
    }
}