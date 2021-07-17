<?php

namespace School\Validator;

use School\Dto\RegisterUserDto;

class FirstNameValidator
{
    private string $firstNamePattern;

    public function __construct()
    {
        $this->firstNamePattern = '/^[\p{L}\' -]+$/';
    }

    public function validate(RegisterUserDto $newUser): bool
    {
        return preg_match($this->firstNamePattern, $newUser->firstName);
    }
}