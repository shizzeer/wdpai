<?php

require_once __DIR__.'/../models/Prescription.php';
require_once __DIR__.'/../controllers/MedicalsController.php';
require_once 'Repository.php';
require_once 'PatientRepository.php';
require_once 'MedicalsRepository.php';

class PrescriptionRepository extends Repository
{
    public function getPrescriptionIdByDoctorId(int $doctorId): int
    {
        $stmt = $this->database->connect()->prepare('SELECT "idPrescription" FROM dbname.public."Prescriptions"
                                                           WHERE "idDoctor" = :doctorId');
        $stmt->bindParam(':doctorId', $doctorId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['idPrescription'];
    }

    public function getPrescriptions(int $doctorId): array
    {
        $medicalsRepository = new MedicalsRepository();
        $medicalsController = new MedicalsController();
        $stmt = $this->database->connect()->prepare('SELECT * FROM dbname.public."Prescriptions"
                                                    INNER JOIN dbname.public."Patients"
                                                    ON dbname.public."Prescriptions"."idPatient" = dbname.public."Patients"."idPatient"
                                                    INNER JOIN dbname.public."Users"
                                                    ON dbname.public."Patients"."idUser" = dbname.public."Users"."idUser"
                                                    INNER JOIN dbname.public."User_Details"
                                                    ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"
                                                    INNER JOIN dbname.public."Doctors"
                                                    ON dbname.public."Prescriptions"."idDoctor" = dbname.public."Doctors"."idDoctor"
                                                    WHERE dbname.public."Prescriptions"."idDoctor" = :doctorId');
        $stmt->bindParam(':doctorId', $doctorId, PDO::PARAM_INT);
        $stmt->execute();

        $prescriptions = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // for every prescription get medicals (many to many relationship)
            $medicals = $medicalsRepository->getMedicalsForPrescription($row['idPrescription']);
            $medicalsAsStr = $medicalsController->castMedicalsListToString($medicals);
            $prescription = new Prescription($row['idPrescription'], $row['idPatient'], $doctorId, $row['name'],
                                            $row['surname'], $row['identityNumber'], $medicalsAsStr, $row['date'],
                                            $row['treatmentStartDate']);
            $prescriptions[] = $prescription;
        }
        return $prescriptions;
    }

    public function getNextAvailableId()
    {
        $stmt = $this->database->connect()->prepare('SELECT MAX("idPrescription") AS max_id FROM dbname.public."Prescriptions"');
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['max_id'] + 1;
    }

    public function addPrescription(Prescription $prescription)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO dbname.public."Prescriptions" ("idPatient", "date", "treatmentStartDate",
                                                            "idDoctor")
                                                    VALUES (?, ?, ?, ?);');
        $stmt->execute([
            $prescription->getPatientId(),
            $prescription->getPrescriptionDate(),
            $prescription->getPrescriptionDate(),
            $prescription->getDoctorId()
        ]);
    }

    public function linkPrescriptionWithMedicals(Prescription $prescription, array $medicals)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO dbname.public."Medicals_To_Prescription" ("idPrescription", "idMedical")
                                                            VALUES (?, ?)');
        $prescriptionId = $prescription->getId();
        $medicalsRepository = new MedicalsRepository();
        foreach ($medicals as $medical) {
            $medicalId = $medicalsRepository->getMedicalIdByName(rtrim($medical->getName()));
            $stmt->execute([
                $prescriptionId,
                $medicalId
            ]);
        }
    }
}