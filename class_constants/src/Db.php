<?php

namespace App;

class Db
{
    // nullable property
    public static ?Db $_instance = null;

    // promoted property $config
    private function __construct(public array $config)
    {
        echo "expensive job, long running process";
        var_dump($config);
    }

    public static function getInstance(array $config): Db
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Db($config);
        }

        return self::$_instance;
    }
}