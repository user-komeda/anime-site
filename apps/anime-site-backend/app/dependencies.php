<?php

declare(strict_types=1);

use App\Config\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler(
                $loggerSettings['path'],
                $loggerSettings['level']
            );
            $logger->pushHandler($handler);

            return $logger;
        },
        EntityManager::class => function (
            ContainerInterface $c
        ): EntityManager {
            $settings = $c->get(SettingsInterface::class)->get('doctrine');

            $config = ORMSetup::createAttributeMetadataConfiguration(
                $settings['metadata_dirs'],
                $settings['dev_mode'],
                $settings['cache_dir']
            );
            $monolog = new Logger('doctrine');
            $monolog->pushHandler(
                new StreamHandler(dirname(__DIR__) . '/logs/doctrine.log')
            );
            $config->setMiddlewares([
                new Middleware($monolog)
            ]);

            $conn = DriverManager::getConnection(
                $settings['connection'],
                $config
            );

            return new EntityManager($conn, $config);
        },
    ]);
};
