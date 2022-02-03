<?php

require_once 'AppController.php';
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Book.php";
require_once __DIR__ . "/../repository/UserRepository.php";

class SecurityController extends AppController
{

    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost())
            return $this->render('page-login-and-registration', 'login');

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);
        if (!$user) {
            return $this->render('page-login-and-registration', 'login', ['messages' => [
                "User does not exist!"
            ]]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('page-login-and-registration', 'login', ['messages' => [
                "User with this email do not exist!"
            ]]);
        }
        if (!password_verify($password,$user->getPassword())) {
            return $this->render('page-login-and-registration', 'login', ['messages' => [
                "Your password is incorrect!"
            ]]);
        }
        $this->session->createSession($email,$user->getId());
        setcookie("email", $email, time() + (86400 * 30), "/");
        setcookie("name", $user->getName(), time() + (86400 * 30), "/");
        setcookie("surname", $user->getSurname(), time() + (86400 * 30), "/");
        setcookie("nickname", $user->getNickname(), time() + (86400 * 30), "/");
        setcookie("birthday", $user->getBirthday(), time() + (86400 * 30), "/");
        /*$url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/projects");*/
        return $this->render('page-profile', 'profile', ['user' => $user]);
    }

    public function logout()
    {
        session_start();
        $this->session->closeSession();
        return $this->render('page-login-and-registration', 'login');
    }

    public function profile()
    {
        session_start();
        if(!$this->validateUser()) die();
        return $this->render('page-profile', 'profile',/*['user' => $user]*/);
    }

    public function search()
    {
        session_start();
        if(!$this->validateUser()) die();
        return $this->render('page-search', 'search');
    }

    public function shelf()
    {
        session_start();
        if(!$this->validateUser()) die();
        return $this->render('page-shelf', 'shelf', /*['user' => $user]*/);
    }

    public function statistics()
    {
        session_start();
        if(!$this->validateUser()) die();
        return $this->render('page-statistics', 'statistics', /*['user' => $user]*/);
    }

    public function settings()
    {
        session_start();
        if(!$this->validateUser()) die();
        return $this->render('page-settings', 'settings', /*['user' => $user]*/);
    }
    public function registeruser(){
        $userRepository = new UserRepository();

        if (!$this->isPost())
            return $this->render('page-login-and-registration', 'login');

        $email = $_POST["email"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $birthday = $_POST["birthday"];

        $user = $userRepository->getUser($email);
        if ($user) {
//            format('Y-m-d')
            echo $birthday;
            $this->render('page-login-and-registration', 'register',['messages' => "Such user already exists"]);

        }else{
            $date = DateTime::createFromFormat('Y-m-d',$birthday);
            $date = $date->format('Y-m-d');
            $user = new User($email,password_hash($password,PASSWORD_DEFAULT),
                $name,$surname,$name . " " . $surname,$date);
            $userRepository->register($user);
        }




    }
}