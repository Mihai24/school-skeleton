<?php

namespace School\Validator\Role;

use School\Traits\SchoolConfiguration;
use School\Validator\Date\DateValidator;
use School\Validator\Email\TeacherEmail;
use School\Validator\SchoolIdentifier\TeacherIdentifierValidator;
use School\Validator\User\FirstNameValidator;
use School\Validator\User\LastNameValidator;
use School\Validator\ValidatorCollection;

class TeacherValidator
{
    use SchoolConfiguration;

    public static function validateTeacher(array $configuration): ValidatorCollection
    {
        $validator = new ValidatorCollection();

        $validator->addValidator(new TeacherIdentifierValidator());
        $validator->addValidator(new FirstNameValidator());
        $validator->addValidator(new LastNameValidator());
        $validator->addValidator(new TeacherEmail($configuration));
        $validator->addValidator(new DateValidator($configuration));

        return $validator;
    }
}