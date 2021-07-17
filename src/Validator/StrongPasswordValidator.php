<?php

namespace School\Validator;

use School\Dto\RegisterUserDto;

class StrongPasswordValidator
{
    private string $strongPasswordPattern;

    public function __construct()
    {
        //spaces are note allowed for password
        $this->strongPasswordPattern = '/^((?!.*[\s])(?=.*[A-Z])(?=.*\W).{10,})$/';
    }

    public function validate(RegisterUserDto $newUser): bool
    {
        return preg_match($this->strongPasswordPattern, $newUser->password);
    }
}