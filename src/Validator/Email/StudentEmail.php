<?php

namespace School\Validator\Email;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class StudentEmail implements ValidatorInterface
{
    private string $studentEmailPattern;
    private array $configuration;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
        $this->studentEmailPattern = '^[a-zA-Z0-9.-]+@(gmail|yahoo|'. $this->configuration['SCHOOL_PROVIDER_REGEX'] .')\.com$';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->studentEmailPattern, $dto->email);
    }
}