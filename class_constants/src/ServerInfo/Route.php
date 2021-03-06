<?php

declare(strict_types = 1);

namespace App\ServerInfo;

use App\ServerInfo\Exception\RouteNotFoundException;

class Route
{
    private array $routes = [];

    public function __construct(private Container $container)
    {

    }

    public function routes()
    {
        return $this->routes;
    }

    /**
     * register
     *
     * @param string $route
     * @param callable|array $action
     * @return self
     */
    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $this->routes[$requestMethod][$route] = $action;

        return $this;
    }

    public function get(string $route, callable|array $action) 
    {
        $this->register('get', $route, $action);

        return $this;
    }

    public function post(string $route, callable|array $action) 
    {
        $this->register('post', $route, $action);

        return $this;
    }

    /**
     * resolve
     *
     * @param string $requestUri
     * @return void
     */
    public function resolve(string $requestUri, string $requestMethod)
    {
        // modify super global variable to find route 
        $route = explode('?', $requestUri)[0];

        // get action from routes array
        $action = $this->routes[$requestMethod][$route] ?? null;

        // var_dump($action, $route, $requestMethod);
        // exit;

        if (!$action) {
            // header("HTTP/1.0 404 Not Found");
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            // invoke callable action
            return call_user_func($action);
        }
        
        [$class, $method] = $action;

        if (class_exists($class)) {
            // $obj = new $class();
            // get instance from container
            $obj = $this->container->get($class);

            if (method_exists($obj, $method)) {

                return call_user_func_array([$obj, $method], []);
            }
        }

        // header("HTTP/1.0 404 Not Found");
        throw new RouteNotFoundException();
    }
}