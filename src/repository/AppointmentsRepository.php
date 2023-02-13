<?php

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Appointment.php';
require_once 'Repository.php';
require_once 'DoctorRepository.php';

class AppointmentsRepository extends Repository
{
    private DoctorRepository $doctorRepository;

    public function __construct()
    {
        parent::__construct();
        $this->doctorRepository = new DoctorRepository();
    }

    public function getPatientAppointments(int $userId): array
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM dbname.public."Appointments" 
                                                    INNER JOIN dbname.public."Patients"
                                                    ON dbname.public."Appointments"."idPatient" = dbname.public."Patients"."idPatient"
                                                    INNER JOIN dbname.public."Users"
                                                    ON dbname.public."Patients"."idUser" = dbname.public."Users"."idUser"
                                                    INNER JOIN dbname.public."User_Details"
                                                    ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"
                                                    WHERE dbname.public."Users"."idUser" = :userId
                                                    ORDER BY dbname.public."Appointments"."date"');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $appointments = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $doctorName = $this->doctorRepository->getDoctorNameById($row['idDoctor']);
            $patientName = $row['name'].' '.$row['surname'];
            if ($row['comments'] === null) {
                $row['comments'] = '';
            }
            $appointment = new Appointment($row['idAppointment'], $doctorName, $patientName, $row['date'],
                    $row['time'], $row['comments'], $row['price'],
                    $row['idDoctor'], $row['idPatient']);
            $appointments[] = $appointment;
        }

        return $appointments;
    }

    public function getDoctorAppointments(int $userId): array
    {
        $doctorId = $this->doctorRepository->getDoctorIdByUserId($userId);
        $stmt = $this->database->connect()->prepare('SELECT * FROM dbname.public."Appointments"
                                                     INNER JOIN dbname.public."Patients"
                                                    ON dbname.public."Appointments"."idPatient" = dbname.public."Patients"."idPatient"
                                                    INNER JOIN dbname.public."Users"
                                                    ON dbname.public."Patients"."idUser" = dbname.public."Users"."idUser"
                                                    INNER JOIN dbname.public."User_Details"
                                                    ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"
                                                    WHERE dbname.public."Appointments"."idDoctor" = :doctorId
                                                    ORDER BY dbname.public."Appointments"."date"');
        $stmt->bindParam(':doctorId', $doctorId, PDO::PARAM_INT);
        $stmt->execute();

        $appointments = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $patientName = $row['name'].' '.$row['surname'];
            if ($row['comments'] === null) {
                $row['comments'] = '';
            }
            $appointment = new Appointment($row['idAppointment'], '', $patientName, $row['date'],
                $row['time'], $row['comments'], $row['price'],
                $row['idDoctor'], $row['idPatient']);
            $appointments[] = $appointment;
        }
        return $appointments;
    }

    public function getAppointmentsByDateTimeAndDoctorSurname(string $surname, string $date, string $time)
    {
        $stmt = $this->database->connect()->prepare('SELECT date, time FROM dbname.public."Appointments"
                                             INNER JOIN dbname.public."Doctors"
                                             ON dbname.public."Appointments"."idDoctor" = dbname.public."Doctors"."idDoctor"
                                             INNER JOIN dbname.public."Users"
                                             ON dbname.public."Doctors"."idUser" = dbname.public."Users"."idUser"
                                             INNER JOIN dbname.public."User_Details"
                                             ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"
                                             WHERE "surname" = :surname AND "date" = :date AND "time" = :time');
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
        $stmt->bindParam(':time', $time, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addAppointment(Appointment $appointment)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO dbname.public."Appointments" ("date", "time", "price", "comments", "idPatient",
                                                    "idDoctor")
                                                    VALUES (?, ?, ?, ?, ?, ?);');
        $stmt->execute([
            $appointment->getDate(),
            $appointment->getTime(),
            $appointment->getPrice(),
            $appointment->getComments(),
            $appointment->getPatientId(),
            $appointment->getDoctorId()
        ]);
    }

    public function removeAppointment(int $appointmentId): bool
    {
        $stmt = $this->database->connect()->prepare('DELETE FROM dbname.public."Appointments" 
                                                        WHERE "idAppointment" = :appointmentId');
        $stmt->bindParam(':appointmentId', $appointmentId);
        return $stmt->execute();
    }
}