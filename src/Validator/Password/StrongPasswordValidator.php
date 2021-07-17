<?php

namespace School\Validator\Password;

use School\Dto\RegisterUserDto;

class StrongPasswordValidator implements ValidatorInterface
{
    private string $strongPasswordPattern;

    public function __construct()
    {
        //spaces are note allowed for password
        $this->strongPasswordPattern = '/^((?!.*[\s])(?=.*[A-Z])(?=.*\W).{10,})$/';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->strongPasswordPattern, $dto->password);
    }
}