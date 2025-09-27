<?php

namespace App\Application\UseCase\User;

use App\Application\UseCase\BaseInputIdUseCase;
use App\Domain\Repository\User\UserRepository;
use App\Domain\Service\User\UserService;
use DI\Attribute\Inject;

abstract class UserBaseInputIdUseCase implements BaseInputIdUseCase
{
    #[Inject]
    public function __construct(
        protected UserService $userService,
        protected UserRepository $userRepository
    ) {
    }
}
