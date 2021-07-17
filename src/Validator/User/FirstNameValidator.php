<?php

namespace School\Validator\User;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class FirstNameValidator implements ValidatorInterface
{
    private string $firstNamePattern;

    public function __construct()
    {
        $this->firstNamePattern = '/^[\p{L}\' -]+$/';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->firstNamePattern, $dto->firstName);
    }
}