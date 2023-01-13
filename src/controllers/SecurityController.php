<?php

use models\User;
use repository\UserRepository;
use repository\SessionRepository;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once 'SessionController.php';

class SecurityController extends AppController
{
    public function login()
    {
        session_start();
        $sessionController = new SessionController();
        // If session is valid then user is automatically logged in
        if (isset($_SESSION['sessionId']) && !$sessionController->didSessionExpired($_SESSION['sessionId']))
        {
            if (isset($_SESSION['role']))
            {
                if ($_SESSION['role'] == 'patient')
                    header("Location: {$this->getUrl()}/offers");
                else
                    header("Location: {$this->getUrl()}/appointments");
                return;
            }
        }

        if (!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);

        if ($user === null || $user->getEmail() !== $email || $user->getPassword() !== $password)
        {
            return $this->render('login', ['messages' => ['Wrong username or password']]);
        }
        // New session created
        $_SESSION['userId'] = $user->getId();
        $_SESSION['remoteIP'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['role'] = $user->getRole();
        $_SESSION['lastActivity'] = time();

        // TODO: Zapisac nowa sesje do bazy danych

        if ($_SESSION['role'] == 'patient')
            header("Location: {$this->getUrl()}/offers");
        else
            header("Location: {$this->getUrl()}/appointments");
    }
}