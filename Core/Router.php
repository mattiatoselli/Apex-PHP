<?php

namespace Core;

class Router
{
    protected $routes = array();

    protected function addRoute(string $uri, string $controller, string $method)
    {
        $this->routes[] = array(
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
        );
    }

    public function get(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "GET");
    }

    public function post(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "POST");
    }

    public function patch(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "PATCH");
    }

    public function put(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "PUT");
    }

    public function delete(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "DELETE");
    }

    public function route(string $uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $selectedRoute = null;
        foreach ($this->routes as $route) {
            if($route['uri'] === $uri) {
                //return require(base_path($route['controller']));
                $selectedRoute = $route;
            }
        }
        //if you are able to get here without a selected route we have a 404 error
        if($selectedRoute === null) {
            throw new \Exception("Error 404. ", 1);
        }

        if($selectedRoute['method'] !== $method) {
            throw new \Exception("Method not allowed", 1);
            
        }

        return require(base_path($selectedRoute['controller']));
    }

}