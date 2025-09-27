<?php

namespace App\Application\Exception;

class UserNotFoundException extends NotFoundException
{
    public function __construct(string $message = "user not found")
    {
        parent::__construct($message);
    }
}
