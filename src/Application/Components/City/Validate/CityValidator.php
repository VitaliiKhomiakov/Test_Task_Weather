<?php
declare(strict_types=1);

namespace Application\Components\City\Validate;

use Application\Components\City\Validate\Exception\CityException;

class CityValidator {
    public function validate(string $searchText): void {
        if (!$searchText) {
            throw new CityException('City must not be empty');
        }
    }
}