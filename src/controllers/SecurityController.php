<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
class SecurityController extends AppController
{
    public function login()
    {
        if (!$this->isPost())
        {
            return $this->render('login');
        }
        $user = new User('123', 'John', 'Snow', 'jsnow@pk.edu.pl', 'password', '12/12/1998', '130 Las Dunas Ave
                    Oakley, California(CA)', '123123123', '00111223344');

        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($user->getEmail() !== $email || $user->getPassword() !== $password)
        {
            return $this->render('login', ['messages' => ['Wrong username or password']]);
        }

        header("Location: {$this->getUrl()}/offers");
    }
}