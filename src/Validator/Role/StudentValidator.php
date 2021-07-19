<?php

namespace School\Validator\Role;

use School\Traits\SchoolConfiguration;
use School\Validator\Date\DateValidator;
use School\Validator\Email\StudentEmail;
use School\Validator\SchoolIdentifier\StudentIdentifierValidator;
use School\Validator\User\FirstNameValidator;
use School\Validator\User\LastNameValidator;
use School\Validator\ValidatorCollection;

class StudentValidator
{
    public static function validateStudent(array $configuration): ValidatorCollection
    {
        $validator = new ValidatorCollection();

        $validator->addValidator(new StudentIdentifierValidator());
        $validator->addValidator(new FirstNameValidator());
        $validator->addValidator(new LastNameValidator());
        $validator->addValidator(new StudentEmail($configuration));
        $validator->addValidator(new DateValidator($configuration));

        return $validator;

    }
}