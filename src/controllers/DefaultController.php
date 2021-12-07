<?php
require_once 'AppController.php';
class DefaultController extends AppController{
    public function index(){
        $this->render('page-login-and-registration','login');
    }
    public function register(){
        $this->render('page-login-and-registration','register');
    }
    public function profile(){
        $this->render('page-profile','profile');
    }
}