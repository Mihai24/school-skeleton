<?php

namespace School\Validator\Email;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class TeacherEmail implements ValidatorInterface
{
    private string $teacherEmailPattern;

    public function __construct()
    {
        $this->teacherEmailPattern = 'sda';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->teacherEmailPattern, $dto->email);
    }
}