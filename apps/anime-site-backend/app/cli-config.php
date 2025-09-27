<?php

// cli-config.php


use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\ConfigurationArray;
use Doctrine\Migrations\DependencyFactory;
use Doctrine\Migrations\Tools\Console\Command;
use Symfony\Component\Console\Application;

require dirname(__DIR__) . '/vendor/autoload.php';

// Slim アプリ読み込み
$app = require __DIR__ . '/cli-boot.php';
$container = $app->getContainer();

// Doctrine EntityManager
$entityManager = $container->get(\Doctrine\ORM\EntityManager::class);

// Migrations 設定
$config = new ConfigurationArray([
    'migrations_paths' => [
        'Migrations' => dirname(__DIR__) . '/migrations',
    ],
    'all_or_nothing' => true,
    'check_database_platform' => true,
]);

// DependencyFactory 作成
$dependencyFactory = DependencyFactory::fromEntityManager(
    $config,
    new ExistingEntityManager($entityManager)
);

// Symfony Console アプリ作成
$cli = new Application('Doctrine Migrations');

// 主要コマンド登録
$cli->addCommands([
    new Command\DiffCommand($dependencyFactory),
    new Command\ExecuteCommand($dependencyFactory),
    new Command\GenerateCommand($dependencyFactory),
    new Command\LatestCommand($dependencyFactory),
    new Command\MigrateCommand($dependencyFactory),
    new Command\RollupCommand($dependencyFactory),
    new Command\StatusCommand($dependencyFactory),
    new Command\UpToDateCommand($dependencyFactory),
    new Command\VersionCommand($dependencyFactory),
]);

try {
    $cli->run();
} catch (Exception $e) {
    error_log($e->getMessage());
}
