<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class PatientRepository extends Repository
{

    function getPatientIdByUserId(int $userId): int
    {
        $stmt = $this->database->connect()->prepare('SELECT "idPatient" FROM dbname.public."Patients"
                                                    WHERE "idUser" = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
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