<?php

namespace App\Application\Factory\User;

use App\Application\Dto\InputBaseDto;
use App\Application\Dto\User\UserCreateInputDto;
use App\Application\Dto\User\UserOutputDto;
use App\Application\Factory\Factory;
use App\Domain\Entity\User\DomainUserEntity;
use App\Domain\ValueObject\User\UserEmail;
use App\Domain\ValueObject\User\UserName;
use App\Exception\InstanceMismatchException;

class UserFactory implements Factory
{
    public static function createEntityFromDto(InputBaseDto $dto): DomainUserEntity
    {
        if (!$dto instanceof UserCreateInputDto) {
            throw InstanceMismatchException::forClass(UserOutputDto::class, $dto);
        }

        return new DomainUserEntity(
            userName: new UserName($dto->getFirstName(), $dto->getLastName()),
            userEmail: new UserEmail($dto->getEmail()),
        );
    }
}
