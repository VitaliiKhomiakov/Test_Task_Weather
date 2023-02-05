<?php
declare(strict_types=1);

namespace Infrastructure\Common;

class GetParameters
{
    private array $getParams;

    public function __construct(array $getParams)
    {
        $this->getParams = $getParams;
    }

    public function get(string $key, $default = null)
    {
        return $this->getParams[$key] ?? $default;
    }
}