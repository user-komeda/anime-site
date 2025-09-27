<?php

namespace App\Application\Factory;

use App\Application\Dto\InputBaseDto;
use App\Domain\Entity\DomainEntity;

interface Factory
{
    public static function createEntityFromDto(InputBaseDto $dto): DomainEntity;
}
