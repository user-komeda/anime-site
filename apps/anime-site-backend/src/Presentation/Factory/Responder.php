<?php

namespace App\Presentation\Factory;

use App\Presentation\Controllers\ControllerPayload;
use Psr\Http\Message\ResponseInterface as Response;

interface Responder
{
    public static function createResponse(
        Response $response,
        ControllerPayload $payload,
        string $id
    ): Response;
}
