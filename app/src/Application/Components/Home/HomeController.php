<?php

declare(strict_types=1);

namespace Application\Components\Home;

use Application\BaseController;
class HomeController extends BaseController {

    public function home(): void {
        $this->json(['message' => 'This is a test task']);
    }
}
