<?php

require_once __DIR__.'/../models/Prescription.php';
require_once 'Repository.php';
require_once 'PatientRepository.php';

class PrescriptionRepository extends Repository
{

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
}