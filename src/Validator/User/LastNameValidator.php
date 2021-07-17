<?php

namespace School\Validator\User;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class LastNameValidator implements ValidatorInterface
{
    private string $lastNamePattern;

    public function __construct()
    {
        $this->lastNamePattern = '/^[\p{L}\' -]+$/';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->lastNamePattern, $dto->lastName);
    }
}