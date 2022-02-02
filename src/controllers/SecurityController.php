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
        $this->session->createSession($email);
        /*$url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/projects");*/
        return $this->render('page-profile','profile',['user' => $user]);
    }

    public function logout(){
        session_start();
        $this->session->closeSession();
        return $this->render('page-login-and-registration', 'login');
    }

    public function profile(){
        session_start();
        if(!$_SESSION['email']){
            echo "no rights";
            die();
        }else{
            return $this->render('page-profile','profile',/*['user' => $user]*/);
        }
    }
    public function search(){
        session_start();
        if(!$_SESSION['email']){
            echo "no rights";
            die();
        }else{
            return $this->render('page-search','search',/*['user' => $user]*/);
        }
    }

    public function shelf(){
        session_start();
        if(!$_SESSION['email']){
            echo "no rights";
            die();
        }else{
            return $this->render('page-shelf', 'shelf', /*['user' => $user]*/);
        }
    }
    public function statistics(){
        session_start();
        if(!$_SESSION['email']){
            echo "no rights";
            die();
        }else{
            return $this->render('page-statistics', 'statistics', /*['user' => $user]*/);
        }
    }
    public function settings(){
        //$user = $this->getUser();
        session_start();
        if(!$_SESSION['email']){
            echo "no rights";
            die();
        }else{
            return $this->render('page-settings', 'settings', /*['user' => $user]*/);
        }
    }
}