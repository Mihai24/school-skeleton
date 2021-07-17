<?php

namespace School\Validator\SchoolIdentifier;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class TeacherIdentifierValidator implements ValidatorInterface
{
    private string $teacherIdentifierPattern;

    public function __construct()
    {
        $this->teacherIdentifierPattern= '/^(TEA-|TEACH-|TEACHER-)(\d{4}-)([a-zA-Z0-9]{1,3})$/';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->teacherIdentifierPattern, $dto->schoolIdentifier);
    }
}