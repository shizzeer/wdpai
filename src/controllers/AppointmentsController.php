<?php

require_once __DIR__.'/../repository/AppointmentsRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/DoctorRepository.php';
require_once __DIR__.'/../models/AppointmentValidator.php';

class AppointmentsController extends DefaultController
{
    private AppointmentsRepository $appointmentsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->appointmentsRepository = new AppointmentsRepository();
    }

    function reservations()
    {
        $appointments = $this->appointmentsRepository->getPatientAppointments($_SESSION['userId']);
        $this->render('reservations', ['appointments' => $appointments]);
    }

    function appointments()
    {
        $appointments = $this->appointmentsRepository->getDoctorAppointments($_SESSION['userId']);
        $this->render('appointments', ['appointments' => $appointments]);
    }

    function book()
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

        // 1. Sprawdź czy data jest przyszła
        else if (!isset($_POST['doctor']) || !isset($_POST['date']) || !isset($_POST['time'])) {
            $messages['generalMessage'] = 'Set all required fields';
            $this->render('booking', $messages);
            return;
        }
        // 2. Sprawdź czy data jest poprawna
        if (!$appointmentValidator->checkDate($_POST['date'])) {
            $messages['dateMessage'] = 'Set correct date';
            $this->render('booking', $messages);
            return;
        }
        // 3. Sprawdź czy czas jest poprawny
        $incorrectTimeMsg = $appointmentValidator->checkTime($_POST['time'], $_POST['date']);
        if (!empty($incorrectTimeMsg)) {
            $messages['timeMessage'] = $incorrectTimeMsg;
            $this->render('booking', $messages);
            return;
        }
        // 4. Sprawdź czy na wybrany dzień i porę jest miejsce
        if (!$appointmentValidator->checkAvailability($_POST['date'], $_POST['time'], $_POST['doctor'])) {
            $messages['generalMessage'] = 'There is another appointment on chosen time. Pick another one';
            $this->render('booking', $messages);
            return;
        }
        // 5. Wszystko ok
        // TODO: Zmapowanie nazwiska lekarza na jego ID i stworzenie obiektu Appointment
        $messages['generalMessage'] = 'Your appointment has been booked';
        $this->render('booking', $messages);
//        $this->appointmentsRepository->addAppointment();
    }
}