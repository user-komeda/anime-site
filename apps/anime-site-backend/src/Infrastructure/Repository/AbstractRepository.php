<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Entity\Entity;
use DI\Attribute\Inject;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/** @phpstan-ignore-next-line */
abstract class AbstractRepository extends EntityRepository
{
    #[Inject]
    public function __construct(
        private readonly EntityManager $entityManager,
        string $metadata
    ) {
        parent::__construct(
            $entityManager,
            $this->entityManager->getClassMetadata($metadata),
        );
    }

    /** @SuppressWarnings(PHPMD.CamelCaseMethodName) */
    protected function _save(Entity $entity): Entity
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
        return $entity;
    }

    /** @SuppressWarnings(PHPMD.CamelCaseMethodName) */
    protected function _remove(Entity $entity): void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @param array<string,mixed> $criteria
     * @return bool
     * @SuppressWarnings(PHPMD.CamelCaseMethodName)
     */
    public function _isExist(array $criteria): bool
    {
        return $this->findOneBy($criteria) !== null;
    }
}
