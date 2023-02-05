<?php
declare(strict_types=1);

namespace Application\City\Search;

use Application\BaseController;
use Infrastructure\Common\Request;
use Infrastructure\Container\DependencyContainer;

class CitySearchController extends BaseController
{
    private CitySearchService $service;
    private Request $request;

    public function __construct(DependencyContainer $container)
    {
        $this->service = $container->getCitySearchService();
        $this->request = $container->getRequest();
    }

    public function search(): void
    {
        $cityName = $this->request->get->get('city') ?? '';
        $this->json($this->service->search($cityName));
    }
}
