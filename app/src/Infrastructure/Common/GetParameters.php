<?php

declare(strict_types=1);

namespace Infrastructure\Common;

readonly class GetParameters {
    public function __construct(
        private array $getParams
    ) {
    }

    public function get(string $key, $default = null) {
        return $this->getParams[$key] ?? $default;
    }
}
