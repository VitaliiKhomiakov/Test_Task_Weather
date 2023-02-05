<?php
declare(strict_types=1);

namespace Application\Home;

use Application\BaseController;
use JetBrains\PhpStorm\NoReturn;

class HomeController extends BaseController {
    #[NoReturn] public function home(): void {
        $this->json(['message' => 'This is a test task']);
    }
}