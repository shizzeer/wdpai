<?php

require_once __DIR__.'/../models/User.php';
require_once 'Repository.php';

class UserRepository extends Repository
{
    public function getUserById(int $userId): ?User
    {
        $stmt = $this->database->connect()->prepare('SELECT * FROM dbname.public."Users" 
                                                           INNER JOIN dbname.public."User_Details"
                                                           ON dbname.public."Users"."idUser" = dbname.public."User_Details"."idUserDetails"
                                                           WHERE "idUser" = :userId');
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
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

    public function getUserByMail(string $email): ?User
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

    public function canRegisterUser($email): bool
    {
        $stmt = $this->database->connect()->prepare('SELECT email FROM dbname.public."Users"
                                                           WHERE "email" = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return !$result;
    }

    public function registerUser($user)
    {
        $stmt = $this->database->connect()->prepare('INSERT INTO dbname.public."User_Details" ("name", "surname", "dateOfBirth", "phoneNumber", "identityNumber")
                                                    VALUES (?, ?, ?, ?, ?);');
        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getDateOfBirth(),
            $user->getPhoneNumber(),
            $user->getIdentityNumber()
        ]);
        $stmt = $this->database->connect()->prepare('INSERT INTO dbname.public."Users" ("email", "password", "role")
                                                    VALUES (?, ?, ?);');
        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getRole()
        ]);
    }
}