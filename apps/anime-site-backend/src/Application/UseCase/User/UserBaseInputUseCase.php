<?php

namespace App\Application\UseCase\User;

use App\Application\UseCase\BaseInputUseCase;
use App\Domain\Repository\User\UserRepository;
use App\Domain\Service\User\UserService;
use DI\Attribute\Inject;

abstract class UserBaseInputUseCase implements BaseInputUseCase
{
    #[Inject]
    public function __construct(
        protected UserService $userService,
        protected UserRepository $userRepository
    ) {
    }
}
