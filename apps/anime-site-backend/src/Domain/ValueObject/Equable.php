<?php

namespace App\Domain\ValueObject;

interface Equable
{
    public function equals(object $object): bool;
}
