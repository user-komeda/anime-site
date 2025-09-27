<?php

namespace App\Infrastructure\Entity\User;

use App\Domain\Entity\DomainEntity;
use App\Domain\Entity\User\DomainUserEntity;
use App\Domain\ValueObject\IdentityId;
use App\Domain\ValueObject\User\UserEmail;
use App\Domain\ValueObject\User\UserName;
use App\Exception\InstanceMismatchException;
use App\Infrastructure\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use RuntimeException;

#[ORM\Entity]
#[ORM\Table(name: 'user')]
class UserEntity implements Entity
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private string|null $id = null;
    #[ORM\Column(type: 'string')]
    private string $firstName;
    #[ORM\Column(type: 'string')]
    private string $lastName;
    #[ORM\Column(type: 'string', unique: true)]
    private string $email;

    public function __construct(
        string $firstName,
        string $lastName,
        string $email
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    // .. (other code)
    public static function build(DomainEntity $entity): UserEntity
    {
        if (!$entity instanceof DomainUserEntity) {
            throw InstanceMismatchException::forClass(
                UserEntity::class,
                $entity
            );
        }
        return new self(
            $entity->getName()->getFirstName(),
            $entity->getName()->getLastName(),
            $entity->getEmail()->getEmail()
        );
    }

    public function mergeDomainEntity(DomainUserEntity $entity): void
    {
        $this->firstName = $entity->getName()->getFirstName();
        $this->lastName = $entity->getName()->getLastName();
        $this->email = $entity->getEmail()->getEmail();
    }

    public function convertToDomainEntity(): DomainUserEntity
    {
        if ($this->id === null) {
            throw new RuntimeException("");
        }

        return new DomainUserEntity(
            new UserName($this->firstName, $this->lastName),
            new UserEmail($this->email),
            IdentityId::buildId($this->id)
        );
    }
}
