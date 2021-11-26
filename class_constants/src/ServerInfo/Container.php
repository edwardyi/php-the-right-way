<?php

declare(strict_types=1);

namespace App\ServerInfo;

use App\Exceptions\Container\ContainerException;
use App\Exceptions\NotFoundException;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionNamedType;
use ReflectionParameter;
use ReflectionUnionType;

class Container implements ContainerInterface
{
    private array $entries = [];

    public function get(string $id)
    {
        /**
        if (!$this->has($id)) {
            throw new NotFoundException('Class "'. $id. '" has no binding');
        } 
        // get callable entries and pass $this object
        $entries = $this->entries[$id];

        return $entries($this);
        */
        if ($this->has($id)) {
            // get callable entries and pass $this object
            $entries = $this->entries[$id];

            return $entries($this);
        }

        return $this->resolve($id);
    }

    public function has(string $id): bool
    {
        return isset($this->entries[$id]);
    }

    // save callable to entries array
    public function set(string $id, callable $concrete): void
    {
        $this->entries[$id] = $concrete;
    }

    public function resolve(string $id)
    {
        // autowiring
        // 1. Inspect the class that we are trying to get from the container
        $reflectionClass = new ReflectionClass($id);

        // 2. Inspect the constructor of the class

        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException('Class "'.$id.' is not instantiable');
        }

        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $id;
        }

        // 3. Inpsect the constructor parameters (dependencies)
        $parameters = $constructor->getParameters();

        if (!$parameters) {
            return new $id;
        }

        // 4. If the constructor parameter is a class then try to resolve that class using the container
        $dependecies = array_map(function(ReflectionParameter $param) use ($id) {
            $name = $param->getName();
            // type hint parameter
            $type = $param->getType();

            if (!$type) {
                throw new ContainerException(
                    'Failed to resolve class"'.$id.'" because param "'.$name.'" is missing a type hint'
                );
            }

            if ($type instanceof ReflectionUnionType) {
                throw new ContainerException(
                    'Failed to resolve class"'.$id.'" because union type for param "'.$name.'" is missing a type hint'
                );
            }

            // deal with php built-in scalar data type
            if ($type instanceof ReflectionNamedType && !$type->isBuiltin()) {
                // resolve service object dependencies
                return $this->get($type->getName());
            }

            throw new ContainerException(
                'Failed to resolve class"'.$id.'" because invalid param "'.$name.'" is missing a type hint'
            );

        }, $parameters);

        return $reflectionClass->newInstanceArgs($dependecies);
    }
}