<?php

declare(strict_types=1);

namespace App\ServerInfo;

use App\ServerInfo\Exception\RouteNotFoundException;

class Route
{
    public array $routes = [];

    /**
     * register
     *
     * @param string $route
     * @param callable|array $action
     * @return self
     */
    public function register(string $route, callable|array $action): self
    {
        $this->routes[$route] = $action;

        return $this;
    }

    public function resolve(string $requestUri)
    {
        // modify super global variable to find route 
        $route = explode('?', $requestUri)[0];

        // get action from routes array
        $action = $this->routes[$route] ?? null;

        // var_dump($action, $route);

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            // invoke callable action
            return call_user_func($action);
        }
        
        
        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $obj = new $class();

                if (method_exists($obj, $method)) {

                    return call_user_func_array([$obj, $method], []);
                }
            }
        }


        throw new RouteNotFoundException();
    }
}