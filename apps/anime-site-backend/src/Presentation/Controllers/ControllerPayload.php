<?php

declare(strict_types=1);

namespace App\Presentation\Controllers;

use JsonSerializable;

class ControllerPayload implements JsonSerializable
{
    private int $statusCode;

    /**
     * @var array<object>|object|null
     */
    private $data;

    private ?ControllerError $error;

    /**
     * @param int $statusCode
     * @param array<object>|object|null $data
     * @param ControllerError|null $error
     */
    public function __construct(
        int $statusCode = 200,
        $data = null,
        ?ControllerError $error = null
    ) {
        $this->statusCode = $statusCode;
        $this->data = $data;
        $this->error = $error;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return array<object>|object|null
     */
    public function getData()
    {
        return $this->data;
    }

    public function getError(): ?ControllerError
    {
        return $this->error;
    }

    /**
     * @return array<string, array<object>|int|object>
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        $payload = [
            'statusCode' => $this->statusCode,
        ];

        if ($this->data !== null) {
            $payload['data'] = $this->data;
        } elseif ($this->error !== null) {
            $payload['error'] = $this->error;
        }

        return $payload;
    }
}
