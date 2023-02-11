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

//    public function updateName(int $userId, string $newName)
//    {
//        $stmt = $this->database->connect()->prepare('UPDATE dbname.public."User_Details"
//                                                           SET "name" = :newName
//                                                           WHERE "idUserDetails" = :userId');
//        $stmt->bindParam(':newName', $newName);
//        $stmt->bindParam(':userId', $userId);
//        $stmt->execute();
//    }
//
//    public function updateSurname(int $userId, string $newSurname)
//    {
//        // idUserDetails is mapped to the idUser - this is a logic in whole app
//        $stmt = $this->database->connect()->prepare('UPDATE dbname.public."User_Details"
//                                                           SET "surname" = :newName
//                                                           WHERE "idUserDetails" = :userId');
//        $stmt->bindParam(':newName', $newSurname);
//        $stmt->bindParam(':userId', $userId);
//        $stmt->execute();
//    }
//
//    public function updateEmail(int $userId, string $newEmail)
//    {
//        $stmt = $this->database->connect()->prepare('UPDATE dbname.public."Users"
//                                                           SET "email" = :newEmail
//                                                           WHERE "idUser" = :userId');
//        $stmt->bindParam(':newEmail', $newEmail);
//        $stmt->bindParam(':userId', $userId);
//        $stmt->execute();
//    }
//
//    public function updatePassword(int $userId, string $newPassword)
//    {
//        $stmt = $this->database->connect()->prepare('UPDATE dbname.public."Users"
//                                                           SET "password" = :newPassword
//                                                           WHERE "idUser" = :userId');
//        $stmt->bindParam(':newPassword', $newPassword);
//        $stmt->bindParam(':userId', $userId);
//        $stmt->execute();
//    }
//
//    public function updateDateOfBirth(int $userId, string $newDateOfBirth)
//    {
//        // idUserDetails is mapped to the userId
//        $stmt = $this->database->connect()->prepare('UPDATE dbname.public."User_Details"
//                                                           SET "dateOfBirth" = :newDateOfBirth
//                                                           WHERE "idUserDetails" = :userId');
//        $stmt->bindParam(':newDateOfBirth', $newDateOfBirth);
//        $stmt->bindParam(':userId', $userId);
//        $stmt->execute();
//    }
//
//    public function updatePhoneNumber(int $userId, string $phoneNumber)
//    {
//        $stmt = $this->database->connect()->prepare('UPDATE dbname.public."User_Details"
//                                                           SET "phoneNumber" = :phoneNumber
//                                                           WHERE "idUserDetails" = :userId');
//        $stmt->bindParam(':phoneNumber', $phoneNumber);
//        $stmt->bindParam(':userId', $userId);
//        $stmt->execute();
//    }
//
//    public function updateIdentityNumber(int $userId, string $identityNumber)
//    {
//        $stmt = $this->database->connect()->prepare('UPDATE dbname.public."User_Details"
//                                                           SET "identityNumber" = :identityNumber
//                                                           WHERE "idUserDetails" = :userId');
//        $stmt->bindParam(':identityNumber', $identityNumber);
//        $stmt->bindParam(':userId', $userId);
//        $stmt->execute();
//    }
}