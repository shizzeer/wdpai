<?php

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Settings.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/SettingsRepository.php';

class SettingsController extends AppController
{
    private UserRepository $userRepository;
    private Settings $settings;
    private SettingsRepository $settingsRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->settings = new Settings();
        $this->settingsRepository = new SettingsRepository();
    }

    function settings()
    {
        if (isset($_SESSION['userId'])) {
            $user = $this->userRepository->getUserById($_SESSION['userId']);
            $this->settings->setAccountSettings($user);
            // Initial validation is done on the client-side
            if (isset($_POST['name'])) {
                $name = explode(" ", $_POST['name'])[0];
                $surname = explode(" ", $_POST['name'])[1];
                $user->setName($name);
                $user->setSurname($surname);
                $this->settings->setAccountSettings($user);
                $this->settingsRepository->updateNameAndSurname($user->getId(), $name, $surname);
            }
            if (isset($_POST['email'])) {
                // If this mail already exists
                if (!$this->userRepository->canRegisterUser($_POST['email'])) {
                    $this->render('settings', ['settings' => $this->settings]);
                    return;
                }
                $user->setEmail($_POST['email']);
                $this->settings->setAccountSettings($user);
                $this->settingsRepository->updateEmail($user->getId(), $_POST['email']);
            }
            if (isset($_POST['password'])) {
                $hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $user->setPassword($hashed_password);
                $this->settings->setAccountSettings($user);
                $this->settingsRepository->updatePassword($user->getId(), $hashed_password);
            }
            if (isset($_POST['date'])) {
                $user->setDateOfBirth($_POST['date']);
                $this->settings->setAccountSettings($user);
                $this->settingsRepository->updateDateOfBirth($user->getId(), $_POST['date']);
            }
            if (isset($_POST['phone_number'])) {
                $user->setPhoneNumber($_POST['phone_number']);
                $this->settings->setAccountSettings($user);
                $this->settingsRepository->updatePhoneNumber($user->getId(), $_POST['phone_number']);
            }
            if (isset($_POST['identity_number'])) {
                $user->setIdentityNumber($_POST['identity_number']);
                $this->settings->setAccountSettings($user);
                $this->settingsRepository->updateIdentityNumber($user->getId(), $_POST['identity_number']);
            }
        }
        $this->render('settings', ['settings' => $this->settings]);
    }
}