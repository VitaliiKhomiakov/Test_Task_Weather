<?php

declare(strict_types=1);

namespace Application\Providers\City\Search;

interface CitySearchServiceInterface
{
    public function search(string $query): array;
}
