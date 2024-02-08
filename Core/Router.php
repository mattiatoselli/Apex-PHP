<?php

//set the namespace
namespace Core;
use Core\Response;

class Router
{
    // Array to store the routes
    protected $routes = array();

    // Add a new route to the routes array
    protected function addRoute(string $uri, string $controller, string $method)
    {
        $this->routes[] = array(
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
        );
    }

    // Add a GET route
    public function get(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "GET");
    }

    // Add a POST route
    public function post(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "POST");
    }

    // Add a PATCH route
    public function patch(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "PATCH");
    }

    // Add a PUT route
    public function put(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "PUT");
    }

    // Add a DELETE route
    public function delete(string $uri, string $controller)
    {
        $this->addRoute($uri, $controller, "DELETE");
    }

    // Route the request to the appropriate controller
    public function route(string $uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $selectedRoute = null;
        foreach ($this->routes as $route) {
            if($route['uri'] === $uri) {
                // Set the selected route
                $selectedRoute = $route;
            }
        }
        // If no valid route is selected, throw a 404 error
        if($selectedRoute === null) {
            $response = new Response();
            $response->status(404);
            $response->jsonResponse(["message" => "Error 404"]);
            return $response;
        }

        // If the method is not allowed, throw an exception
        if($selectedRoute['method'] !== $method) {
            $response = new Response();
            $response->status(405);
            $response->jsonResponse(["message" => "Method not allowed"]);
            return $response;
        }

        // Require and return the selected controller
        return require(base_path($selectedRoute['controller']));
    }

}