<?php

namespace School\Validator\Password;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class WeakPasswordValidator implements ValidatorInterface
{
    private string $weakPasswordPattern;

    public function __construct()
    {
        //spaces are note allowed for password
        $this->weakPasswordPattern = '/^((?!.*[\s]).{6,})$/';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->weakPasswordPattern, $dto->password);
    }
}