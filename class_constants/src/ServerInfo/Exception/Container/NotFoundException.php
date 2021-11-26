<?php

namespace App\Exceptions\Container;

use Exception;
use Psr\Container\ContainerExceptionInterface;

class NotFoundException extends Exception implements ContainerExceptionInterface
{

}