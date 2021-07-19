<?php
require __DIR__ . '/vendor/autoload.php';
use School\Dto\RegisterUserDto;
use School\Validator\Role\StudentValidator;
use School\Validator\Role\TeacherValidator;

$configuration = require __DIR__ . '/config/config.php';
//Construct the dto
//Instantiate all needed validators based on configuration
//Instantiate the repo
//Instantiate the register user service and call it
//Send back the error/succes response in JSON format

if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode('Method not allowed');
    exit();
}

$isTeacher = $_POST['is_teacher'];

if (!isset($isTeacher))
{
    exit();
}

$registerUser = RegisterUserDto::createFromGlobals();

if ($isTeacher == 0)
{
    $validators = StudentValidator::ValidateStudent($configuration);
}

if ($isTeacher == 1)
{
    $validators = TeacherValidator::ValidateTeacher($configuration);
}