<?php

namespace App\Domain\ValueObject;

use Ramsey\Uuid\Uuid;

readonly class IdentityId implements Equable
{
    private function __construct(private string $id)
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public static function build(): self
    {
        return new self(id: Uuid::uuid4()->toString());
    }

    public static function buildId(string $id): self
    {
        return new self($id);
    }

    public function equals(object $object): bool
    {
        if (!($object instanceof IdentityId)) {
            return false;
        }
        return $this->id === $object->id;
    }
}
