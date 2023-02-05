<?php
declare(strict_types=1);

spl_autoload_register(function (string $className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';

    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', '/', $namespace) . '/';
    }
    $fileName .= str_replace('_', '/', $className) . '.php';

    $path = __DIR__ . '/' . $fileName;

    if (file_exists($path)) {
        require_once $path;
    }
});