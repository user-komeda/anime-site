<?php

namespace App\Presentation\Request;

use App\Application\Dto\InputBaseDto;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpBadRequestException;

abstract class BaseRequest
{
    /**
     * @return array<string, mixed>
     */
    public static function buildBody(ServerRequestInterface $request): array
    {
        $body = $request->getParsedBody();
        if (is_null($body) || is_object($body)) {
            throw new HttpBadRequestException($request);
        }
        return $body;
    }

    abstract protected static function validate(
        ServerRequestInterface $request
    ): self;

    abstract protected function convertToDto(): InputBaseDto;
}
