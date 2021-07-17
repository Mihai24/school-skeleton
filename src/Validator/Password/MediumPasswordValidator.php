<?php

namespace School\Validator\Password;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class MediumPasswordValidator implements ValidatorInterface
{
    private string $mediumPasswordPattern;

    public function __construct()
    {
        //spaces are note allowed for password
        $this->mediumPasswordPattern = '/^((?!.*[\s])(?=.*[A-Z]).{8,})$/';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->mediumPasswordPattern, $dto->password);
    }
}