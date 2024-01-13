<?php
use Core\Router;

const BASE_PATH = __DIR__.'/../';

require BASE_PATH."Core/functions.php";

spl_autoload_register(function($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path($class.".php");
});

//defining routes
$router = new Router();

$router->post("/test", "Controllers/TestController.php");
$router->get("/ciao", "Controllers/CiaoController.php");

//route interpreter
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//resolve request
$router->route($uri);