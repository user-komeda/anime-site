<?php

namespace App\Application\UseCase\User;

use App\Application\Dto\InputBaseDto;
use App\Application\Dto\User\UserUpdateInputDto;
use App\Application\Exception\UserNotFoundException;
use App\Exception\InstanceMismatchException;

class UpdateUserUseCase extends UserBaseInputUseCase
{
    public function invoke(
        InputBaseDto $dto,
        ?string $id = null
    ): null {
        if ($id === null || !$dto instanceof UserUpdateInputDto) {
            throw InstanceMismatchException::forClass(
                UserUpdateInputDto::class,
                $dto
            );
        }
        $user = $this->userRepository->findById($id);
        if ($user === null) {
            throw new UserNotFoundException();
        }
        $user->changeUser(
            $dto->getFirstName(),
            $dto->getLastName(),
            $dto->getEmail()
        );
        $this->userRepository->save($user, $id);
        return null;
    }
}
