<?php

namespace App\Presentation\Factory;

use App\Presentation\Controllers\ControllerPayload;
use Psr\Http\Message\ResponseInterface as Response;

class ResponseFactory
{
    public static function create(
        Response $response,
        ControllerPayload $payload,
        string $id
    ): Response {
        return ResponseFactory::getResponder($response, $payload, $id);
    }

    /**
     * @SuppressWarnings("PHPMD.UnusedPrivateMethod")
     */
    private static function getResponder(
        Response $response,
        ControllerPayload $payload,
        string $id
    ): Response {
        $successStatusCode = [
            200 => fn () => OkResponder::createResponse($response, $payload),
            201 => fn () => CreatedResponder::createResponse($response, $payload, $id),
            204 => fn () => NoContentResponder::createResponse($response, $payload, $id),
        ];
        return $successStatusCode[$payload->getStatusCode()]();
    }
}
