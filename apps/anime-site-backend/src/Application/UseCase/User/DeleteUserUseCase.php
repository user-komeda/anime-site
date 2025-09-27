<?php

namespace App\Application\UseCase\User;

use App\Application\Dto\OutputBaseDto;
use App\Application\Exception\UserNotFoundException;

class DeleteUserUseCase extends UserBaseInputIdUseCase
{
    public function invoke(string $id): OutputBaseDto|null
    {

        $isExistsUser = $this->userService->isExistById($id);
        if (!$isExistsUser) {
            throw new UserNotFoundException();
        }
        $this->userRepository->remove($id);
        return null;
    }
}
