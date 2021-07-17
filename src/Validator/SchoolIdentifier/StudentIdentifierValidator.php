<?php

namespace School\Validator\SchoolIdentifier;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class StudentIdentifierValidator implements ValidatorInterface
{
    private string $studentIdentifierPattern;

    public function __construct()
    {
        $this->studentIdentifierPattern = '/^(ST-|STUD-|STUDENT-)(\d{4}-)([a-zA-Z0-9]{2,6})$/';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->studentIdentifierPattern, $dto->schoolIdentifier);
    }
}