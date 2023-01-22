<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/SessionRepository.php';
require_once 'SessionController.php';

class SecurityController extends AppController
{
    public function login()
    {
        session_start();
        $sessionController = new SessionController();
        $sessionRepository = new SessionRepository();

        if (!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);

        if ($user === null || $user->getEmail() !== $email || !password_verify($password, $user->getPassword()))
        {
            return $this->render('login', ['messages' => ['Wrong username or password']]);
        }
        // Existing session is retrieved from db or new one is created
        if (!$sessionRepository->getSession($_SERVER['REMOTE_ADDR']))
            $sessionController->createNewSession($user);

        if ($_SESSION['userRole'] === 'doctor')
            header("Location: {$this->getUrl()}/appointments");
        else
            header("Location: {$this->getUrl()}/offers");
    }

    public function logout()
    {
        $sessionController = new SessionController();
        if (isset($_SESSION['sessionId'])) {
            $sessionController->removeSession();
            header("Location: {$this->getUrl()}/login");
        }
    }

    public function authorizationHandler(string $userRole, bool $availableForAllUsers = false)
    {
        session_start();
        $sessionController = new SessionController();
        $sessionRepository = new SessionRepository();
        if (!isset($_SESSION['sessionId']) && !$sessionRepository->getSession($_SERVER['REMOTE_ADDR'])) {
            header("Location: {$sessionController->getUrl()}/not_authorized");
        }
        else {
            if (!$availableForAllUsers && $_SESSION['userRole'] !== $userRole) {
                header("Location: {$sessionController->getUrl()}/not_authorized");
            }
            if ($sessionController->didSessionExpired($_SESSION['sessionId'])) {
                header("Location: {$sessionController->getUrl()}/login");
            }
        }
    }
}