<?php
declare(strict_types=1);

namespace Application\Providers\City\Search;
interface CitySearchRepositoryInterface
{
    public function search(string $searchText): array;
}
