<?php

namespace App\Application\Dto\User;

use App\Application\Dto\OutputBaseDto;
use App\Domain\Entity\DomainEntity;
use App\Domain\Entity\User\DomainUserEntity;
use App\Exception\InstanceMismatchException;
use OpenApi\Attributes as OA;

#[OA\Schema(schema: "User", title: "User")]
readonly class UserOutputDto implements OutputBaseDto
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $email,
        private ?string $id = null
    ) {
    }

    public function getId(): string|null
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

    public static function build(DomainEntity $entity): UserOutputDto
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
            firstName: $entity->getName()->getFirstName(),
            lastName: $entity->getName()->getLastName(),
            email: $entity->getEmail()->getEmail(),
            id: $entity->getIdentityId()->getId()
        );
    }

    /**
     * @param array<DomainUserEntity> $entityList
     * @return array<UserOutputDto>
     */
    public static function buildFromArray(array $entityList): array
    {
        return array_map(
            fn (DomainUserEntity $entity) => UserOutputDto::build($entity),
            $entityList
        );
    }
}
