<?php

namespace App\Application\UseCase;

use App\Application\Dto\OutputBaseDto;

interface BaseUseCase
{
    /**
     * @return array<OutputBaseDto>|OutputBaseDto
     */
    public function invoke(): array|OutputBaseDto;
}
