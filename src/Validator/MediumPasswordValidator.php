<?php

namespace School\Validator;

use School\Dto\RegisterUserDto;

class MediumPasswordValidator
{
    private string $mediumPasswordPattern;

    public function __construct()
    {
        //spaces are note allowed for password
        $this->mediumPasswordPattern = '[A-Z]{1}+(\S{6,})';
    }

    public function validate(RegisterUserDto $newUser): bool
    {
        return preg_match($this->mediumPasswordPattern, $newUser->password);
    }
}