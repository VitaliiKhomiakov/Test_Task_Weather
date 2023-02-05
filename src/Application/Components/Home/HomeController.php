<?php
declare(strict_types=1);

namespace Application\Components\Home;

use Application\BaseController;
use Infrastructure\Container\DependencyContainer;
use JetBrains\PhpStorm\NoReturn;

class HomeController extends BaseController {

    public function __construct(DependencyContainer $container) {}

    public function home(): void {
        $this->json(['message' => 'This is a test task']);
    }
}