<?php

namespace App\Presentation\Factory;

use App\Presentation\Controllers\ControllerPayload;
use Psr\Http\Message\ResponseInterface as Response;

class OkResponder implements Responder
{
    public static function createResponse(
        Response $response,
        ControllerPayload $payload,
        string $id = ""
    ): Response {
        $json = json_encode($payload, JSON_PRETTY_PRINT);
        $response->getBody()->write($json ?: "");
        print_r($json);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($payload->getStatusCode());
    }
}
