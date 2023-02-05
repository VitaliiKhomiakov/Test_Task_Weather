<?php
declare(strict_types=1);

if (Config::DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

use Application\Route;
use Infrastructure\Container\DependencyContainer;

$route = new Route();
$controllerAction = $route->getControllerAction($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

if ($controllerAction === null) {
    http_response_code(404);
    echo 'Route not found';
    exit();
}

$container = new DependencyContainer();
$controllerClass = $controllerAction['controller'];
$controller = new $controllerClass($container);

$action = $controllerAction['action'];
$controller->$action();