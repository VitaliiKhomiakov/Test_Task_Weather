<?php
declare(strict_types=1);

namespace Application;

class Route {
    private array $routes = [
        '/' => [
            'GET' => [
                'controller' => 'Application\Components\Home\HomeController',
                'action' => 'home'
            ],
        ],
        '/city/search' => [
            'GET' => [
                'controller' => 'Application\Components\City\Search\CitySearchController',
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

    private function processUrl($path): string {
        $path = preg_replace('/\?.*/', '', $path);
        $baseUrl = preg_replace("/^(https?:\/\/)([^\/]+)(.*)$/i", "$3", \Config::BASE_URL);
        return str_replace($baseUrl, '/', $path);
    }
}
