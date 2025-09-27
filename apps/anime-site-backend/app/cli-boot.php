<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

// コンテナビルダー
$containerBuilder = new ContainerBuilder();

// 設定
(require __DIR__ . '/settings.php')($containerBuilder);

// 依存性
(require __DIR__ . '/dependencies.php')($containerBuilder);

// コンテナ作成
$container = $containerBuilder->build();

// アプリ生成
AppFactory::setContainer($container);
$app = AppFactory::create();

// ミドルウェア（必要なら）
(require __DIR__ . '/middleware.php')($app);

// ルーティング（CLIには不要なら省略可）
(require __DIR__ . '/routes.php')($app);

return $app;
