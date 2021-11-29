<?php

namespace App\ServerInfo\Exception\Container;

use Exception;
use Psr\Container\ContainerExceptionInterface;

class NotFoundException extends Exception implements ContainerExceptionInterface
{

}