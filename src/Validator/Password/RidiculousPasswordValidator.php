<?php

namespace School\Validator\Password;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class RidiculousPasswordValidator implements ValidatorInterface
{
    public string $ridiculousPasswordPattern;

    public function __construct()
    {
        $this->ridiculousPasswordPattern = '^((?!.*[\s])(?=.*[A-Z])(?=.*\W)(?!.*(?i)(firstname|lastname)).{10,})$';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        $this->ridiculousPasswordPattern = str_replace('firstname', $dto->firstName, $this->ridiculousPasswordPattern);
        $this->ridiculousPasswordPattern = str_replace('lastname', $dto->lastName, $this->ridiculousPasswordPattern);

        return preg_match($this->ridiculousPasswordPattern, $dto->password);
    }
}