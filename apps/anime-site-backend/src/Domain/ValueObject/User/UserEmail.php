<?php

namespace App\Domain\ValueObject\User;

use App\Domain\ValueObject\Equable;

readonly class UserEmail implements Equable
{
    public function __construct(private string $email)
    {
    }


    public function equals(object $object): bool
    {
        if (!$object instanceof UserEmail) {
            return false;
        }
        return $this->email === $object->email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
