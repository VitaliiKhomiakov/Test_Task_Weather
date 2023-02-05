<?php
declare(strict_types=1);

namespace Infrastructure\Common;

class PostParameters
{
    private array $postParams;

    public function __construct(array $postParams)
    {
        $this->postParams = $postParams;
    }

    public function get(string $key, $default = null)
    {
        return $this->postParams[$key] ?? $default;
    }
}