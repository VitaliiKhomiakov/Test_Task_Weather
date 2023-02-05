<?php
declare(strict_types=1);

namespace Application\Components\City\Search;

use Application\Providers\City\Search\CitySearchServiceInterface;
use Infrastructure\Persistence\CityRepository;

class CitySearchService implements CitySearchServiceInterface {
    private CityRepository $repository;

    public function __construct(CityRepository $repository) {
        $this->repository = $repository;
    }

    public function search(string $query): array {
        return $this->repository->search($query);
    }
}