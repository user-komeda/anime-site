<?php

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\Equable;

readonly class UserName implements Equable
{
    public function __construct(
        private string $firstName,
        private string $lastName
    ) {
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function equals(object $object): bool
    {
        if (!$object instanceof UserName) {
            return false;
        }
        return $this->firstName === $object->getFirstName(
        ) && $this->lastName === $object->getLastName();
    }
}
