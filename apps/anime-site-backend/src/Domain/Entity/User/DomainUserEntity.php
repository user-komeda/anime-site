<?php

namespace App\Domain\Entity\User;

use App\Domain\Entity\DomainEntity;
use App\Domain\ValueObject\IdentityId;
use App\Domain\ValueObject\User\UserEmail;
use App\Domain\ValueObject\User\UserName;
use App\Exception\InstanceMismatchException;

class DomainUserEntity implements DomainEntity
{
    public function __construct(
        private UserName $userName,
        private UserEmail $userEmail,
        private readonly ?IdentityId $identityId = null
    ) {
    }

    public function getIdentityId(): IdentityId|null
    {
        return $this->identityId;
    }

    public function getName(): UserName
    {
        return $this->userName;
    }

    public function getEmail(): UserEmail
    {
        return $this->userEmail;
    }

    public function changeUser(
        ?string $firstName,
        ?string $lastName,
        ?string $email
    ): void {
        if (empty($firstName) && empty($lastName) && empty($email)) {
            return;
        }
        $this->userName = new UserName(
            empty($firstName) ? $this->userName->getFirstName() : $firstName,
            empty($lastName) ? $this->userName->getLastName() : $lastName,
        );
        $this->userEmail = new UserEmail(
            empty($email) ? $this->userEmail->getEmail() : $email
        );
    }


    public static function build(string $id, DomainEntity $entity): DomainEntity
    {
        if (!$entity instanceof DomainUserEntity) {
            throw InstanceMismatchException::forClass(
                DomainUserEntity::class,
                $entity
            );
        }
        return new self(
            $entity->getName(),
            $entity->getEmail(),
            IdentityId::buildId($id)
        );
    }
}
