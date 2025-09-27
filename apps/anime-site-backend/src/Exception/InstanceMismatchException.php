<?php

namespace App\Exception;

use RuntimeException;

class InstanceMismatchException extends RuntimeException
{
    public static function forClass(string $expected, object $actual): self
    {
        return new self(sprintf('Expected instance of %s, got %s.', $expected, get_class($actual)));
    }
}
