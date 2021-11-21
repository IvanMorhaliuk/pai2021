<?php
require_once 'AppController.php';
class DefaultController extends AppController{
    public function index(){
        $this->render('login');
    }
    public function projects(){
        // TODO display project.html
        die("projects method");
    }
}