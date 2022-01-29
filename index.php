<?php
require 'Routing.php';
$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path,PHP_URL_PATH);
Routing::get('','DefaultController');
Routing::post('login','SecurityController');
Routing::get('register','DefaultController');
Routing::get('profile','SecurityController');
Routing::get('search','SecurityController');
Routing::get('shelf','SecurityController');
Routing::get('statistics','SecurityController');
Routing::run($path);

