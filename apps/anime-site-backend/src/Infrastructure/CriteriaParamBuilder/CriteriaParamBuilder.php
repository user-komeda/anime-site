<?php

namespace App\Infrastructure\CriteriaParamBuilder;

use ReflectionClass;
use RuntimeException;

/** @phpstan-consistent-constructor */
abstract class CriteriaParamBuilder
{
    /**
     * @var array<string,mixed>
     */
    private array $criteria = [];
    /**
     * @var array<string,array<array<string,string>>>
     */
    private static array $propertyMapCache = [];

    protected function __construct(private readonly string $entityClass)
    {
        // プロパティマップをキャッシュ
        if (!isset(self::$propertyMapCache[$entityClass])) {
            /** @phpstan-ignore-next-line */
            $refClass = new ReflectionClass($entityClass);
            $properties = $refClass->getProperties(
                \ReflectionProperty::IS_PRIVATE
            );

            self::$propertyMapCache[$entityClass] = array_reduce(
                $properties,
                function ($carry, \ReflectionProperty $prop) {
                    $carry[$prop->getName()] = [
                        'type' => $prop->getType(
                        ) instanceof \ReflectionNamedType ? $prop->getType(
                        )->getName() : null,
                        'nullable' => $prop->getType()?->allowsNull() ?? true,
                    ];
                    return $carry;
                },
                []
            );
        }
    }

    public static function build(string $entityClass): static
    {
        if (!static::validateEntityClass($entityClass)) {
            throw new RuntimeException("不正なクラス名が渡されました");
        }
        return new static($entityClass);
    }

    abstract protected static function validateEntityClass(
        string $entityClass
    ): bool;

    /**
     * @param string $name
     * @param array<mixed> $arguments
     * @return $this
     */
    public function __call(string $name, array $arguments): static
    {
        $propertyMap = self::$propertyMapCache[$this->entityClass] ?? [];
        if (!array_key_exists($name, $propertyMap)) {
            throw new RuntimeException(
                "Field '$name' does not exist in entity {$this->entityClass}."
            );
        }

        $value = $arguments[0] ?? null;
        $expectedType = $propertyMap[$name]['type'];
        $isNullable = $propertyMap[$name]['nullable'];

        if ($value === null && !$isNullable) {
            throw new RuntimeException("Field '$name' cannot be null.");
        }

        if (
            $value !== null && $expectedType && !self::checkType(
                $value,
                $expectedType
            )
        ) {
            throw new RuntimeException(
                "Field '$name' expects type '$expectedType', " . gettype(
                    $value
                ) . " given."
            );
        }

        $this->criteria[$name] = $value;
        return $this;
    }

    private static function checkType(mixed $value, string $type): bool
    {
        return match ($type) {
            'int' => is_int($value),
            'float' => is_float($value),
            'string' => is_string($value),
            'bool' => is_bool($value),
            'array' => is_array($value),
            default => $value instanceof $type,
        };
    }

    /** @return array<string, mixed> */
    public function getCriteria(): array
    {
        return $this->criteria;
    }
}
