<?php

namespace App\Application\UseCase;

use App\Application\Dto\InputBaseDto;
use App\Application\Dto\OutputBaseDto;

interface BaseInputUseCase
{
    public function invoke(
        InputBaseDto $dto,
        ?string $id = null
    ): OutputBaseDto|null;
}
