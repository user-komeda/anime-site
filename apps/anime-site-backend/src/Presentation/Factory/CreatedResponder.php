<?php

namespace App\Presentation\Factory;

use App\Presentation\Controllers\ControllerPayload;
use Psr\Http\Message\ResponseInterface as Response;

class CreatedResponder implements Responder
{
    public static function createResponse(
        Response $response,
        ControllerPayload $payload,
        string $id
    ): Response {
        $json = json_encode($payload, JSON_PRETTY_PRINT);
        print_r($json);
        $response->getBody()->write($json ?: "");

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader(
                "Location",
                "http://localhost:8080/users/{$id}"
            )
            ->withStatus($payload->getStatusCode());
    }
}
