<?php

namespace School\Validator;

use School\Dto\RegisterUserDto;

class LastNameValidator
{
    private string $lastNamePattern;

    public function __construct()
    {
        $this->lastNamePattern = '/^[\p{L}\' -]+$/';
    }

    public function validate(RegisterUserDto $newUser): bool
    {
        return preg_match($this->lastNamePattern, $newUser->lastName);
    }
}