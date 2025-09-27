<?php

namespace App\Infrastructure\CriteriaParamBuilder\User;

use App\Infrastructure\CriteriaParamBuilder\CriteriaParamBuilder;
use App\Infrastructure\Entity\User\UserEntity;

/**
 * @method static self id(string $value)
 * @method static self firstName(string $value)
 * @method static self lastName(string $value)
 * @method static self email(string $value)
 */
class UserEntityCriteriaParamBuilder extends CriteriaParamBuilder
{
    protected static function validateEntityClass(string $entityClass): bool
    {
        return UserEntity::class === $entityClass;
    }
}
