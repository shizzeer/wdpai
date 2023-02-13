<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Doctor.php';

class DoctorRepository extends Repository
{
    public function getAllDoctors(): array
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM dbname.public."Doctors"
                                                    INNER JOIN dbname.public."Users"
                                                    ON dbname.public."Doctors"."idUser" = dbname.public."Users"."idUser"
                                                    INNER JOIN dbname.public."User_Details"
                                                    ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"');
        $stmt->execute();

        $doctors = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $doctor = new Doctor($row['idUser'], $row['name'], $row['surname'], $row['email'], $row['password'],
                                $row['dateOfBirth'], $row['phoneNumber'], $row['identityNumber'], $row['role'],
                                $row['idDoctor'], $row['specialization']);
            $doctors[] = $doctor;
        }
        return $doctors;
    }

    public function getDoctorNameById(int $doctorId): string
    {
        $stmt = $this->database->connect()->prepare('SELECT name, surname FROM dbname.public."Doctors"
                                                            INNER JOIN dbname.public."Users"
                                                            ON dbname.public."Doctors"."idUser" = dbname.public."Users"."idUser"
                                                            INNER JOIN dbname.public."User_Details"
                                                            ON dbname.public."User_Details"."idUserDetails" = dbname.public."Users"."idUserDetails"
                                                            WHERE "idDoctor" = :doctorId');
        $stmt->bindParam(':doctorId', $doctorId, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['name'].' '.$row['surname'];
    }

    public function getDoctorIdByUserId(int $userId): int
    {
        $stmt = $this->database->connect()->prepare('SELECT "idDoctor" FROM dbname.public."Doctors"
                                                           WHERE "idUser" = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['idDoctor'];
    }

    public function getDoctorIdBySurname(string $surname): int
    {
        $stmt = $this->database->connect()->prepare('SELECT "idDoctor" FROM dbname.public."Doctors"
                                                            INNER JOIN dbname.public."Users"
                                                            ON dbname.public."Doctors"."idUser" = dbname.public."Users"."idUser"
                                                            INNER JOIN dbname.public."User_Details"
                                                            ON dbname.public."User_Details"."idUserDetails" = dbname.public."Users"."idUserDetails"
                                                            WHERE "surname" = :surname');
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['idDoctor'];
    }
}