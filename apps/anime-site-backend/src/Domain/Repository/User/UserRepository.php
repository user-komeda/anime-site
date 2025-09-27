<?php

declare(strict_types=1);

namespace App\Domain\Repository\User;

use App\Domain\Entity\User\DomainUserEntity;

interface UserRepository
{
    /**
     * @return DomainUserEntity[]
     */
    public function findAll(): array;

    public function findById(string $id): DomainUserEntity|null;

    public function isExistByEmail(string $email): bool;

    public function isExistById(string $id): bool;

    public function save(DomainUserEntity $userEntity, ?string $id = null): DomainUserEntity;

    public function remove(string $id): void;
}
