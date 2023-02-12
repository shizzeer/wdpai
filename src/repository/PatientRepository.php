<?php

require_once __DIR__.'/../models/Patient.php';
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class PatientRepository extends Repository
{
    function getPatientById(int $patientId): Patient
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM dbname.public."Patients"
                                                    INNER JOIN dbname.public."Users"
                                                    ON dbname.public."Patients"."idUser" = dbname.public."Users"."idUser"
                                                    INNER JOIN dbname.public."User_Details"
                                                    ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"
                                                    WHERE "idPatient" = :patientId');
        $stmt->bindParam(':patientId', $patientId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $patient = new Patient($row['idPatient'], $row['name'], $row['surname'], $row['email'], $row['password'],
                                $row['dateOfBirth'], $row['phoneNumber'], $row['identityNumber'], $row['role'],
                                $row['idPatient'], $row['lastVisit']);
        return $patient;
    }

    function getPatientIdByUserId(int $userId): int
    {
        $stmt = $this->database->connect()->prepare('SELECT "idPatient" FROM dbname.public."Patients"
                                                    WHERE "idUser" = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['idPatient'];
    }

    function getPatientIdByIdentityNumber(string $identityNumber): int
    {
        $stmt = $this->database->connect()->prepare('SELECT "idPatient" FROM dbname.public."Patients"
                                                    INNER JOIN dbname.public."Users"
                                                    ON dbname.public."Patients"."idPatient" = dbname.public."Users"."idUser"
                                                    INNER JOIN dbname.public."User_Details"
                                                    ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"
                                                    WHERE dbname.public."User_Details"."identityNumber" = :identityNumber');
        $stmt->bindParam(':identityNumber', $identityNumber);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['idPatient'];
    }

    function getPatientNameByUserId(int $userId): string
    {
        $stmt = $this->database->connect()->prepare('SELECT "name", "surname" FROM dbname.public."Patients"
                                                    INNER JOIN dbname.public."Users"
                                                    ON dbname.public."Patients"."idPatient" = dbname.public."Users"."idUser"
                                                    INNER JOIN dbname.public."User_Details"
                                                    ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"
                                                    WHERE dbname.public."Users"."idUser" = :userId');
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['name'].' '.$row['surname'];
    }

    function addPatient(User $user)
    {
        // Patient is added right after registering process so there is no need to assign any
        // value to the lastVisit field
        $stmt = $this->database->connect()->prepare('INSERT INTO dbname.public."Patients" ("idUser")
                                                    VALUES (?);');
        $stmt->execute([
            $user->getId()
        ]);
    }
}