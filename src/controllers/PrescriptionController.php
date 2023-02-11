<?php

require_once __DIR__.'/../models/Prescription.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/PatientRepository.php';
require_once __DIR__.'/../repository/DoctorRepository.php';
require_once __DIR__.'/../repository/PrescriptionRepository.php';

class PrescriptionController extends AppController
{
    private PrescriptionRepository $prescriptionRepository;
    private UserRepository $userRepository;
    private PatientRepository $patientRepository;
    private DoctorRepository $doctorRepository;

    public function __construct()
    {
        parent::__construct();
        $this->prescriptionRepository = new PrescriptionRepository();
        $this->userRepository = new UserRepository();
        $this->patientRepository = new PatientRepository();
        $this->doctorRepository = new DoctorRepository();
    }

    function write_prescription()
    {
        if (isset($_SESSION['userId'])) {
            if (isset($_POST['patient_id_number']) && isset($_POST['medicals']) &&
                isset($_POST['prescription_date']) && isset($_POST['treatment_date'])) {

                $patientIdentityNumber = $_POST['patient_id_number'];
                $medicals = $_POST['medicals'];
                $prescriptionDate = $_POST['prescription_date'];
                $treatmentDate = $_POST['treatment_date'];

                if ($this->userRepository->identityNumberExists($patientIdentityNumber)) {
                    $patientId = $this->patientRepository->getPatientIdByIdentityNumber($patientIdentityNumber);
                    $doctorId = $this->doctorRepository->getDoctorIdByUserId($_SESSION['userId']);

                    $patient = $this->patientRepository->getPatientById($patientId);
                    $prescription = new Prescription($patientId, $doctorId, $patient->getName(), $patient->getSurname(),
                                                    $patient->getIdentityNumber(), $medicals, $prescriptionDate,
                                                    $treatmentDate);
                    $this->prescriptionRepository->addPrescription($prescription);
                } else {
                    $this->render('write_prescription', ['messages' => ['Patient with specified identity number does not exist']]);
                    return;
                }
            }
            if ($this->isPost()) {
                $this->render('write_prescription', ['messages' => ['Set all fields']]);
                return;
            }
        }
        $this->render('write_prescription');
    }
}