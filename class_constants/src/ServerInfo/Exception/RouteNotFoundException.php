<?php

namespace App\ServerInfo\Exception;

use Exception;

class RouteNotFoundException extends Exception
{
    protected $message = 'Route not found';
}