<?php

require_once __DIR__.'/../repository/AppointmentsRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/DoctorRepository.php';
require_once __DIR__.'/../models/AppointmentValidator.php';

require_once __DIR__.'/../models/Appointment.php';

class AppointmentsController extends AppController
{
    private AppointmentsRepository $appointmentsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->appointmentsRepository = new AppointmentsRepository();
    }

    public function reservations()
    {
        $appointments = array();
        if (isset($_SESSION['userId'])) {
            $appointments = $this->appointmentsRepository->getPatientAppointments($_SESSION['userId']);
        }
        $this->render('reservations', ['appointments' => $appointments]);
    }

    public function appointments()
    {
        $appointments = array();
        if (isset($_SESSION['userId'])) {
            $appointments = $this->appointmentsRepository->getDoctorAppointments($_SESSION['userId']);
        }
        $this->render('appointments', ['appointments' => $appointments]);
    }

    public function book()
    {
        $appointmentValidator = new AppointmentValidator();
        $messages = array();

        $doctorRepository = new DoctorRepository();
        $doctors = $doctorRepository->getAllDoctors();
        $messages['doctors'] = $doctors;

        if (!$this->isPost()) {
            $this->render('booking', $messages);
            return;
        }

        else if (!isset($_POST['doctor']) || !isset($_POST['date']) || !isset($_POST['time'])) {
            $messages['generalMessage'] = 'Set all required fields';
            $this->render('booking', $messages);
            return;
        }
        if (!$appointmentValidator->checkDate($_POST['date'])) {
            $messages['dateMessage'] = 'Set correct date';
            $this->render('booking', $messages);
            return;
        }
        $incorrectTimeMsg = $appointmentValidator->checkTime($_POST['time'], $_POST['date']);
        if (!empty($incorrectTimeMsg)) {
            $messages['timeMessage'] = $incorrectTimeMsg;
            $this->render('booking', $messages);
            return;
        }
        if (!$appointmentValidator->checkAvailability($_POST['date'], $_POST['time'], $_POST['doctor'])) {
            $messages['generalMessage'] = 'There is another appointment on chosen time. Pick another one';
            $this->render('booking', $messages);
            return;
        }
        $messages['generalMessage'] = 'Your appointment has been booked';
        if ($_POST['comments'] === null) {
            $_POST['comments'] = '';
        }
        $appointment = Appointment::createAppointmentForBooking($_SESSION['userId'], $_POST['date'], $_POST['time'],
                                                                $_POST['comments'], 99.99, $_POST['doctor']);
        $this->appointmentsRepository->addAppointment($appointment);
        $this->render('booking', $messages);
    }

    public function remove_appointment()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $appointmentId = $data['id'];
        if ($appointmentId) {
            if ($this->appointmentsRepository->removeAppointment($appointmentId)) {
                http_response_code(200);
            } else {
                header('Content-Type: application/json');
                echo json_encode(['message' => 'Error while removing appointment']);
                http_response_code(500);
            }
        } else {
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Appointment ID not set']);
            http_response_code(500);
        }
    }
}