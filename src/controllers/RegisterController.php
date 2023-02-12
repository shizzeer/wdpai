<?php

require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/PatientRepository.php';
require_once __DIR__.'/../models/User.php';

class RegisterController extends AppController
{
    private UserRepository $userRepository;
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->patientRepository = new PatientRepository();
    }

    public function register()
    {
        if (!$this->isPost()) {
            $this->render('registration');
            return;
        }
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $dateOfBirth = $_POST['date_of_birth'];
        $identityNumber = $_POST['identity_number'];
        $phoneNumber = $_POST['phone_number'];

        if (!$this->userRepository->canRegisterUser($email)) {
            $this->render('registration', ['messages' => ['User with this email already exists']]);
            return;
        }
        if ($this->userRepository->identityNumberExists($identityNumber)) {
            $this->render('registration', ['messages' => ['User with this identity number already exists']]);
            return;
        }
        // ID is incremented automatically in database
        $userId = UserRepository::getNextAvailableUserId();
        $user = new User($userId, $name, $surname, $email,
            $password, $dateOfBirth, $phoneNumber,
            $identityNumber, 'patient');

        $this->userRepository->registerUser($user);
        // Registration system is only for patients
        $this->patientRepository->addPatient($user);
        $this->render('registration', ['messages' => ['Account created successfully!']]);
    }
}