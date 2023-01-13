<?php

namespace repository;

use PDO;

require_once 'Repository.php';

class SessionRepository extends Repository
{
    public function add()
    {
        // Add session information to database for keeping sessions open after closing browser
    }

    public function delete(int $sessionId)
    {
        $stmt = $this->database->connect()->prepare('DELETE FROM dbname.public."Sessions" 
                                                     WHERE "idSession"=:sessionId');
        $stmt->bindParam(':sessionId', $sessionId, PDO::PARAM_INT);
        $stmt->execute();
    }
}