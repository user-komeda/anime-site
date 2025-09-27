<?php

namespace App\Application\Exception;

class UserAlreadyFoundException extends AlreadyFoundException
{
    public function __construct(string $message = "user already exists")
    {
        parent::__construct($message);
    }
}
