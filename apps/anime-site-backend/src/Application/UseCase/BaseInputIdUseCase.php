<?php

namespace App\Application\UseCase;

use App\Application\Dto\OutputBaseDto;

interface BaseInputIdUseCase
{
    public function invoke(string $id): OutputBaseDto|null;
}
