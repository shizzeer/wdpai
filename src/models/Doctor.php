<?php

require_once 'User.php';

class Doctor extends User
{
    private $doctorId;
    private $specialization;

    public function __construct(int $id, string $name, string $surname,
                                string $email, string $password,
                                string $dateOfBirth, string $phoneNumber,
                                string $identityNumber, string $role,
                                int $doctorId, string $specialization)
    {
        parent::__construct($id, $name, $surname, $email, $password, $dateOfBirth,
                            $phoneNumber, $identityNumber, $role);
        $this->doctorId = $doctorId;
        $this->specialization = $specialization;
    }

    public function getDoctorId(): int
    {
        return $this->doctorId;
    }

    public function setDoctorId(int $doctorId): void
    {
        $this->doctorId = $doctorId;
    }

    public function getSpecialization(): string
    {
        return $this->specialization;
    }

    public function setSpecialization(string $specialization): void
    {
        $this->specialization = $specialization;
    }
}