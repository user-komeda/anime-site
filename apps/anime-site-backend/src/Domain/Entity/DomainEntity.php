<?php

namespace App\Domain\Entity;

interface DomainEntity
{
    public static function build(string $id, self $entity): self;
}
