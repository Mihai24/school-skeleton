<?php
namespace School\Dto;

class RegisterUserDto
{
    public string $schoolIdentifier;
    public string $email;
    public string $firstName;
    public string $lastName;
    public string $confirmPassword;
    public string $password;
    public string $entryDate;
    public string $startDate;

    public static function createFromGlobals(): RegisterUserDto {
        //implement the creation from globals
        $newUser = new self();
        $newUser->schoolIdentifier = $_POST['schoolIdentifier'];
        $newUser->email = $_POST['email'];
        $newUser->firstName = $_POST['firstName'];
        $newUser->lastName = $_POST['lastName'];
        $newUser->confirmPassword = $_POST['confirmedPassword'];
        $newUser->password = $_POST['password'];
        $newUser->entryDate = $_POST['entryDate'];
        $newUser->startDate = $_POST['startDate'];

        return $newUser;
    }

}