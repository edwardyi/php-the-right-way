<?php

namespace app\ServerInfo\Exception;

use Exception;

class ViewPathNotFoundException extends Exception
{
    protected $message = 'view not found!';
}