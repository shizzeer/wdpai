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
                                                           ON dbname.public."Users"."idUserDetails" = dbname.public."User_Details"."idUserDetails"
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

    public static function getNextAvailableUserId()
    {
        $pdo = new PDO("pgsql:host=db;port=5432;dbname=dbname", "dbuser", "dbpwd");
        $stmt = $pdo->prepare('SELECT MAX("idUser") AS max_id FROM dbname.public."Users"');
        $stmt->execute();
        $row = $stmt->fetch();
        return $row["max_id"] + 1;
    }

    public function canRegisterUser(string $email): bool
    {
        $stmt = $this->database->connect()->prepare('SELECT email FROM dbname.public."Users"
                                                           WHERE "email" = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return !$result;
    }

    public function identityNumberExists(string $identityNumber): bool
    {
        $stmt = $this->database->connect()->prepare('SELECT "identityNumber" FROM dbname.public."User_Details" 
                                                           WHERE "identityNumber" = :identityNumber');
        $stmt->bindParam(':identityNumber', $identityNumber, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return (bool)$result;
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

    public function updateUserDetailsData(int $userId, string $column, string $newValue)
    {
        $stmt = $this->database->connect()->prepare("UPDATE dbname.public.\"User_Details\" SET \"$column\" = :value WHERE \"idUserDetails\" = :userId");
        $stmt->bindParam(':value', $newValue, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateUserData(int $userId, string $column, string $newValue)
    {
        $stmt = $this->database->connect()->prepare("UPDATE dbname.public.\"Users\" SET \"$column\" = :value WHERE \"idUser\" = :userId");
        $stmt->bindParam(':value', $newValue, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
    }
}