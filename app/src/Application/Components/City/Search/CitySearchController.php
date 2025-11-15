<?php

declare(strict_types=1);

namespace Application\Components\City\Search;

use Application\BaseController;
use Application\Components\City\Validate\CityValidator;
use Application\Providers\City\Search\CitySearchServiceInterface;
use Infrastructure\Common\Request;

class CitySearchController extends BaseController {
    public function __construct(
        private readonly CitySearchServiceInterface $service,
        private readonly Request $request,
        private readonly CityValidator $cityValidator
    ) {
    }

    public function search(): void {
        $cityName = trim((string) ($this->request->get->get('city') ?? ''));

        // check city name
        $this->cityValidator->validate($cityName);

        // send json response
        $this->json($this->service->search($cityName));
    }
}
