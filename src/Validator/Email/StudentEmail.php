<?php

namespace School\Validator\Email;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class StudentEmail implements ValidatorInterface
{
    private string $studentEmailPattern;

    public function __construct()
    {
        $this->studentEmailPattern = 'sda';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->studentEmailPattern, $dto->email);
    }
}