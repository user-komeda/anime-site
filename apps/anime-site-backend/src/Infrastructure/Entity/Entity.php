<?php

namespace App\Infrastructure\Entity;

use App\Domain\Entity\DomainEntity;

interface Entity
{
    public static function build(DomainEntity $entity): self;
    public function convertToDomainEntity(): DomainEntity;
}
