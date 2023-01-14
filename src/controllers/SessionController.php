<?php

use repository\SessionRepository;
require_once __DIR__.'/../repository/SessionRepository.php';
require_once 'AppController.php';

class SessionController extends AppController
{

    public function createSession($user)
    {
        $sessionRepository = new SessionRepository();

        $_SESSION['sessionId'] = session_id();
        $_SESSION['userId'] = $user->getId();
        $_SESSION['remoteIP'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['userRole'] = $user->getRole();
        $_SESSION['startedAt'] = time();
        $sessionRepository->addSession();
    }

    public function removeSession()
    {
        session_start();
        $sessionRepository = new SessionRepository();

        $sessionRepository->deleteSession($_SESSION['sessionId']);
        session_unset();
        session_destroy();
    }

    public function didSessionExpired(string $sessionId): bool
    {
        session_start();

        $sessionRepository = new SessionRepository();
        // Session expires after 30 days
        if (isset($_SESSION['startedAt']) && (time() - $_SESSION['startedAt']) > 30 * 24 * 60 * 60)
        {
            session_unset();
            session_destroy();
            $sessionRepository->deleteSession($sessionId);
            return true;
        }
        return false;
    }
}