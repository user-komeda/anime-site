<?php

namespace App\Application\UseCase\User;

use App\Application\Dto\User\UserOutputDto;

class ListUserUseCase extends UserBaseUseCase
{
    /**
     * @return array<UserOutputDto>
     */
    public function invoke(): array
    {
        $userEntityList = $this->userRepository->findAll();
        return UserOutputDto::buildFromArray($userEntityList);
    }
}
