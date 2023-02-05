<?php
declare(strict_types=1);

namespace Application;

use Infrastructure\Container\DependencyContainer;
use ReflectionClass;
use ReflectionException;

abstract class BaseController {
    abstract function __construct(DependencyContainer $container);

    /**
     * @throws ReflectionException
     */
    public function json(array $object = []): void {
        header('Content-Type: application/json; charset=utf-8');

        foreach ($object as &$item) {
            if (!is_object($item)) {
                continue;
            }
            $reflectionClass = new ReflectionClass($item);
            $properties = $reflectionClass->getProperties();

            $array = [];
            foreach ($properties as $property) {
                $property->setAccessible(true);
                $value = $property->getValue($item);
                if (is_object($value)) {
                    $array[$property->getName()] = (array) $value;
                } else {
                    $array[$property->getName()] = $value;
                }
            }

            $item = $array;
        }

        echo json_encode($object);
        exit();
    }
}