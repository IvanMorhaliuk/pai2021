<?php

class Session
{
    public function createSession($email,$id){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $id;
    }
    public function closeSession(){
        unset($_SESSION["email"]);
    }
    public function isAuth(): bool{
        return (bool)$_SESSION["email"];
    }
}