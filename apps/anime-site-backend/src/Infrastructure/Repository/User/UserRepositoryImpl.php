<?php

namespace App\Infrastructure\Repository\User;

use App\Domain\Entity\User\DomainUserEntity;
use App\Domain\Repository\User\UserRepository;
use App\Exception\InstanceMismatchException;
use App\Infrastructure\CriteriaParamBuilder\User\UserEntityCriteriaParamBuilder;
use App\Infrastructure\Entity\User\UserEntity;
use App\Infrastructure\Repository\AbstractRepository;
use DI\Attribute\Inject;
use DI\NotFoundException;
use Doctrine\ORM\EntityManager;
use RuntimeException;

class UserRepositoryImpl extends AbstractRepository implements
    UserRepository
{
    #[Inject]
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, UserEntity::class);
    }

    public function save(
        DomainUserEntity $userEntity,
        ?string $id = null
    ): DomainUserEntity {
        if (empty($id)) {
            $entity = UserEntity::build($userEntity);
            $savedEntity = $this->_save($entity);
            if (!$savedEntity instanceof UserEntity) {
                throw new RuntimeException("");
            }
            return $savedEntity->convertToDomainEntity();
        }
        $entity = $this->getEntityManager()->getReference(
            UserEntity::class,
            $id
        );

        if (!$entity instanceof UserEntity) {
            throw new NotFoundException();
        }
        $entity->mergeDomainEntity($userEntity);
        $this->_save($entity);
        return $entity->convertToDomainEntity();
    }

    public function remove(string $id): void
    {
        $entity = $this->getEntityManager()->getReference(
            UserEntity::class,
            $id
        );

        if (!$entity instanceof UserEntity) {
            throw new RuntimeException("");
        }
        $this->_remove($entity);
    }

    public function isExistByEmail(string $email): bool
    {
        $criteria = UserEntityCriteriaParamBuilder::build(
            UserEntity::class
        )->email(
            $email
        )->getCriteria();
        return $this->_isExist($criteria);
    }

    public function isExistById(string $id): bool
    {
        $criteria = UserEntityCriteriaParamBuilder::build(
            UserEntity::class
        )->id(
            $id
        )->getCriteria();
        return $this->_isExist($criteria);
    }

    /**
     * @return array<DomainUserEntity>
     */
    public function findAll(): array
    {
        $userList = parent::findAll();
        return array_reduce(
            $userList,
            function (array $carry, $user) {
                if (!$user instanceof UserEntity) {
                    throw InstanceMismatchException::forClass(
                        UserEntity::class,
                        $user
                    );
                }
                $carry[] = $user->convertToDomainEntity();
                return $carry;
            },
            []
        );
    }

    public function findById(string $id): DomainUserEntity|null
    {
        $user = $this->getEntityManager()->find(
            UserEntity::class,
            $id
        );
        if ($user === null) {
            return null;
        }
        return $user->convertToDomainEntity();
    }
}
