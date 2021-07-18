<?php

namespace School\Validator\Email;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class TeacherEmail implements ValidatorInterface
{
    private string $teacherEmailPattern;
    private array $configuration;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
        $this->teacherEmailPattern = '^[a-zA-Z0-9.-]+@('. $this->configuration['SCHOOL_PROVIDER_REGEX'] .')\.com$';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->teacherEmailPattern, $dto->email);
    }
}