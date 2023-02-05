<?php
declare(strict_types=1);

namespace Application\Components\City\Search;

use Application\BaseController;
use Application\Components\City\Validate\CityValidator;
use Infrastructure\Common\Request;
use Infrastructure\Container\DependencyContainer;

class CitySearchController extends BaseController
{
    private CitySearchService $service;
    private Request $request;
    private CityValidator $cityValidator;

    public function __construct(DependencyContainer $container)
    {
        $this->service = $container->getCitySearchService();
        $this->cityValidator = $container->getCityValidator();
        $this->request = $container->getRequest();
    }

    public function search(): void
    {
        $cityName = $this->request->get->get('city') ?? '';
        $this->cityValidator->validate($cityName);
        $this->json($this->service->search($cityName));
    }
}
