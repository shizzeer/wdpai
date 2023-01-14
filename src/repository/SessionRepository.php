<?php

namespace repository;

use PDO;

require_once 'Repository.php';

class SessionRepository extends Repository
{
    public function addSession()
    {
        // Add session information to database for keeping sessions open after closing browser
        $stmt = $this->database->connect()->prepare('INSERT INTO dbname.public."Sessions" ("idSession", "idUser", "remoteIP", "startedAt", "userRole")
                                                    VALUES (?, ?, ?, ?, ?);');
        $stmt->execute([
            $_SESSION['sessionId'],
            $_SESSION['userId'],
            $_SESSION['remoteIP'],
            $_SESSION['startedAt'],
            $_SESSION['userRole']
        ]);
    }

    public function deleteSession(string $sessionId)
    {
        $stmt = $this->database->connect()->prepare('DELETE FROM dbname.public."Sessions" 
                                                     WHERE "idSession"=:sessionId');
        $stmt->bindParam(':sessionId', $sessionId, PDO::PARAM_INT);
        $stmt->execute();
    }
}