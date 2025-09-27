<?php

declare(strict_types=1);

use App\Config\Settings\Settings;
use App\Config\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => true, // Should be set to false in production
                'logError'            => true,
                'logErrorDetails'     => true,
                'logger' => [
                    'name' => 'slim-app',
                    'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                    'level' => Logger::DEBUG,
                ],
                'doctrine' => [
                    'dev_mode' => true,
                    'cache_dir' => __DIR__ . '/../var/doctrine',
                    'metadata_dirs' => [__DIR__ . '/../src/Infrastructure/entity'],
                    'connection' => [
                        'driver'   => 'pdo_mysql',
                        'host'     => '127.0.0.1',
                        'dbname'   => 'cms',
                        'user'     => 'root',
                        'password' => 'jnFiOgP1WkgJQLc',
                        'charset'  => 'utf8mb4',
                    ],
                ],
            ]);
        }
    ]);
};
