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

    function updateNameAndSurname(int $userId, string $name, string $surname)
    {
        // Initial validation is done on the client-side
        $this->userRepository->updateName($userId, $name);
        $this->userRepository->updateSurname($userId, $surname);
    }

    function updateEmail(int $userId, string $newEmail)
    {
        $this->userRepository->updateEmail($userId, $newEmail);
    }

    function updatePassword(int $userId, string $newPassword)
    {
        $this->userRepository->updatePassword($userId, $newPassword);
    }

    function updateDateOfBirth(int $userId, string $newDateOfBirth)
    {
        $this->userRepository->updateDateOfBirth($userId, $newDateOfBirth);
    }

    function updatePhoneNumber(int $userId, string $phoneNumber)
    {
        $this->userRepository->updatePhoneNumber($userId, $phoneNumber);
    }

    function updateIdentityNumber(int $userId, string $identityNumber)
    {
        $this->userRepository->updateIdentityNumber($userId, $identityNumber);
    }
}