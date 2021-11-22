<?php

namespace App\ServerInfo\Exception;
use \Exception;

class PageNotFoundException extends Exception
{
    protected $message = 'page not found';
}