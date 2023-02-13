<?php

require_once 'Repository.php';
require_once 'UserRepository.php';

class SettingsRepository extends Repository
{
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function updateNameAndSurname(int $userId, string $name, string $surname)
    {
        $this->userRepository->updateUserDetailsData($userId, "name", $name);
        $this->userRepository->updateUserDetailsData($userId, "surname", $surname);
    }

    public function updateEmail(int $userId, string $newEmail)
    {
        $this->userRepository->updateUserData($userId, "email", $newEmail);
    }

    public function updatePassword(int $userId, string $newPassword)
    {
        $this->userRepository->updateUserData($userId, "password", $newPassword);
    }

    public function updateDateOfBirth(int $userId, string $newDateOfBirth)
    {
        $this->userRepository->updateUserDetailsData($userId, "dateOfBirth", $newDateOfBirth);
    }

    public function updatePhoneNumber(int $userId, string $phoneNumber)
    {
        $this->userRepository->updateUserDetailsData($userId, "phoneNumber", $phoneNumber);
    }

    public function updateIdentityNumber(int $userId, string $identityNumber)
    {
        $this->userRepository->updateUserDetailsData($userId, "identityNumber", $identityNumber);
    }
}