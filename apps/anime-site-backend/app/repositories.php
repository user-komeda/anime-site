<?php

declare(strict_types=1);

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $definitions = [];
    $baseDir = dirname(__DIR__);
    $interfaceBaseDir = $baseDir . "/src/Domain/repository/";
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($interfaceBaseDir)
    );

    foreach ($iterator as $file) {
        if (!$file->isFile()) {
            continue;
        }
        $filename = $file->getFilename();

        if (preg_match('/Repository\.php$/', $filename)) {
            $interfaceFilePath = $file->getPathname();

            $relativePath = substr($interfaceFilePath, strlen($interfaceBaseDir));

            $interfaceClass = 'App\\Domain\\Repository\\' . strtr(substr($relativePath, 0, -4), '/', '\\');
            $implRelativePath = substr($relativePath, 0, -4) . 'Impl.php';

            $implClass = 'App\\Infrastructure\\Repository\\' . strtr(substr($implRelativePath, 0, -4), '/', '\\');

            if (class_exists($implClass) && interface_exists($interfaceClass)) {
                $definitions[$interfaceClass] = \DI\autowire($implClass);
            }
        }
    }
    $containerBuilder->addDefinitions($definitions);
};
