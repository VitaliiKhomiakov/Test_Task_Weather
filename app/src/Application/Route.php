<?php
declare(strict_types=1);

namespace Application;

use Application\Components\City\Search\CitySearchController;
use Application\Components\Home\HomeController;
use Application\Config\AppConfig;

class Route {
    private array $routes = [
        '/' => [
            'GET' => [
                'controller' => HomeController::class,
                'action' => 'home'
            ],
        ],
        '/city/search' => [
            'GET' => [
                'controller' => CitySearchController::class,
                'action' => 'search'
            ],
        ],
    ];

    public function getControllerAction(string $path, string $method): ?array {
        // remove get params from url to prepare route
        $path = $this->processUrl($path);

        if (isset($this->routes[$path][$method])) {
            return [
                'controller' => $this->routes[$path][$method]['controller'],
                'action' => $this->routes[$path][$method]['action']
            ];
        }

        return null;
    }

    private function processUrl(string $path): string {
        $path = preg_replace('/\?.*/', '', $path);
        if ($path === '') {
            $path = '/';
        }

        $basePath = parse_url(AppConfig::BASE_URL, PHP_URL_PATH) ?? '/';
        $basePath = rtrim($basePath, '/');

        if ($basePath !== '' && $basePath !== '/' && str_starts_with($path, $basePath)) {
            $path = substr($path, strlen($basePath)) ?: '/';
        }

        return $path;
    }
}
