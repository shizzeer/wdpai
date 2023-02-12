<?php

require_once 'User.php';

class Patient extends User
{
    private int $patientId;
    private string $lastVisit;

    public function __construct(int $id, string $name, string $surname,
                                string $email, string $password,
                                string $dateOfBirth, string $phoneNumber,
                                string $identityNumber, string $role,
                                int $patientId, ?string $lastVisit)
    {
        parent::__construct($id, $name, $surname, $email, $password, $dateOfBirth,
            $phoneNumber, $identityNumber, $role);
        $this->patientId = $patientId;
        $this->lastVisit = $lastVisit === NULL ? '' : $lastVisit;
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }

    public function setPatientId(int $patientId): void
    {
        $this->patientId = $patientId;
    }

    public function getLastVisit(): string
    {
        return $this->lastVisit;
    }

    public function setLastVisit(string $lastVisit): void
    {
        $this->lastVisit = $lastVisit;
    }
}