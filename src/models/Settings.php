<?php

require_once __DIR__.'/../models/User.php';

class Settings
{
    private Array $accountSettings;

    public function getAccountSettings(): array
    {
        return $this->accountSettings;
    }

    public function setAccountSettings(User $user): void
    {
        $this->accountSettings['name'] = $user->getName().' '.$user->getSurname();
        $this->accountSettings['email'] = $user->getEmail();
        $this->accountSettings['dateOfBirth'] = $user->getDateOfBirth();
        $this->accountSettings['phoneNumber'] = $user->getPhoneNumber();
        $this->accountSettings['identityNumber'] = $user->getIdentityNumber();
    }
}