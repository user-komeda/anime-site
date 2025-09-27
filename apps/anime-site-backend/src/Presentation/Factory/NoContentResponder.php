<?php

namespace App\Presentation\Factory;

use App\Presentation\Controllers\ControllerPayload;
use Psr\Http\Message\ResponseInterface as Response;

class NoContentResponder implements Responder
{
    public static function createResponse(
        Response $response,
        ControllerPayload $payload,
        string $id = ""
    ): Response {
        if (empty($id)) {
            return $response->withStatus($payload->getStatusCode());
        }
        return $response
            ->withHeader("ETag", $id)
            ->withStatus($payload->getStatusCode());
    }
}
