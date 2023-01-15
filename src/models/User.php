<?php

namespace models;

class User
{
    private $name;
    private $surname;
    private $email;
    private $password;
    private $dateOfBirth;
    private $phoneNumber;
    private $identityNumber;


    public function __construct(string $name, string $surname,
                                string $email, string $password,
                                string $dateOfBirth, string $phoneNumber,
                                string $identityNumber)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->dateOfBirth = $dateOfBirth;
        $this->phoneNumber = $phoneNumber;
        $this->identityNumber = $identityNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(string $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getIdentityNumber(): string
    {
        return $this->identityNumber;
    }

    public function setIdentityNumber(string $identityNumber)
    {
        $this->identityNumber = $identityNumber;
    }
}