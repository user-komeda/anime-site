<?php

namespace App\Domain\Service\User;

use App\Domain\Repository\User\UserRepository;
use DI\Attribute\Inject;

readonly class UserService
{
    #[Inject]
    public function __construct(private UserRepository $domainUserRepository)
    {
    }

    public function isExistByEmail(string $email): bool
    {
        return $this->domainUserRepository->isExistByEmail($email);
    }

    public function isExistById(string $id): bool
    {
        return $this->domainUserRepository->isExistById($id);
    }
}
