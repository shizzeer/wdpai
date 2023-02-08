<?php

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Settings.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SettingsController extends DefaultController
{
    private UserRepository $userRepository;
    private Settings $settings;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->settings = new Settings();
    }

    function settings()
    {
        $user = $this->userRepository->getUserById($_SESSION['userId']);
        $this->settings->setAccountSettings($user);
        $this->render('settings', ['settings' => $this->settings]);
    }
}