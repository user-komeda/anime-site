<?php

namespace App\Presentation\Handler;

use App\Application\Exception\AlreadyFoundException;
use App\Application\Exception\NotFoundException;
use App\Config\Handlers\HttpErrorHandler;
use Psr\Http\Message\ResponseInterface as Response;

class CustomErrorHandler extends HttpErrorHandler
{
    /**
     * @throws \JsonException
     */
    protected function respond(): Response
    {
        $exception = $this->exception;

        if ($exception instanceof NotFoundException) {
            $response = $this->responseFactory->createResponse();
            $payload = ['error' => $exception->getMessage()];
            $json = json_encode($payload, JSON_THROW_ON_ERROR);
            $response->getBody()->write($json);
            return $response->withStatus(404)
                ->withHeader('Content-Type', 'application/json');
        }

        if ($exception instanceof AlreadyFoundException) {
            $response = $this->responseFactory->createResponse();
            $payload = ['error' => $exception->getMessage()];
            $json = json_encode($payload, JSON_THROW_ON_ERROR);
            $response->getBody()->write($json);
            return $response->withStatus(400)
                ->withHeader('Content-Type', 'application/json');
        }

        // デフォルトの処理は親に任せる
        return parent::respond();
    }
}
