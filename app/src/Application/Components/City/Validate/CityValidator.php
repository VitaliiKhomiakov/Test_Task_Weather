<?php

declare(strict_types=1);

namespace Application\Components\City\Validate;

use Application\Components\City\Validate\Exception\CityException;

class CityValidator {
    private const MAX_LENGTH = 100;

    public function validate(string $searchText): void {
        $searchText = trim($searchText);

        if ($searchText === '') {
            throw new CityException('City must not be empty');
        }

        if (mb_strlen($searchText) > self::MAX_LENGTH) {
            throw new CityException('City name is too long');
        }
    }
}
