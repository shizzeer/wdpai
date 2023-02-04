<?php

class Appointment
{
    private Int $id;
    private String $doctorName;
    private String $patientName;
    private String $date;
    private String $time;
    private String $comments;
    private Float $price;
    private int $doctorId;
    private int $patientId;

    public function __construct(int $id, string $doctorName, string $patientName,
                                string $date, string $time, string $comments,
                                float $price, int $doctorId, int $patientId)
    {
        $this->id = $id;
        $this->doctorName = $doctorName;
        $this->patientName = $patientName;
        $this->date = $date;
        $this->time = $time;
        $this->comments = $comments;
        $this->price = $price;
        $this->doctorId = $doctorId;
        $this->patientId = $patientId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getDoctorName(): string
    {
        return $this->doctorName;
    }

    public function getPatientName(): string
    {
        return $this->patientName;
    }

    public function getComments(): string
    {
        return $this->comments;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDoctorId(): int
    {
        return $this->doctorId;
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }
}