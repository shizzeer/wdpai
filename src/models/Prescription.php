<?php

class Prescription
{
    private int $id;
    private int $patientId;
    private int $doctorId;
    private string $patientName;
    private string $patientSurname;
    private string $patientIdentityNumber;
    private string $medicals;
    private string $prescriptionDate;
    private string $treatmentDate;

    public function __construct(int $patientId, int $doctorId, string $patientName,
                                string $patientSurname, string $patientIdentityNumber,
                                string $medicals, string $prescriptionDate, string $treatmentDate)
    {
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->patientName = $patientName;
        $this->patientSurname = $patientSurname;
        $this->patientIdentityNumber = $patientIdentityNumber;
        $this->medicals = $medicals;
        $this->prescriptionDate = $prescriptionDate;
        $this->treatmentDate = $treatmentDate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getPatientId(): int
    {
        return $this->patientId;
    }

    public function setPatientId(int $patientId): void
    {
        $this->patientId = $patientId;
    }


    public function getDoctorId(): int
    {
        return $this->doctorId;
    }

    public function setDoctorId(int $doctorId): void
    {
        $this->doctorId = $doctorId;
    }

    public function getPatientName(): string
    {
        return $this->patientName;
    }

    public function getPatientSurname(): string
    {
        return $this->patientSurname;
    }

    public function getPatientIdentityNumber(): string
    {
        return $this->patientIdentityNumber;
    }

    public function getMedicals(): string
    {
        return $this->medicals;
    }

    public function getPrescriptionDate(): string
    {
        return $this->prescriptionDate;
    }

    public function getTreatmentDate(): string
    {
        return $this->treatmentDate;
    }
}