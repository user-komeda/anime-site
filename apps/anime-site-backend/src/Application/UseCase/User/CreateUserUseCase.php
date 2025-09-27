<?php

namespace App\Application\UseCase\User;

use App\Application\Dto\InputBaseDto;
use App\Application\Dto\User\UserCreateInputDto;
use App\Application\Dto\User\UserCreateOutputDto;
use App\Application\Exception\UserAlreadyFoundException;
use App\Application\Factory\User\UserFactory;
use App\Exception\InstanceMismatchException;

class CreateUserUseCase extends UserBaseInputUseCase
{
    public function invoke(
        InputBaseDto $dto,
        ?string $id = null
    ): UserCreateOutputDto {
        if (!$dto instanceof UserCreateInputDto || $id !== null) {
            throw InstanceMismatchException::forClass(
                UserCreateInputDto::class,
                $dto
            );
        }

        $isExistUser = $this->userService->isExistByEmail($dto->getEmail());

        if ($isExistUser) {
            throw new UserAlreadyFoundException();
        }

        $domainUserEntity = UserFactory::createEntityFromDto(
            $dto
        );
        $savedUserEntity = $this->userRepository->save($domainUserEntity);
        return UserCreateOutputDto::build($savedUserEntity);
    }
}
