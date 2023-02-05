<?php
declare(strict_types=1);

namespace Application\City\Search;

use Infrastructure\Persistence\CityRepository;

class CitySearchService
{
    private CityRepository $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(string $query): array
    {
        return $this->repository->search($query);
    }
}