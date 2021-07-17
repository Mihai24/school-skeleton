<?php

namespace School\Validator;

use School\Dto\RegisterUserDto;

class WeakPasswordValidator
{
    private string $weakPasswordPattern;

    public function __construct()
    {
        //spaces are note allowed for password
        $this->weakPasswordPattern = '/^((?!.*[\s]).{6,})$/';
    }

    public function validate(RegisterUserDto $newUser): bool
    {
        return preg_match($this->weakPasswordPattern, $newUser->password);
    }
}