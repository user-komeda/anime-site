<?php

namespace App\Application\Dto;

use App\Domain\Entity\DomainEntity;

interface OutputBaseDto
{
    public static function build(DomainEntity $entity): self;
    /**
     * @param array<DomainEntity> $entityList
     * @return array<OutputBaseDto>
     */
    public static function buildFromArray(array $entityList): array;
}
