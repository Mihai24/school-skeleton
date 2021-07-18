<?php
require __DIR__ . '/vendor/autoload.php';
use School\Dto\RegisterUserDto;

$configuration = require __DIR__ . '/config/config.php';
//Construct the dto
//Instantiate all needed validators based on configuration
//Instantiate the repo
//Instantiate the register user service and call it
//Send back the error/succes response in JSON format

if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
    header('HTTP/1.1 405 Method Not Allowed');
    exit();
}

$registerUser = RegisterUserDto::createFromGlobals();