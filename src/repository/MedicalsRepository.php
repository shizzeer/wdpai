<?php

require_once __DIR__.'/../models/Medical.php';

class MedicalsRepository extends Repository
{
    public function getMedicalsForPrescription(int $prescriptionId)
    {
        $stmt = $this->database->connect()->prepare('SELECT "name" FROM dbname.public."Medicals"
                                                    INNER JOIN dbname.public."Medicals_To_Prescription"
                                                    ON dbname.public."Medicals"."idMedical" = dbname.public."Medicals_To_Prescription"."idMedical"
                                                    WHERE "idPrescription" = :prescriptionId');
        $stmt->bindParam(':prescriptionId', $prescriptionId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getMedicalIdByName(string $medicalName): int
    {
        $stmt = $this->database->connect()->prepare('SELECT "idMedical" FROM dbname.public."Medicals"
                                                           WHERE "name" = :medicalName');
        $stmt->bindParam(':medicalName', $medicalName);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['idMedical'];
    }

    public function medicalAlreadyExists(Medical $medical): bool
    {
        $stmt = $this->database->connect()->prepare('SELECT "name" FROM dbname.public."Medicals"
                                                    WHERE "name" = :name');
        $medicalName = $medical->getName();
        $stmt->bindParam(':name', $medicalName);
        $stmt->execute();

        $rows = $stmt->fetchAll();
        return count($rows) > 0;
    }
    public function addMedicals(array $medicals)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO dbname.public."Medicals" ("name")
                                                    VALUES (?);');
        foreach ($medicals as $medical) {
            if (!$this->medicalAlreadyExists($medical)) {
                $stmt->execute([
                    rtrim($medical->getName())
                ]);
            }
        }
    }
}