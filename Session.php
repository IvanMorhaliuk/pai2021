<?php

class Session
{
    public function createSession($email){
        session_start();
        $_SESSION['email'] = $email;
    }
    public function closeSession(){
        unset($_SESSION["email"]);
    }
}