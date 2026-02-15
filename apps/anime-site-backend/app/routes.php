<?php

declare(strict_types=1);

use App\Presentation\Controllers\User\CreateUserController;
use App\Presentation\Controllers\User\DeleteUserController;
use App\Presentation\Controllers\User\ListUsersController;
use App\Presentation\Controllers\User\UpdateUserController;
use App\Presentation\Controllers\User\ViewUserController;
use OpenApi\Generator;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {

    $app->get('/swagger.json', function ($request, $response) {
        $openapi = (new Generator())->generate([__DIR__ . '/../src/Presentation']);
        if ($openapi === null) {
            return $response->withHeader(
                'Content-Type',
                'application/json'
            );
        }
        $response->getBody()->write($openapi->toJson());
        return $response->withHeader(
            'Content-Type',
            'application/json'
        );
    });

    // Swagger UI を返すルート
    $app->map(
        ["GET","OPTIONS"],
        '/docs[/{path:.*}]',
        function ($request, $response, $args) {
            error_log("route");
            $file = $args['path'] ?? 'index.html';
            $swaggerUiPath = __DIR__ . '/../docs/';

            $fullPath = realpath($swaggerUiPath . $file);
            if (
                $fullPath === false || realpath(
                    $swaggerUiPath
                ) === false || strpos(
                    $fullPath,
                    realpath($swaggerUiPath)
                ) !== 0
            ) {
                return $response->withStatus(404);
            }

            // index.html の場合、swagger.json の URL を差し込む
            if ($file === 'index.html') {
                $html = file_get_contents($fullPath);
                if ($html === false) {
                    return $response->withHeader(
                        'Content-Type',
                        'text/html'
                    );
                }
                error_log($html);
                $response->getBody()->write($html);
                return $response->withHeader(
                    'Content-Type',
                    'text/html'
                );
            }

            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $mimeTypes = [
                'css' => 'text/css',
                'js' => 'application/javascript',
                'png' => 'image/png',
                'html' => 'text/html',
                'json' => 'application/json'
            ];
            $mime = $mimeTypes[$ext] ?? 'application/octet-stream';
            $response->getBody()->write(file_get_contents($fullPath));
            return $response->withHeader('Content-Type', $mime);
        }
    );

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get("", ListUsersController::class);
        $group->get('/{id}', ViewUserController::class);
        $group->post('', CreateUserController::class);
        $group->patch('/{id}', UpdateUserController::class);
        $group->delete('/{id}', DeleteUserController::class);
    });
    $app->options('/{routes:.*}', function ($request, $response) {
        return $response;
    });
};
