<?php

namespace App\StaticBinding;

class ClassA
{
    public static $name = "A";

    public static function getName()
    {
        // early binding(compile)
        echo "self:".self::$name.PHP_EOL;
        // late binding
        echo "static:".static::$name.PHP_EOL;
        var_dump(get_called_class());
        return static::$name;
    }
}