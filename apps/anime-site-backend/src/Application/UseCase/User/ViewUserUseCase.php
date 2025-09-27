<?php

namespace App\Application\UseCase\User;

use App\Application\Dto\User\UserOutputDto;
use App\Application\Exception\UserNotFoundException;

class ViewUserUseCase extends UserBaseInputIdUseCase
{
    public function invoke(string $id): UserOutputDto
    {
        $user = $this->userRepository->findById($id);
        if ($user === null) {
            throw new UserNotFoundException();
        }
        return UserOutputDto::build($user);
    }
}
