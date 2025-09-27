<?php

namespace App\Application\Dto\User;

use App\Application\Dto\InputBaseDto;

readonly class UserUpdateInputDto implements InputBaseDto
{
    public function __construct(
        private ?string $firstName,
        private ?string $lastName,
        private ?string $email,
    ) {
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
