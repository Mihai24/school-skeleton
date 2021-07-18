<?php

namespace School\Validator\Date;

use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class DateValidator implements ValidatorInterface
{

    private array $configuration;
    private int $numberOfDays;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
        $this->numberOfDays = 0;
    }

    /**
     * @throws \Exception
     */
    public function validate(RegisterUserDto $dto): bool
    {
        $entryDate = new \DateTime($dto->entryDate);
        $startDate = new \DateTime($dto->startDate);
        $this->numberOfDays = date_diff($startDate, $entryDate);

        return $this->numberOfDays->format('%a') < $this->configuration['DATE_DIFFERENCE_IN_DAYS'];

    }
}