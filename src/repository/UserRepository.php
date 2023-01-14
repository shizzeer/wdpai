<?php

namespace repository;

use models\User;
use models\Session;
use PDO;

require_once 'Repository.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM dbname.public."Users" 
                                                           INNER JOIN dbname.public."User_Details"
                                                           ON dbname.public."Users"."idUser" = dbname.public."User_Details"."idUserDetails"
                                                           WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user === false) {
            return null;
        }

        return new User(
            $user['idUser'],
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password'],
            $user['dateOfBirth'],
            $user['phoneNumber'],
            $user['identityNumber'],
            $user['role']
        );
    }

    public function getUserSession(int $userId)
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM dbname.public."Sessions" 
                                                           WHERE "idUser" = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $session = $stmt->fetch(PDO::FETCH_ASSOC);

        return $session;
    }
}