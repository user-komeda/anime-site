<?php

namespace App\Application\UseCase\User;

use App\Application\UseCase\BaseUseCase;
use App\Domain\Repository\User\UserRepository;
use DI\Attribute\Inject;

abstract class UserBaseUseCase implements BaseUseCase
{
    #[Inject]
    public function __construct(protected UserRepository $userRepository)
    {
    }
}
