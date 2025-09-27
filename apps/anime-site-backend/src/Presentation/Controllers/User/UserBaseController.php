<?php

declare(strict_types=1);

namespace App\Presentation\Controllers\User;

use App\Application\UseCase\User\CreateUserUseCase;
use App\Application\UseCase\User\DeleteUserUseCase;
use App\Application\UseCase\User\ListUserUseCase;
use App\Application\UseCase\User\UpdateUserUseCase;
use App\Application\UseCase\User\ViewUserUseCase;
use App\Presentation\Controllers\BaseController;
use Psr\Log\LoggerInterface;

abstract class UserBaseController extends BaseController
{
    public function __construct(
        LoggerInterface $logger,
        protected ListUserUseCase $listUserUseCase,
        protected ViewUserUseCase $viewUserUseCase,
        protected CreateUserUseCase $createUserUseCase,
        protected UpdateUserUseCase $updateUserUseCase,
        protected DeleteUserUseCase $deleteUserUseCase
    ) {
        parent::__construct($logger);
    }
}
