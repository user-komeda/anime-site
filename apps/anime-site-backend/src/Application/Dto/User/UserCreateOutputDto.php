<?php

namespace App\Application\Dto\User;

use App\Application\Dto\OutputBaseDto;
use App\Domain\Entity\DomainEntity;
use App\Domain\Entity\User\DomainUserEntity;
use App\Exception\InstanceMismatchException;
use RuntimeException;

class UserCreateOutputDto implements OutputBaseDto
{
    public function __construct(
        private readonly string $id,
        private string $firstName,
        private string $lastName,
        private string $email
    ) {
    }

    public static function build(DomainEntity $entity): self
    {
        if (
            !$entity instanceof DomainUserEntity || $entity->getIdentityId(
            ) === null
        ) {
            throw InstanceMismatchException::forClass(
                DomainUserEntity::class,
                $entity
            );
        }

        return new self(
            $entity->getIdentityId()->getId(),
            $entity->getName()->getFirstName(),
            $entity->getName()->getLastName(),
            $entity->getEmail()->getEmail()
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public static function buildFromArray(array $entityList): array
    {
        throw new RuntimeException('Not implemented');
    }
}
