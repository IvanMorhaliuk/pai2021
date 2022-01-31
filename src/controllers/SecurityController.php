<?php

require_once 'AppController.php';
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/Book.php";
require_once __DIR__ . "/../repository/UserRepository.php";
class SecurityController extends AppController
{
    public function login(){
        $userRepository = new UserRepository();

        if(!$this->isPost())
            return $this->render('page-login-and-registration', 'login');

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);
        if(!$user){
            return $this->render('page-login-and-registration', 'login', ['messages' => [
                "User does not exist!"
            ]]);
        }

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

        /*$url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/projects");*/
        return $this->render('page-profile','profile',['user' => $user]);
    }
    public function search(){
        $user = $this->getUser();
        return $this->render('page-search','search',['user' => $user]);
    }
    public function profile(){
        $user = $this->getUser();
        return $this->render('page-profile','profile',['user' => $user]);
    }

    public function shelf(){
        $user = $this->getUser();
        return $this->render('page-shelf', 'shelf', ['user' => $user]);
    }
    public function statistics(){
        $user = $this->getUser();
        return $this->render('page-statistics', 'statistics', ['user' => $user]);
    }
    public function settings(){
        $user = $this->getUser();
        return $this->render('page-settings', 'settings', ['user' => $user]);
    }

    /*public function getUser(): User
    {
        $user = new User("jsnow@pk.edu.pl", "admin", "adminjohn_SSS", "John", "Snow");
        $booksList = [
            new Book("title 1", "desc 1", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 2", "desc 2", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 3", "desc 3", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
        ];
        $user->setPrivateBooksList($booksList);
        return $user;
    }*/

}