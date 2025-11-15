<?php

declare(strict_types=1);

use Application\Config\AppConfig;
use Application\Route;
use Infrastructure\Container\DependencyContainer;

if (AppConfig::DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}
$route = new Route();
$controllerAction = $route->getControllerAction($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

if ($controllerAction === null) {
    http_response_code(404);
    echo json_encode(['error' => 'Route not found'], JSON_THROW_ON_ERROR);
    exit();
}

$container = new DependencyContainer();
$controllerClass = $controllerAction['controller'];
// get name of action
$action = $controllerAction['action'];

// init controller
$controller = $container->make($controllerClass);

try {
    // call controller method
    $controller->$action();
} catch (RuntimeException $exception) {
    http_response_code(400);
    echo json_encode(['error' => $exception->getMessage()], JSON_THROW_ON_ERROR);
    die();
}
