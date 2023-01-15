<?php

use models\User;
use repository\UserRepository;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        if (!$this->isPost())
        {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User does not exist']]);
        }

        if ($user->getEmail() !== $email || $user->getPassword() !== $password)
        {
            return $this->render('login', ['messages' => ['Wrong username or password']]);
        }

        header("Location: {$this->getUrl()}/offers");
    }
}