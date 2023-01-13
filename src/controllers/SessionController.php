<?php

use repository\SessionRepository;
require_once __DIR__.'/../repository/SessionRepository.php';

class SessionController
{
    public function didSessionExpired(int $sessionId): bool
    {
        session_start();

        $sessionRepository = new SessionRepository();
        // Session expires after 30 days
        if (isset($_SESSION['lastActivity']) && (time() - $_SESSION['lastActivity']) > 30 * 24 * 60 * 60)
        {
            session_unset();
            session_destroy();
            $sessionRepository->delete($sessionId);
            return true;
        }
        return false;
    }
}