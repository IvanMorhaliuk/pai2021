<?php

require_once 'AppController.php';
require_once __DIR__ . "/../models/User.php";

class SecurityController extends AppController
{
    public function login(){
        $user = new User("jsnow@pk.edu.pl","john_SSS","admin","John","Snow");

        if(!$this->isPost())
            return $this->render('page-login-and-registration', 'login');

        $email = $_POST["email"];
        $password = $_POST["password"];

        if($user->getEmail() !== $email) {
            return $this->render('page-login-and-registration', 'login', ['messages' => [
                "User with this email do not exist!"
            ]]);
        }
        if($user->getPassword() !== $password) {
            return $this->render('page-login-and-registration', 'login', ['messages' => [
                "Your password is incorrect!"
            ]]);
        }

        return $this->render('page-profile','profile',['user' => $user]);


    }
}