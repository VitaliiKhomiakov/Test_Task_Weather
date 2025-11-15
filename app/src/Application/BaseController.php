<?php

declare(strict_types=1);

namespace Application;

abstract class BaseController {
    public function json(array $object = []): void {
        header('Content-Type: application/json; charset=utf-8');

        try {
            echo json_encode($object, JSON_THROW_ON_ERROR);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        exit();
    }
}
